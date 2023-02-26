<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use App\Models\HistoryLelang;
use App\Models\Lelang;
use App\Models\Barang;
use App\Models\User;
use PDF;
class ReportController extends Controller
{
    //
    public function generatePdf()
    {
        $historylelangs = HistoryLelang::orderBy('harga', 'desc')->get();
        $pdf = PDF ::loadview('Petugas.Lelang.cetakhistory',['cetakhistory' => $historylelangs]);

        // Mengatur opsi PDF
        $pdf->setPaper('A4', 'potrait');

        // Mengirimkan file PDF ke browser
        return $pdf->stream('laporan-user.pdf');
    }
}
