<?php

namespace App\Http\Controllers\ohtm_uquv_bulimi;

use App\Http\Controllers\Controller;
use App\Models\Guruh;
use Illuminate\Http\Request;

class KafGuruhlarController extends Controller
{
    public function index($kafedra_id){

        $guruhlar=Guruh::where('guruhs.fakultet_kafedra_id', $kafedra_id)
            ->get();
        return view('ohtm_uquv_bulimi.kaf_guruhlar', compact('guruhlar'));
    }
}
