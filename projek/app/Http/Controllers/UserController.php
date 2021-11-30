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
use App\Models\chat;
use App\Models\logstok;
use App\Models\dtransbarang;
use App\Models\dtranssewa;
use App\Models\dtranstpwd;
use App\Models\htranssewa;
use Database\Seeders\DtranssewaSeeder;

class UserController extends Controller
{
    //DETAIL CART
    function detailcart($id){

        $pegawai = pegawai::where('id',$id)->first();
        $kategori=kategori::where(strtolower('kategori_nama'),strtolower($pegawai->pegawai_jasa))->first();
        $databarang = barang::where("barang_kategori",$kategori->id)->get();

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
        if($request->tanggal != null){
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
        else{
            return redirect('user/detailcart/'.$request->idpegawai)->with("msg","Pilih tanggal sewa");
        }
    }

    //edit
    public function detaileditcart($id){
        $pegawai = pegawai::where('id',$id)->first();
        $kategori=kategori::where(strtolower('kategori_nama') ,strtolower($pegawai->pegawai_jasa))->first();
        $databarang = barang::where("barang_kategori",$kategori->id)->get();
        $user=user::where('id',session('loggedIn'))->first();
        $cart = cart::where('pegawai_id',$id)->where('user_id',session('loggedIn'))->first();
        // session()->forget(['addons']);
        // if(session()->exists('addons')){
        //     $addons = json_decode(session('addons'),true);
        // }
        // else{
        //     $addons = array();
        // }
        $addons=addon::where("id_user",session('loggedIn'))->where("id_pegawai",$id)->get();
        return view('user.user_detail_cart_update',['cart'=>$cart,'pegawai'=>$pegawai,'user'=>$user,'databarang'=>$databarang,'addons'=>$addons,'id'=>$id]);
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
        //return redirect('user/detaileditcart/'.$request->idpegawai);
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
    public function ongoingtrans(Request $request){
        $dtransewa = dtranssewa::leftJoin('htranssewa', function($join) {
            $join->on('htranssewa.id', '=', 'dtranssewa.hSewa_id');
          })
          ->where('htranssewa.user_id',$request->session()->get("loggedIn"))
          ->get();
        return view("user.ongoingtrans",["dtransewa"=>$dtransewa]);
    }
    //DETAIL CART

    //REMOVE CART
    public function doremovecart($id = '[]'){
        $cart = cart::find($id);
        $addon = addon::where('id_pegawai',$cart->pegawai_id)->where('id_user',$cart->user_id)->delete();
        $cart->delete();
        return redirect('home/transaksi_sewa');

    }
    //REMOVE CART


    public function detailongoing($id){
        $dtransewa=dtranssewa::where("id",$id)->first();
        $pegawai=pegawai::get();
        $dtransbarang=dtransbarang::where("dSewa_id",$id)->get();
        return view('user.detailongoing',["dtransewa"=>$dtransewa,"pegawai"=>$pegawai,"dtransbarang"=>$dtransbarang]);
    }

    public function chat($id,Request $request){
        $pegawai=pegawai::where("id",$id)->first();
        // $request->session()->put("id", $id);
        // $datachat=chat::where(function ($query) {
        //     $query->where('chat_sender', '=', session('loggedIn'))
        //           ->where('chat_destination', '=', session("id"));
        // })->orWhere(function ($query) {
        //     $query->where('chat_sender', '=', session("id"))
        //           ->where('chat_destination', '=',  session('loggedIn'));
        // })->get();
        // session()->forget('id');
        $datachat=chat::where("chat_sender",session()->get('loggedIn'))->where("chat_destination",$id)->get();
        //dd($datachat);
        return view('user.chat',["pegawai"=>$pegawai, "datachat"=>$datachat]);
    }

    public function chat_ajax(Request $request){
        $chat=$request->post("datachat");
        $idpegawai=$request->post("idpegawai");
        // dd((int)session('loggedIn'));
        chat::create([
            "chat_sender"=> (integer)session('loggedIn'),
            "chat_destination"=>(integer)$idpegawai,
            "chat_from"=>"user",
            "chat_text"=>$chat,
        ]);

        // $chat = new chat;
        // $chat->chat_sender = (int)session('loggedIn');
        // $chat->chat_destination = (int)$idpegawai;
        // $chat->chat_text = $chat;
        // $chat->save();




        // $chat=chat::create([
        //     "chat_sender"=> 1,
        //     "chat_destination"=>1,
        //     "chat_text"=>"kuda",
        // ]);
        // $chat->save();
        //return view("user.chat_ajax");
        return $this->chat_ajax2($request);
    }

    public function chat_ajax2(Request $request){
        $pegawai=pegawai::where("id",$request->idpegawai)->first();
        // session()->put("id", $request->idpegawai);
        // $datachat=chat::where(function ($query) {
        //     $query->where('chat_sender', '=', session('loggedIn'))
        //           ->where('chat_destination', '=', session("id"));
        // })->orWhere(function ($query) {
        //     $query->where('chat_sender', '=', session("id"))
        //           ->where('chat_destination', '=',  session('loggedIn'));
        // })->get();
        // session()->forget('id');
        $datachat=chat::where("chat_sender",session()->get('loggedIn'))->where("chat_destination",$request->idpegawai)->get();


        //$datachat=chat::where("chat_sender",session('loggedIn'))->where("chat_destination",$request->idpegawai)->get();
        return view("user.chat_ajax",['datachat'=>$datachat]);
    }


}
