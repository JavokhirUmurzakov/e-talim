<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Fakultet_kafedra;
use App\Models\Harbiy_unvon;
use App\Models\Ilmiy_daraja;
use App\Models\Ilmiy_unvon;
use App\Models\Ohtm;
use App\Models\Permission;
use App\Models\Til;
use App\Models\Uqituvchi;
use App\Models\Uqituvchi_holat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UqituvchiController extends Controller
{
    public function index()
    {

//        $users = Uqituvchi::with('user', 'til')->where('ohtm_id', auth()->user()->ohtm_id)->paginate(10);
        $users = Uqituvchi::leftJoin('users', 'uqituvchis.user_id', '=', 'users.id')
            ->leftJoin('tils', 'users.til_id', '=', 'tils.id')
            ->leftJoin('harbiy_unvons', 'uqituvchis.harbiy_unvon_id', '=', 'harbiy_unvons.id')
            ->leftJoin('ilmiy_unvons', 'uqituvchis.ilmiy_unvon_id', '=', 'ilmiy_unvons.id')
            ->leftJoin('ilmiy_darajas', 'uqituvchis.ilmiy_daraja_id', '=', 'ilmiy_darajas.id')
            ->leftJoin('uqituvchi_holats', 'uqituvchis.uqituvchi_holat_id', '=', 'uqituvchi_holats.id')
            ->leftJoin('fakultet_kafedras', 'uqituvchis.fakultet_kafedra_id', '=', 'fakultet_kafedras.id')
            ->leftJoin('ohtms', 'uqituvchis.ohtm_id', '=', 'ohtms.id')
            ->select(
                'uqituvchis.id',
                'uqituvchis.fio',
                'uqituvchis.lavozim',
                'uqituvchis.rasm',
                'uqituvchis.mutaxassisligi',
                'uqituvchis.rahbar',
                'uqituvchis.uqituvchi_holat_id',
                'uqituvchis.harbiy_unvon_id',
                'uqituvchis.ilmiy_unvon_id',
                'uqituvchis.ilmiy_daraja_id',
                'uqituvchis.user_id',
                'fakultet_kafedras.qs_nomi as fakultet_kafedra_qs_nomi',
                'ohtms.qs_nomi as ohtm_qs_nomi',
                'users.login as user_login',
                'users.til_id as user_til_id',
                'users.faol as user_faol',
                'tils.nomi as til_nomi',
                'harbiy_unvons.nomi as harbiy_unvon_nomi',
                'ilmiy_darajas.qs_nomi as ilmiy_daraja_qs_nomi',
                'ilmiy_unvons.qs_nomi as ilmiy_unvon_qs_nomi',
                'uqituvchi_holats.nomi as uqituvchi_holat_nomi'
            )
            ->where('users.ohtm_id', auth()->user()->ohtm_id)
            ->paginate(10); // <-- Shu metod kerak!


        //dd($users);
        $uqituvchi_holat_id = Uqituvchi_holat::all();
        $tils = Til::all();
        $harbiy_unvons = Harbiy_unvon::all();
        $ilmiy_darajas = Ilmiy_daraja::all();
        $ilmiy_unvons = Ilmiy_unvon::all();
        $fakultet_kafedras = Fakultet_kafedra::all();
        $ohtm = Ohtm::all();
        return view('ohtm_uquv_bulimi.uqituvchi', compact('users', 'tils', 'uqituvchi_holat_id', 'harbiy_unvons', 'ilmiy_unvons', 'ilmiy_darajas', 'fakultet_kafedras', 'ohtm'));


    }


    public function store(Request $request)
    {
        $request->validate([
            'nomi' => 'required|max:255',
            'login' => 'required|unique:users',
            'password' => 'required',
            'uqituvchi_holat_id' => 'required',
            'til_id' => 'required',
            'lavozim' => 'required',
            'rasm' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'mutaxassisligi' => 'required',
            'harbiy_unvon_id' => 'required',
            'ilmiy_daraja_id' => 'required',
            'fakultet_kafedra_id' => 'required',
        ], [
            'nomi.required' => 'FIO kiritilishi majburiy!',
            'nomi.max' => 'FIO ning uzunligi 255 ta belgidan oshmasligi kerak!',
            'login.unique' => 'Bunday Login mavjud Iltimos boshqa login tanlang',
            'login.required' => 'Login kiritilishi majburiy!',
            'password.required' => 'Parol kiritilishi majburiy!',
            'uqituvchi_holat_id.required' => 'O\'qituvchi holati kiritilishi majburiy!',
            'til_id.required' => 'Til tanlanishi majburiy!',
            'lavozim.required' => 'Lavozim kiritilishi majburiy!',
            'mutaxassisligi.required' => 'Mutaxasisligi kiritilishi majburiy!',
            'harbiy_unvon_id.required' => 'Harbiy unvon kiritilishi majburiy!',
            'fakultet_kafedra_id' => 'Fakultet & Kafedra kiritilishi kerak',
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
                'role_id' => 7
            ]);

//            $uploadFile = $request->file('rasm');
//            $file_name = $uploadFile->hashName();
//            $path = $uploadFile->storeAs('/images', $file_name);

            if ($request->hasFile('rasm')) {
                $uploadFile = $request->file('rasm');
                $file_name = $uploadFile->hashName();
                $path = $uploadFile->storeAs('/images', $file_name);
            } else {
                $path = 'images/default.png';
            }
            Uqituvchi::create([
                'fio' => $request->nomi,
                'lavozim' => $request->lavozim,
                'rasm' => $path,
                'mutaxassisligi' => $request->mutaxassisligi,
                'rahbar' => is_null($request->rahbar) ? false : true,
                'uqituvchi_holat_id' => $request->uqituvchi_holat_id,
                'harbiy_unvon_id' => $request->harbiy_unvon_id,
                'fakultet_kafedra_id' => $request->fakultet_kafedra_id,
                'ilmiy_unvon_id' => $request->ilmiy_unvon_id,
                'ilmiy_daraja_id' => $request->ilmiy_daraja_id,
                'faol' => is_null($request->faol) ? false : true,
                'user_id' => $user->id,
                'ohtm_id' => auth()->user()->ohtm_id,

            ]);
        });


        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");

    }

    public function edit(Request $request, $id)
    {
        $uqituvchi = Uqituvchi::where('id', $id)->first();

        if (!$uqituvchi) {
            return redirect()->back()->with('error', 'Uqituvchi topilmadi!');
        }
        $user_id = $uqituvchi->user_id;
        $user = User::where('id', $user_id)->first();
        $permission = Permission::where(['user_id'=>$user_id, 'role_id'=>7])->first();
        $request->validate([
            'nomi' => 'required|max:255',
            'login' => 'required|string|max:255|unique:users,login,' . $user->id,
//            'password' => 'required',
            //'rasm' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'uqituvchi_holat_id' => 'required',
            'til_id' => 'required',
            'lavozim' => 'required',
            'mutaxassisligi' => 'required',
            'harbiy_unvon_id' => 'required',
            'ilmiy_daraja_id' => 'required',
            'fakultet_kafedra_id' => 'required',
        ], [
            'nomi.required' => 'FIO kiritilishi majburiy!',
            'nomi.max' => 'FIO ning uzunligi 255 ta belgidan oshmasligi kerak!',
            'login.required' => 'Login kiritilishi majburiy!',
//            'password.required' => 'Parol kiritilishi majburiy!',
            'uqituvchi_holat_id.required' => 'O\'qituvchi holati kiritilishi majburiy!',
            'til_id.required' => 'Til tanlanishi majburiy!',
            'lavozim.required' => 'Lavozim kiritilishi majburiy!',
            'mutaxassisligi.required' => 'Mutaxasisligi kiritilishi majburiy!',
            'harbiy_unvon_id.required' => 'Harbiy unvon kiritilishi majburiy!',
            'fakultet_kafedra_id' => 'Fakultet & Kafedra kiritilishi kerak',

        ]);

        DB::transaction(function () use ($user, $request ,$uqituvchi) {
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
            $rasmPath = $uqituvchi->rasm; // Eski rasm yo‘qolmasligi uchun

            if ($request->hasFile('rasm')) {
                // Eski rasmni o‘chirish
                if ($uqituvchi->rasm && file_exists(storage_path('app/public/' . $uqituvchi->rasm))) {
                    unlink(storage_path('app/public/' . $uqituvchi->rasm));
                }

                $file = $request->file('rasm');
                $rasmPath = $file->store('public/images'); // Rasmni saqlash
            }
//
//            $uploadFile = $request->file('rasm');
//            $file_name = $uploadFile->hashName();
//            $path = $uploadFile->storeAs('/images', $file_name);
            $uqituvchi -> update([
                'fio' => $request->nomi,
                'lavozim' => $request->lavozim,
                'rasm' => $rasmPath,
                'mutaxassisligi' => $request->mutaxassisligi,
                'rahbar' => is_null($request->rahbar) ? false : true,
                'uqituvchi_holat_id' => $request->uqituvchi_holat_id,
                'harbiy_unvon_id' => $request->harbiy_unvon_id,
                'fakultet_kafedra_id' => $request->fakultet_kafedra_id,
                'ilmiy_unvon_id' => $request->ilmiy_unvon_id,
                'ilmiy_daraja_id' => $request->ilmiy_daraja_id,
                'faol' => is_null($request->faol) ? false : true,
                'user_id' => $user->id,
                'ohtm_id' => auth()->user()->ohtm_id,

            ]);
        });
        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        //dd($id);
        $uqituvchi = Uqituvchi::where('id', $id)->first();

        if (!$uqituvchi) {
            return redirect()->back()->with('error', 'Uqituvchi topilmadi!');
        }
        $user_id = $uqituvchi->user_id;
        $user = User::where('id', $user_id)->first();
        $permission = Permission::where(['user_id'=>$user_id, 'role_id'=>7])->first();
        $permission->delete();
        $uqituvchi->delete();
        $user->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi");
    }
}
