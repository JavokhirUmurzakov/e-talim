<?php

namespace App\Http\Controllers\mv_upvka;

use App\Http\Controllers\Controller;
use App\Models\Ohtm;
use App\Models\Permission;
use App\Models\Til;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OhtmAdminController extends Controller
{
    public function index()
    {
        $users = Permission::leftJoin('users', 'users.id', '=', 'permissions.user_id')
            ->leftJoin('ohtms', 'ohtms.id', '=', 'users.ohtm_id')
            ->leftJoin('tils', 'tils.id', '=','users.til_id')
            ->where('role_id', 5)
            ->select('users.*', 'ohtms.qs_nomi as user_ohtm', 'tils.nomi as user_til')
            ->orderBy('users.created_at')
            ->get();
        $ohtms = Ohtm::all();
        $tils = Til::all();

        return view('mv_upvka.crud.admins', compact('users', 'tils', 'ohtms'));

    }
    public function store(Request $request)
    {
        $request->validate([
           'nomi'=>'required',
           'login'=>'required',
            'password'=>'required',
            'ohtm_id'=>'required',
            'til_id'=>'required',
            'faol'=>'required'
        ]);

        $user = User::create([
            'nomi'=>$request->nomi,
            'login'=>$request->login,
            'password'=>Hash::make($request->password),
            'til_id'=>$request->til_id,
            'ohtm_id'=>$request->ohtm_id,
            'faol'=>is_null($request->faol)?false:true
        ]);
        Permission::create([
            'user_id'=>$user->id,
            'role_id'=>5
        ]);

        return redirect()->back()->withSuccess("Ma'lumot qo'shildi!");

    }
    public function edit(Request $request, $id)
    {
        $user = User::where(['id'=>$id])->first();
        $permission = Permission::where(['user_id'=>$id, 'role_id'=>5])->first();
        $request->validate([
            'nomi'=>'required',
            'login'=>'required',
            'password'=>'required',
            'ohtm_id'=>'required',
            'til_id'=>'required'
        ]);
        $user->update([
            'nomi'=>$request->nomi,
            'login'=>$request->login,
            'password'=>Hash::make($request->password),
            'til_id'=>$request->til_id,
            'ohtm_id'=>$request->ohtm_id,
            'faol'=>is_null($request->faol)?false:true
        ]);
        return redirect()->back()->withSuccess("Ma'lumot yangilandi!");
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $user = User::where('id', $id)->first();
        $permission = Permission::where(['user_id'=>$id, 'role_id'=>5])->first();
        $permission->delete();
        $user->delete();

        return redirect()->back()->withSuccess("Ma'lumot o'chirildi");
    }
}
