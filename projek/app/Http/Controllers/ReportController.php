<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\dtransbarang;
use App\Models\dtranssewa;
use App\Models\htransbarang;
use App\Models\htranssewa;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class ReportController extends Controller
{
    function transaksiUser(Request $request)
    {
        $htranssewa = htranssewa::all();
        $dtranssewa = dtranssewa::all();
        return view('admin.report.transaksi_user',['htranssewa'=>$htranssewa, 'dtranssewa'=> $dtranssewa]);
    }
    function pdfTransaksiUser(Request $request)
    {
        // instantiate and use the dompdf class
        $htranssewa = htranssewa::all();
        $dtranssewa = dtranssewa::all();
        $html =view('admin.report.trans_user_pdf',['htranssewa'=>$htranssewa,'dtranssewa'=>$dtranssewa]);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
    function transaksiBarang(Request $request)
    {
        $htranssewa = htransbarang::all();
        $dtranssewa = dtransbarang::all();
        $barang = barang::all();
        return view('admin.report.pembelian_barang',['htranssewa'=>$htranssewa, 'dtranssewa'=> $dtranssewa, 'barang'=>$barang]);
    }
    function pdfTransaksiBarang(Request $request)
    {
        // instantiate and use the dompdf class
        $htranssewa = htransbarang::all();
        $dtranssewa = dtransbarang::all();
        $barang = barang::all();
        $html =view('admin.report.trans_barang_pdf',['htranssewa'=>$htranssewa,'dtranssewa'=>$dtranssewa,'barang'=>$barang]);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
