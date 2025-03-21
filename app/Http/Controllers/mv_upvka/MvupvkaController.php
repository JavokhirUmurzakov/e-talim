<?php

namespace App\Http\Controllers\mv_upvka;

use App\Http\Controllers\Controller;
use App\Models\Ohtm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MvupvkaController extends Controller
{
    public function index(){
        $ohtms = Ohtm::all();
        Session::put('ohtms', $ohtms);
        return view('mv_upvka.home');
    }
}
