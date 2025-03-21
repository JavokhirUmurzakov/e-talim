<?php

namespace App\Http\Controllers\ohtm_fakkafboshliq;

use App\Http\Controllers\Controller;
use App\Models\Fanlar;
use App\Models\Guruh;
use Illuminate\Http\Request;

class GuruhController extends Controller
{
    public function index()
    {
        // dd(auth()->user()->uqituvchi->fakultet_kafedra_id);
        $guruhlar=Guruh::where('guruhs.fakultet_kafedra_id',auth()->user()->uqituvchi->fakultet_kafedra_id)
                    ->select('guruhs.*')->get();
        return view('ohtm_fakkafboshliq.guruh', compact('guruhlar'));
    }
}
