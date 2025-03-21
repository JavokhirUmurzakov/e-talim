<?php

namespace App\Http\Controllers;

use App\Models\Ohtm;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Til;
use Illuminate\Support\Facades\Hash;

class FoydalanuvchiController extends Controller
{
    public function index(){

        $foydalanuvchilar = User::leftJoin('ohtms', 'ohtms.id', '=', 'users.ohtm_id')
            ->leftJoin('tils', 'tils.id', '=', 'users.til_id')
            ->select(
                'users.id',
                'users.nomi',
                'users.login',
                'users.faol',
                'tils.qs_nomi as til',
                'ohtms.qs_nomi as ohtm'
            )
            ->orderBy('users.id','desc')
            ->paginate(10);


        $ohtm = Ohtm::select('id','qs_nomi')->get();

        $til = Til::select('id','qs_nomi')->get();

        return view('mv_admin.foydalanuvchilar', compact('foydalanuvchilar','ohtm','til'));
    }


    public function create(Request $request){

        $request->validate([
            'nomi' => 'required|max:255',
            'login' => 'required|max:25|unique:users',
            'parol' => 'required|min:8',
            're_parol' => 'required|min:8',
            'til_id' => 'required',
            'ohtm_id' => 'required',
        ],[
            'nomi.required' => 'fan nomi kiritilishi majburiy!',
            'nomi.max' => 'Fan nomining uzunligi 255 ta belgidan oshmasligi kerak!',

            'login.required' => 'Login kiritilishi majburiy!',
            'login.max' => 'Login 25 ta belgidan oshmasligi kerak!',
            'login.unique' => 'Kiritilgan Login tizimda mavjud!',

            'parol.required' => 'Parol biriktirilishi majburiy!',
            'parol.min' => "Parol uchun kamida 8 ta belgi kiritilishi majburiy!",

            're_parol.required' => 'Parolni qayta kiritish majburiy!',
            're_parol.min' => "Parol uchun kamida 8 ta belgi kiritilishi majburiy!",

            'til_id.required' => "Til kiritilishi majburiy!",
            'ohtm_id.required' => "Ohtm tanlanishi majburiy!",
        ]);

        if($request->parol != $request->re_parol){
            return redirect()->back()->withErrors("Parol kiritishda xatoli mavjud!");
        }

        $user = new User;
        $user->nomi = $request->nomi;
        $user->login = $request->login;
        $user->til_id = $request->til_id;
        $user->ohtm_id = $request->ohtm_id;
        $user->password = Hash::make($request->parol);

        if($request->faol == 'on'){
            $user->faol = 1;
        }

//        query exeption yozish kerak

        $user->save();


        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
}
