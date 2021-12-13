<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\dtransbarang;
use App\Models\dtranssewa;
use App\Models\dtranstpwd;
use App\Models\htransbarang;
use App\Models\htranssewa;
use App\Models\htransTopup;
use App\Models\pegawai;
use App\Models\review;
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
        $htranssewa = htranssewa::all();
        $dtranssewa = dtranssewa::all();
        $barang = barang::all();
        return view('admin.report.pembelian_barang',['htranssewa'=>$htranssewa,'dtranssewa'=>$dtranssewa,'barang'=>$barang]);
    }
    function pdfTransaksiBarang(Request $request)
    {
        // instantiate and use the dompdf class
        $htranssewa = dtranssewa::all();
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
    function reportTopUp(Request $request)
    {
        $htranstpwd = htransTopup::all();
        $dtranstpwd = dtranstpwd::all();
        return view('admin.report.topupwithdraw',['htranstpwd'=>$htranstpwd, 'dtranstpwd'=> $dtranstpwd]);
    }
    function topupPDF(Request $request)
    {
        $htranstpwd = htransTopup::all();
        $dtranstpwd = dtranstpwd::all();
        $html =view('admin.report.topupPDF',['htranstpwd'=>$htranstpwd, 'dtranstpwd'=> $dtranstpwd]);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
    public function reporttpwd_ajax($id1,$id2)
    {
        $htranstpwd = htransTopup::where('htranstpwd_tanggal','=>',$id1)->where('htranstpwd_tanggal','<=',$id2)->get();
        $dtranstpwd = dtranstpwd::all();
        return view('admin.report.topupwithdraw_ajax',['htranstpwd'=>$htranstpwd, 'dtranstpwd'=> $dtranstpwd]);
    }

    public function reportsewa_ajax($id1,$id2)
    {
        $htranssewa = htranssewa::where('created_at','=>',$id1)->where('created_at','<=',$id2)->get();
        $dtranssewa = dtranssewa::all();
        return view('admin.report.transuser_ajax',['htranssewa'=>$htranssewa, 'dtranssewa'=> $dtranssewa]);
    }
    function reportRatingReview()
    {
        $rating = review::all();
        $pegawai = pegawai::all();

        return view('admin.report.reportRating',['rating'=>$rating, 'pegawai'=> $pegawai]);
    }
    function reportRatingReviewPDF(Request $request)
    {
        $rating = review::all();
        $pegawai = pegawai::all();
        $html =view('admin.report.reportRatingPDF',['rating'=>$rating, 'pegawai'=> $pegawai]);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
    public function reportpembelianbarang_ajax($id1,$id2){
        //$htranssewa = htranssewa::where()->get();
        $dtranssewa = dtranssewa::where("dSewa_tanggal",'>',$id1)->where("dSewa_tanggal",'<=',$id2)->get();
        $barang = barang::all();
        //dd($dtranssewa);
        return view('admin.report.pembelian_barangajax',['dtranssewa'=>$dtranssewa,'barang'=>$barang]);
    }
    function reportPendapatan()
    {
        $dtranssewa = dtranssewa::all();
        $pegawai = pegawai::all();
        return view('admin.report.reportPendapatan',['dtranssewa'=> $dtranssewa],['pegawai'=> $pegawai]);
    }
    function reportPendapatanPDF(Request $request)
    {
        $pegawai = pegawai::all();
        $html =view('admin.report.reportPendapatan',['pegawai'=> $pegawai]);
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
