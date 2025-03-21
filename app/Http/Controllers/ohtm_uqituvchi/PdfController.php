<?php

namespace App\Http\Controllers\ohtm_uqituvchi;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Videmost;
use App\Models\VidemostBaho;

class PdfController extends Controller
{
    public function downloadPdf()
    {

        // PDF sahifasini yuklash
        $pdf = Pdf::loadView('ohtm_uqituvchi.videmost_baho', compact('videmost'));

        // Foydalanuvchiga PDF faylni yuklash
        return $pdf->download('videmost.pdf');
    }
}
