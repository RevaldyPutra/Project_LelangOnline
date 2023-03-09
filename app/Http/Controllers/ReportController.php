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
        return $pdf->stream('laporan-history-all.pdf');
    }
    public function generatePdfpemenang()
    {
        $historylelangs = HistoryLelang::orderBy('harga', 'desc')->get()->where('status','pemenang');
        $pdf = PDF ::loadview('Petugas.Lelang.cetakhistoryPemenang',['cetakhistorypemenang' => $historylelangs]);

        // Mengatur opsi PDF
        $pdf->setPaper('A4', 'potrait');

        // Mengirimkan file PDF ke browser
        return $pdf->stream('laporan-history-pemenang.pdf');
    }
    public function generatePdfpending()
    {
        $historylelangs = HistoryLelang::orderBy('harga', 'desc')->get()->where('status','pending');
        $pdf = PDF ::loadview('Petugas.Lelang.cetakhistoryPending',['cetakhistorypending' => $historylelangs]);

        // Mengatur opsi PDF
        $pdf->setPaper('A4', 'potrait');

        // Mengirimkan file PDF ke browser
        return $pdf->stream('laporan-history-pending.pdf');
    }
    public function generatePdfgugur()
    {
        $historylelangs = HistoryLelang::orderBy('harga', 'desc')->get()->where('status','gugur');
        $pdf = PDF ::loadview('Petugas.Lelang.cetakhistoryGugur',['cetakhistorygugur' => $historylelangs]);

        // Mengatur opsi PDF
        $pdf->setPaper('A4', 'potrait');

        // Mengirimkan file PDF ke browser
        return $pdf->stream('laporan-history-gugur.pdf');
    }
    public function cetakhistoryall()
    {
        //
        $cetakhistoryLelangs = HistoryLelang::orderBy('harga', 'desc')->get();
        return view('GENERATE-LAPORAN.cetakhistory', compact('cetakhistoryLelangs'));
    }
    public function cetakhistorypemenang()
    {
        //
        $cetakhistoryLelangsPemenang = HistoryLelang::orderBy('harga', 'desc')->get()->where('status','pemenang');
        return view('GENERATE-LAPORAN.cetakhistoryPemenang', compact('cetakhistoryLelangsPemenang'));
    }
    public function cetakhistorypending()
    {
        //
        $cetakhistoryLelangsPending = HistoryLelang::orderBy('harga', 'desc')->get()->where('status','pending');
        return view('GENERATE-LAPORAN.cetakhistoryPending', compact('cetakhistoryLelangsPending'));
    }
    public function cetakhistorygugur()
    {
        //
        $cetakhistoryLelangsGugur = HistoryLelang::orderBy('harga', 'desc')->get()->where('status','gugur');
        return view('GENERATE-LAPORAN.cetakhistoryGugur', compact('cetakhistoryLelangsGugur'));
    }

    public function cetaklelang()
    {
        //
        $cetaklelangs = Lelang::all();
        return view('GENERATE-LAPORAN.cetaklelang', compact('cetaklelangs'));
    }
    public function cetaklelangdibuka()
    {
        //
        $cetaklelangsDibuka = Lelang::all()->where('status','dibuka');
        return view('lelang.cetaklelangDibuka', compact('cetaklelangsDibuka'));
    }
    public function cetaklelangditutup()
    {
        //
        $cetaklelangsDitutup = Lelang::all()->where('status','ditutup');
        return view('lelang.cetaklelangDitutup', compact('cetaklelangsDitutup'));
    }
}
