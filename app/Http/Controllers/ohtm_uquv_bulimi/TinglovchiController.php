<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Fakultet_kafedra;
use App\Models\Guruh;
use App\Models\Harbiy_unvon;
use App\Models\Ilmiy_daraja;
use App\Models\Ilmiy_unvon;
use App\Models\Ohtm;
use App\Models\Permission;
use App\Models\Til;
use App\Models\Tinglovchi;
use App\Models\Tinglovchi_holat;
use App\Models\Uqituvchi;
use App\Models\Uqituvchi_holat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TinglovchiController extends Controller
{
    public function index()
    {

        $users = Tinglovchi::leftJoin('users', 'tinglovchis.user_id', '=', 'users.id')
            ->leftJoin('tils', 'users.til_id', '=', 'tils.id')
            ->leftJoin('harbiy_unvons', 'tinglovchis.harbiy_unvon_id', '=', 'harbiy_unvons.id')
            ->leftJoin('tinglovchi_holats', 'tinglovchis.tinglovchi_holat_id', '=', 'tinglovchi_holats.id')
            ->leftJoin('fakultet_kafedras', 'tinglovchis.fakultet_kafedra_id', '=', 'fakultet_kafedras.id')
            ->leftJoin('ohtms', 'tinglovchis.ohtm_id', '=', 'ohtms.id')
            ->leftJoin('guruhs', 'tinglovchis.guruh_id', '=', 'guruhs.id')
            ->select(
                'tinglovchis.id',
                'tinglovchis.fio',
                'tinglovchis.lavozim',
                'tinglovchis.rasm',
                'tinglovchis.tinglovchi_holat_id',
                'tinglovchis.harbiy_unvon_id',
                'tinglovchis.user_id',
                'tinglovchis.haqida',
                'fakultet_kafedras.qs_nomi as fakultet_kafedra_qs_nomi',
                'ohtms.qs_nomi as ohtm_qs_nomi',
                'users.login as user_login',
                'users.til_id as user_til_id',
                'users.faol as user_faol',
                'tils.nomi as til_nomi',
                'guruhs.nomi as guruh_nomi',
                'harbiy_unvons.nomi as harbiy_unvon_nomi',
                'tinglovchi_holats.nomi as tinglovchi_holat_nomi'
            )
            ->where('users.ohtm_id', auth()->user()->ohtm_id)
            ->paginate(10); // <-- Shu metod kerak!


        //dd($users);
        $guruhs=Guruh::all();
        $tinglovchi_holat_id = Tinglovchi_holat::all();
        $tils = Til::all();
        $harbiy_unvons = Harbiy_unvon::all();
        $fakultet_kafedras = Fakultet_kafedra::all();
        $ohtm = Ohtm::all();
        return view('ohtm_uquv_bulimi.tinglovchi', compact('users', 'tils', 'tinglovchi_holat_id', 'harbiy_unvons','fakultet_kafedras', 'ohtm','guruhs'));


    }

    public function store(Request $request)
    {
        $request->validate([
            'nomi' => 'required|max:255',
            'login' => 'required|unique:users',
            'password' => 'required',
            'tinglovchi_holat_id' => 'required|integer',
            'til_id' => 'required',
            'lavozim' => 'required',
            'rasm' => 'required',
            'harbiy_unvon_id' => 'required',
            'fakultet_kafedra_id' => 'required',
            'guruh_id' => 'required',
        ], [
            'nomi.required' => 'FIO kiritilishi majburiy!',
            'nomi.max' => 'FIO ning uzunligi 255 ta belgidan oshmasligi kerak!',
            'login.unique' => 'Bunday Login mavjud Iltimos boshqa login tanlang',
            'login.required' => 'Login kiritilishi majburiy!',
            'password.required' => 'Parol kiritilishi majburiy!',
            'tinglovchi_holat_id.required' => 'Tinglovchi holati kiritilishi majburiy!',
            'til_id.required' => 'Til tanlanishi majburiy!',
            'lavozim.required' => 'Lavozim kiritilishi majburiy!',
            'rasm.required' => 'Rasm kiritilishi majburiy!',
            'harbiy_unvon_id.required' => 'Harbiy unvon kiritilishi majburiy!',
            'fakultet_kafedra_id' => 'Fakultet & Kafedra kiritilishi kerak',
            'guruh_id' => 'Guruh kiritilishi kerak',
        ]);



        DB::transaction(function () use ($request) {
            $user = User::create([
                'nomi' => $request->nomi,
                'login' => $request->login,
                'password' => Hash::make($request->password),
                'til_id' => $request->til_id,
                'ohtm_id' => auth()->user()->ohtm_id,
                'faol' => is_null($request->faol) ? false : true,

            ]);
            Permission::create([
                'user_id' => $user->id,
                'role_id' => 8
            ]);
            $uploadFile = $request->file('rasm');
            $file_name = $uploadFile->hashName();
            $path = $uploadFile->storeAs('/images', $file_name);
            Tinglovchi::create([
                'fio' => $request->nomi,
                'lavozim' => $request->lavozim,
                'rasm' => $path,
                'haqida' => $request->haqida,
                'guruh_id' => $request->guruh_id,
                'tinglovchi_holat_id' => $request->tinglovchi_holat_id,
                'harbiy_unvon_id' => $request->harbiy_unvon_id,
                'fakultet_kafedra_id' => $request->fakultet_kafedra_id,
                'user_id' => $user->id,
                'ohtm_id' => $user->ohtm_id,

            ]);
        });


        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");

    }


    public function edit(Request $request, $id)
    {
        $tinglovchi = Tinglovchi::where('id', $id)->first();

        if (!$tinglovchi) {
            return redirect()->back()->with('error', 'Tinglovchi topilmadi!');
        }
        $user = User::where('id', $tinglovchi->user_id)->first();
       // $permission = Permission::where(['user_id'=>$user_id, 'role_id'=>8])->first();
        $request->validate([
            'nomi' => 'required|max:255',
            'login' => 'required|string|max:255|unique:users,login,' . $user->id,
            'tinglovchi_holat_id' => 'required|integer',
            'til_id' => 'required',
            'lavozim' => 'required',
            'haqida' => 'nullable|string',
           // 'rasm' => 'required',
            'harbiy_unvon_id' => 'required',
            'fakultet_kafedra_id' => 'required',
            'guruh_id' => 'required',
        ], [
            'nomi.required' => 'FIO kiritilishi majburiy!',
            'nomi.max' => 'FIO ning uzunligi 255 ta belgidan oshmasligi kerak!',
            'login.unique' => 'Bunday Login mavjud Iltimos boshqa login tanlang',
            'login.required' => 'Login kiritilishi majburiy!',
            'tinglovchi_holat_id.required' => 'Tinglovchi holati kiritilishi majburiy!',
            'til_id.required' => 'Til tanlanishi majburiy!',
            'lavozim.required' => 'Lavozim kiritilishi majburiy!',
            'rasm.required' => 'Rasm kiritilishi majburiy!',
            'harbiy_unvon_id.required' => 'Harbiy unvon kiritilishi majburiy!',
            'fakultet_kafedra_id' => 'Fakultet & Kafedra kiritilishi kerak',
            'guruh_id' => 'Guruh kiritilishi kerak',
        ]);

        DB::transaction(function () use ($user, $request ,$tinglovchi) {
            $updateData = [
                'nomi' => $request->nomi,
                'login' => $request->login,
                'til_id' => $request->til_id,
                'ohtm_id' => auth()->user()->ohtm_id,
                'faol' => $request->has('faol') ? true : false,
            ];
//            $user ->update([
//                'nomi' => $request->nomi,
//                'login' => $request->login,
//                'password' => Hash::make($request->password),
//                'til_id' => $request->til_id,
//                'ohtm_id' => auth()->user()->ohtm_id,
//                'faol' => is_null($request->faol) ? false : true,
//
//            ]);
            if (!empty($request->password)) {
                $updateData['password'] = Hash::make($request->password);
            }

            $user->update($updateData);

            // Rasm yuklash
            $rasmPath = $tinglovchi->rasm; // Eski rasm yo‘qolmasligi uchun

            if ($request->hasFile('rasm')) {
                // Eski rasmni o‘chirish
                if ($tinglovchi->rasm && file_exists(storage_path('app/public/' . $tinglovchi->rasm))) {
                    unlink(storage_path('app/public/' . $tinglovchi->rasm));
                }

                $file = $request->file('rasm');
                $rasmPath = $file->store('public/images'); // Rasmni saqlash
            }
//
//            $uploadFile = $request->file('rasm');
//            $file_name = $uploadFile->hashName();
//            $path = $uploadFile->storeAs('/images', $file_name);
            $tinglovchi -> update([
                'fio' => $request->nomi,
                'lavozim' => $request->lavozim,
                'rasm' => $rasmPath,
                'haqida' => $request->haqida,
                'guruh_id' => $request->guruh_id,
                'tinglovchi_holat_id' => $request->tinglovchi_holat_id,
                'harbiy_unvon_id' => $request->harbiy_unvon_id,
                'fakultet_kafedra_id' => $request->fakultet_kafedra_id,
                'user_id' => $user->id,
                'ohtm_id' => $user->ohtm_id,

            ]);
        });
        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        //dd($id);
        $tinglovchi = Tinglovchi::where('id', $id)->first();

        if (!$tinglovchi) {
            return redirect()->back()->with('error', 'Tinglovchi topilmadi!');
        }
        $user = User::where('id', $tinglovchi->user_id)->first();
        $permission = Permission::where(['user_id'=>$tinglovchi->user_id, 'role_id'=>8])->first();
        $permission->delete();
        $tinglovchi->delete();
        $user->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi");
    }

}
