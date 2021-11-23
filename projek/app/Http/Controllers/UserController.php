<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\Cart;
use App\Models\htransTopup;
use App\Models\kategori;
use App\Models\user;
use App\Models\pegawai;
use App\Models\admin;
use App\Models\logstok;
use App\Models\dtransbarang;
use App\Models\dtranssewa;
use App\Models\htranssewa;

class UserController extends Controller
{
    //DETAIL CART
    function detailcart($id){
        $pegawai = pegawai::where('id',$id)->first();
        $databarang = barang::all();
        // session()->forget(['addons']);
        if(session()->exists('addons')){
            $addons = json_decode(session('addons'),true);
        }
        else{
            $addons = array();
        }
        return view('user.user_detail_cart',['pegawai'=>$pegawai,'databarang'=>$databarang,'addons'=>$addons]);
    }

    // function ajaxgetbarang(){
    //     $databarang = barang::all();
    //     return view('ajaxdetailcart',['databarang',$databarang]);
    // }

    function dotambahaddon(Request $request){
        $barang = barang::where('id',$request->id)->first();
        $new = ['id'=>$barang->id,'barang_nama'=>$barang->barang_nama,'barang_harga'=>$barang->barang_harga,'jumlah'=>$request->jumlah];

        if(session()->exists('addons')){
            $addons = json_decode(session('addons'),true);
            session()->forget(['addons']);

            array_push($addons,$new);
            session([
                "addons" => json_encode($addons)
            ]);
        }
        else{
            $addons = array();
            array_push($addons,$new);
            session([
                "addons" => json_encode($addons)
            ]);
        }
        return redirect('user/detailcart/'.$request->idpegawai);
    }

    function doeditaddon(Request $request){
        if(session()->exists('addons')){
            $addons = json_decode(session('addons'),true);
            $addon = array();
            session()->forget(['addons']);
            for($i = 0; $i < count($addons); $i++){
                if($addons[$i]['id'] == $request->id){
                    $addon = $addons[$i];
                    array_splice($addons,$i,1);
                }
            }

            $addon['jumlah'] = $request->jumlah;
            array_push($addons,$addon);
            session([
                "addons" => json_encode($addons)
            ]);
        }
        return redirect('user/detailcart/'.$request->idpegawai);
    }

    function doremoveaddon($id = '[]',$idpegawai = '[]'){
        if(session()->exists('addons')){
            $addons = json_decode(session('addons'),true);
            session()->forget(['addons']);
            for($i = 0; $i < count($addons); $i++){
                if($addons[$i]['id'] == $id){
                    array_splice($addons,$i,1);
                }
            }
            session([
                "addons" => json_encode($addons)
            ]);
        }
        return redirect('user/detailcart/'.$idpegawai);
    }

    function doaddtocart(){

    }
    //DETAIL CART
}
