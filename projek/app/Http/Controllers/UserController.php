<?php

namespace App\Http\Controllers;

use App\Mail\TransaksiSelesai;
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
use App\Models\logsaldo;
use App\Models\review;
use App\Models\user_voucher;
use App\Models\voucher;
use App\Notifications\CheckoutNotification;
use Carbon\Carbon;
use Database\Seeders\DtranssewaSeeder;
// use Facade\FlareClient\Http\Client;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use Xendit\Xendit;

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
        $new = ['id'=>$barang->id,'barang_nama'=>$barang->barang_nama,'barang_harga'=>$barang->barang_harga,'jumlah'=>$request->jumlah,'barang_photo'=>$request->photo];

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
        //   ->where("dSewa_status_accpegawai",1)
        //   ->orwhere("dSewa_status_accpegawai",2)
        //->whereDate('dSewa_tanggal', '=', Carbon::now()->format("Y-m-d"))
        ->get();
        // dd(Carbon::now()->format("Y-m-d"));
        $t=array();
        foreach ($dtransewa as $key => $dt) {
            if($dt->dSewa_status_accpegawai==1||$dt->dSewa_status_accpegawai==2){
                array_push($t,$dt);
            }
        }
        return view("user.ongoingtrans",["dtransewa"=>$t]);
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

    public function status_pesanan_finish($id){
        dtranssewa::where("id",$id)->update([
            "dSewa_status_accpegawai"=>3
        ]);
        $dtransewa=dtranssewa::where("id",$id)->first();
        $saldo=(pegawai::where("id",$dtransewa->pegawai_id)->first()->pegawai_saldo)+$dtransewa->dSewa_harga;
        pegawai::where("id",$dtransewa->pegawai_id)->update([
            "pegawai_saldo"=>$saldo
        ]);

        $dtransbarang=dtransbarang::where("dSewa_id",$id)->get();
        $total=0;
        foreach ($dtransbarang as $key => $db) {
            $total=$total+$db->barang->barang_harga;
        }
        $saldo=(pegawai::where("id",$dtransewa->pegawai_id)->first()->pegawai_saldo)+$total;
        logsaldo::create([
            "dtrans_id"=>$dtransewa->id,
            "jumlah"=>$total,
            "jenis"=>"0",
        ]);
        admin::where("id",1)->update([
            "admin_saldo"=>$saldo
        ]);

        //MAIL TO USER
        Mail::to($dtransewa->htranssewa->user->user_email)->send(new TransaksiSelesai($id,"0"));

        //MAIL TO PEGAWAI
        Mail::to($dtransewa->pegawai->pegawai_email)->send(new TransaksiSelesai($id,"1"));

        return redirect("/home/ongoingtrans");
    }
    public function history(Request $request){
        $dtransewa = dtranssewa::leftJoin('htranssewa', function($join) {
            $join->on('htranssewa.id', '=', 'dtranssewa.hSewa_id');
        })
        ->where('htranssewa.user_id',$request->session()->get("loggedIn"))
        ->get();
        return view("user.history",["dtransewa"=>$dtransewa]);
    }
    public function history_filter_pegawai($id,$id1,Request $request){
        if ($id1=="Any"){
            $dtransewa = dtranssewa::leftJoin('htranssewa', function($join) {
                $join->on('htranssewa.id', '=', 'dtranssewa.hSewa_id');
            })
            ->where('htranssewa.user_id',$request->session()->get("loggedIn"))
            ->get();
        }
        else{
            $dtransewa = dtranssewa::leftJoin('htranssewa', function($join) {
                $join->on('htranssewa.id', '=', 'dtranssewa.hSewa_id');
            })
            ->where('htranssewa.user_id',$request->session()->get("loggedIn"))
            ->where('dtranssewa.dSewa_status_accpegawai',$id1)
            ->get();
        }
        $arr=array();
        foreach ($dtransewa as $key => $dt) {
            if (str_contains($dt->pegawai->pegawai_nama,$id)){
                array_push($arr,$dt);
            }
        }
        return view("user.history_filter_pegawai",["dtransewa"=>$arr]);
    }
    public function history_filter_pegawai_status($id,Request $request){
        if ($id=="Any"){
            $dtransewa = dtranssewa::leftJoin('htranssewa', function($join) {
                $join->on('htranssewa.id', '=', 'dtranssewa.hSewa_id');
            })
            ->where('htranssewa.user_id',$request->session()->get("loggedIn"))
            ->get();
            return view("user.history_filter_pegawai",["dtransewa"=>$dtransewa]);
        }
        else{
            $dtransewa = dtranssewa::leftJoin('htranssewa', function($join) {
                $join->on('htranssewa.id', '=', 'dtranssewa.hSewa_id');
            })
            ->where('htranssewa.user_id',$request->session()->get("loggedIn"))
            ->where('dtranssewa.dSewa_status_accpegawai',$id)
            ->get();
        }
        return view("user.history_filter_pegawai",["dtransewa"=>$dtransewa]);
    }

    public function midtranssewa(Request $request){
        $client = new Client();
        $price = 150000;
        $response = $client->post('https://api.sandbox.midtrans.com/v2/charge',
            [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Basic U0ItTWlkLXNlcnZlci1iR3NldXl4WmhBOXFKWDFoUFhQdG9QZlc6',
                    'Content-Type' => 'application/json'
                ],
                'body' => json_encode([
                    'payment_type' => 'bank_transfer',
                    'transaction_details' => [
                        'order_id' => '1638375694689',
                        'gross-amount' => $price
                    ],
                    'bank-transfer' => [
                        'bank' => 'bca'
                    ]
                ])
            ]);
        $data = json_decode($response->getBody());
        return response()->json($data);

    }
    public function rating($id){
        // $dtransewa=dtranssewa::where("pegawai_id",$id)->get();
        $review=review::where("pegawai_id",$id)->get();
        $star5=0;
        $star4=0;
        $star3=0;
        $star2=0;
        $star1=0;

        $total_star=count($review);
        foreach ($review as $key => $r) {
            if ($r->rating==5){
                $star5=$star5+1;
            }
            if ($r->rating==4){
                $star4=$star4+1;
            }
            if ($r->rating==3){
                $star3=$star3+1;
            }
            if ($r->rating==2){
                $star2=$star2+1;
            }
            if ($r->rating==1){
                $star1=$star1+1;
            }
        }

        $rata_star=0;
        $persen5=0;
        $persen4=0;
        $persen3=0;
        $persen2=0;
        $persen1=0;
        if($total_star!=0){
            $rata_star=((5*$star5)+(4*$star4)+(3*$star3)+(2*$star2)+$star1)/$total_star;
            $persen5=($star5/$total_star)*100;
            $persen4=($star4/$total_star)*100;
            $persen3=($star3/$total_star)*100;
            $persen2=($star2/$total_star)*100;
            $persen1=($star1/$total_star)*100;
        }
        //dd($star5." ".$star4." ".$star3." ".$star2." ".$star1." ".$total_star);
        //dd(round($rata_star));
        return view("user.rating",["review"=>$review,"id"=>$id,"rata_star"=>round($rata_star),"total_star"=>$total_star,"persen5"=>round($persen5),"persen4"=>round($persen4),"persen3"=>round($persen3),"persen2"=>round($persen2),"persen1"=>round($persen1)]);
    }
    public function ajax_rating(Request $request,$id,$id1,$id2){
        review::create([
            'user_id'=>session("loggedIn"),
            'pegawai_id'=>$id2,
            'rating'=>$id,
            'review'=>$id1
        ]);
        //$review=review::where("pegawai_id",$id2)->get();

        $review=review::where("pegawai_id",$id2)->get();
        $star5=0;
        $star4=0;
        $star3=0;
        $star2=0;
        $star1=0;

        $total_star=count($review);
        foreach ($review as $key => $r) {
            if ($r->rating==5){
                $star5=$star5+1;
            }
            if ($r->rating==4){
                $star4=$star4+1;
            }
            if ($r->rating==3){
                $star3=$star3+1;
            }
            if ($r->rating==2){
                $star2=$star2+1;
            }
            if ($r->rating==1){
                $star1=$star1+1;
            }
        }

        $rata_star=0;
        $persen5=0;
        $persen4=0;
        $persen3=0;
        $persen2=0;
        $persen1=0;
        if($total_star!=0){
            $rata_star=($star5+$star4+$star3+$star2+$star1)/$total_star;
            $persen5=($star5/$total_star)*100;
            $persen4=($star4/$total_star)*100;
            $persen3=($star3/$total_star)*100;
            $persen2=($star2/$total_star)*100;
            $persen1=($star1/$total_star)*100;
        }

        //return view("user.rating_ajax",["review"=>$review,"id"=>$id2]);
        return view("user.rating_ajax",["review"=>$review,"id"=>$id2,"rata_star"=>round($rata_star),"total_star"=>$total_star,"persen5"=>round($persen5),"persen4"=>round($persen4),"persen3"=>round($persen3),"persen2"=>round($persen2),"persen1"=>round($persen1)]);
    }
}
