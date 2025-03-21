<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuruhlarUqituvchiController extends Controller
{
    public function index()
    {
        return view('ohtm_uqituvchi.guruhlar');
    }
}
