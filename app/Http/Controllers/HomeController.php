<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->permission == null || Auth::user()->permission->role == null){
            return redirect('/login');
        }
        elseif(Auth::user()->permission->role->qs_nomi == "mv_admin"){
            return redirect('/mv_admin');
        }
        elseif(Auth::user()->permission->role->qs_nomi == "mv_upvka"){
            return redirect('/mv_upvka');
        }
        elseif(Auth::user()->permission->role->qs_nomi == "ohtm_admin"){
            return redirect('/ohtm_admin');
        }
        elseif(Auth::user()->permission->role->qs_nomi == "ohtm_boshliq"){
            return redirect('/ohtm_boshliq');
        }
        elseif(Auth::user()->permission->role->qs_nomi == "ohtm_uquv_bulimi"){
            return redirect('/uquvbulumi/uquv_bulimi_home');
        }
        elseif(Auth::user()->permission->role->qs_nomi == "ohtm_fak_kaf_boshliq"){
            return redirect('/ohtm_fakkafboshliq');
        }
        elseif(Auth::user()->permission->role->qs_nomi == "ohtm_uqituvchi"){
            return redirect('/ohtm_uqituvchi/home');
        }
        elseif(Auth::user()->permission->role->qs_nomi == "ohtm_tinglovchi"){
            return redirect('/ohtm_tinglovchi/home');
        }
        else {
            Session::flush();
            Auth::logout();
            return Redirect('login');
        }

//        return view('home');
    }

}
