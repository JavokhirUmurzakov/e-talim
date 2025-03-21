<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Uqituvchi_holat;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
//        $akkre = Akkreditatsiya::leftJoin('ohtms', 'ohtms.id', '=', 'akkreditatsiyas.ohtm_id')
//            ->select('akkreditatsiyas.id as akk_id', 'akkreditatsiyas.nomi', 'akkreditatsiyas.haqida', 'akkreditatsiyas.sana', 'akkreditatsiyas.pdf', 'akkreditatsiyas.ohtm_id', 'ohtms.qs_nomi as ohtm_nomi')
//            ->orderBy('akk_id','desc')
//            ->paginate(10);
//
        $roles = Role::all();

        return view('mv_admin.role', compact('roles'));
    }


    public function create(Request $request){
//        dd($request->pdf);

        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
        ],[
            'nomi.required' => 'Role nomi kiritilishi majburiy!',
            'nomi.max' => 'Role nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Role nomi qisqartmasi kiritilishi majburiy!',
        ]);


        $roles = new Role();
        $roles->nomi = $request->nomi;
        $roles->qs_nomi = $request->qs_nomi;
        $roles->save();

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");
    }
    public function delete($id){
        $item = Role::where('id', $id)->first();
        $item->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi!");
    }

    public function edit(Request $request, $id){
//        dd($request);
        $request->validate([
            'nomi' => 'required|max:255',
            'qs_nomi' => 'required',
        ],[
            'nomi.required' => 'Role nomi kiritilishi majburiy!',
            'nomi.max' => 'Role nomining uzunligi 255 ta belgidan oshmasligi kerak!',
            'qs_nomi.required' => 'Role nomi qisqartmasi kiritilishi majburiy!',
        ]);

        $roles = Role::find($id);
        $roles->nomi = $request->nomi;
        $roles->qs_nomi = $request->qs_nomi;
        $roles->save();


        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }
}
