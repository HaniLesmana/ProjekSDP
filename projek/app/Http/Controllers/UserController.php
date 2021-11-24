<?php

namespace App\Http\Controllers;

use App\Models\addon;
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
        $kategori=$pegawai->pegawai_jasa;
        $databarang = barang::where("barang_kategori",$kategori)->get();
        $user=user::where('id',session('loggedIn'))->first();
        // session()->forget(['addons']);
        if(session()->exists('addons')){
            $addons = json_decode(session('addons'),true);
        }
        else{
            $addons = array();
        }
        return view('user.user_detail_cart',['pegawai'=>$pegawai,'user'=>$user,'databarang'=>$databarang,'addons'=>$addons]);
    }

    function ajaxgetbarang(){
        $databarang = barang::all();
        return view('user.ajaxdetailcart',['databarang',$databarang]);
    }

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

    function dosavedetailcart(Request $request){
        cart::create([
            "user_id"=>$request->session()->get("loggedIn"),
            "pegawai_id"=>$request->idpegawai,
            "tanggal_sewa"=>$request->tanggal,
            "alamat"=>$request->alamat
        ]);
        if(session()->exists('addons')){
            $addons = json_decode(session('addons'),true);
            session()->forget(['addons']);
            foreach ($addons as $key => $value) {
                addon::create([
                    'id_pegawai'=>$request->idpegawai,
                    'id_user'=>$request->session()->get("loggedIn"),
                    'id_barang'=>$value['id'],
                    'jumlah'=>$value['jumlah'],
                ]);
            }
        }
        return redirect("/home/user");
    }

    //edit
    public function detaileditcart($id){
        $pegawai = pegawai::where('id',$id)->first();
        $kategori=$pegawai->pegawai_jasa;
        $databarang = barang::where("barang_kategori",$kategori)->get();
        $user=user::where('id',session('loggedIn'))->first();
        // session()->forget(['addons']);
        // if(session()->exists('addons')){
        //     $addons = json_decode(session('addons'),true);
        // }
        // else{
        //     $addons = array();
        // }
        $addons=addon::where("id_user",session('loggedIn'))->where("id_pegawai",$id)->get();
        return view('user.user_detail_cart_update',['pegawai'=>$pegawai,'user'=>$user,'databarang'=>$databarang,'addons'=>$addons,'id'=>$id]);
    }
    function dotambahaddonedit(Request $request){
        addon::create([
            'id_pegawai'=>$request->idpegawai,
            'id_user'=>$request->session()->get("loggedIn"),
            'id_barang'=>$request->idbarang,
            'jumlah'=>$request->jumlah,
        ]);
        return redirect('user/detaileditcart/'.$request->idpegawai);
    }

    function doeditaddonedit(Request $request){
        addon::where('id',$request->idaddon)->update([
            'jumlah'=>$request->jumlah,
        ]);
        return redirect('user/detaileditcart/'.$request->idpegawai);
    }

    function doremoveaddonedit($id = '[]',$idpegawai = '[]'){
        // if(session()->exists('addons')){
        //     $addons = json_decode(session('addons'),true);
        //     session()->forget(['addons']);
        //     for($i = 0; $i < count($addons); $i++){
        //         if($addons[$i]['id'] == $id){
        //             array_splice($addons,$i,1);
        //         }
        //     }
        //     session([
        //         "addons" => json_encode($addons)
        //     ]);
        // }
        addon::where("id",$id)->delete();
        return redirect('user/detaileditcart/'.$idpegawai);
    }



    public function doupdatedetailcart(Request $request){
        cart::where("user_id",$request->session()->get("loggedIn"))->where("pegawai_id",$request->idpegawai)->update([
            "tanggal_sewa"=>$request->tanggal,
            "alamat"=>$request->alamat
        ]);
        if(session()->exists('addons')){
            $addons = json_decode(session('addons'),true);
            session()->forget(['addons']);
            foreach ($addons as $key => $value) {
                addon::create([
                    'id_pegawai'=>$request->idpegawai,
                    'id_user'=>$request->session()->get("loggedIn"),
                    'id_barang'=>$value['id'],
                    'jumlah'=>$value['jumlah'],
                ]);
            }
        }
        return redirect("/home/user");
    }
    //DETAIL CART
}
