<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\user_voucher;
use App\Models\voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class voucherController extends Controller
{

    //MASTER VOUCHER
    public function listVoucher()
    {
        $voucher = voucher::get();
        return view('admin.voucher.listVoucher_Admin',['voucher'=>$voucher]);
    }
    public function editVoucher($id){
        $voucher = voucher::where('id',$id)->get();
        return view('admin.voucher.editVoucher_Admin',['id'=>$id],['voucher'=>$voucher]);
    }
    public function prosesAddVoucher(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'harga' => ['required'],
            'potongan' => 'required'
        ];
        $message = [
            'required'=>':attribute harus diisi'
        ];
        $request->validate($rules, $message);

        $namavoucher = $request->nama;
        // $huruf1="";$huruf2="";$spasi=0;
        // if(str_contains($namavoucher,' ')){
        //     $spasi=1;
        // }if($spasi==1){
        //     $ambil = explode(' ',trim($namavoucher));
        //     $huruf1 = strtoupper($ambil[0]);
        //     $huruf2 = strtoupper($ambil[1]);
        // }else{
        //     $huruf1 = strtoupper(substr($namavoucher,0,1));
        //     $huruf2 = strtoupper(substr($namavoucher,1,1));
        // }
        // $ambil_kode = DB::table('vouchers')->select("voucher_id")->get();
        // $ctr = 0;
        // for ($i = 0 ; $i < sizeof($ambil_kode) ; $i++){
        //     $kodeb = (int)substr($ambil_kode,3);
        //     if($ctr <= $kodeb){
        //         $ctr++;
        //     }
        // }
        // $urutan = str_pad($ctr,4,'0',STR_PAD_LEFT);
        // $kodeconcate = "V".$huruf1.$huruf2.$urutan;
        try {
            voucher::insert(
                [
                    'voucher_nama' => $namavoucher,
                    'voucher_harga'=> $request->harga,
                    'voucher_potongan'=> $request->potongan
                ]
            );
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

        return $this->listVoucher();

    }
    public function prosesEditVoucher(Request $request, $id)
    {

        $rules = [
            'nama' => 'required',
            'harga' => ['required'],
            'potongan' => 'required'
        ];
        $message = [
            'required'=>':attribute harus diisi'
        ];
        $request->validate($rules, $message);
        try {
            voucher::where('id',$id)->update(
                [
                    'voucher_nama' => $request->nama,
                    'voucher_harga'=> $request->harga,
                    'voucher_potongan'=> $request->potongan
                ]
            );
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

        return $this->listVoucher();
    }
    public function prosesDeleteVoucher($id)
    {
        voucher::where('id',$id)->delete();
        return $this->listVoucher();
    }

    //END MASTER VOUCHER


    function transvoucher(){
        $datavoucher = voucher::all();
        return view("user.user_voucher",['datavoucher'=>$datavoucher]);
    }

    function dotransvoucher(Request $request){
        $datavoucher = voucher::all();
        $arrVoucher = [];
        $arrJumlah = [];
        $inputVoucher = $request->post('jumlah');
        for ($i=0; $i < count($datavoucher); $i++) {
            $idv = $datavoucher[$i]->id;
            if($inputVoucher[$i] > 0){
                array_push($arrVoucher,$datavoucher[$i]);
                array_push($arrJumlah,$inputVoucher[$i]);
            }
        }
        for ($i=0; $i < count($arrVoucher); $i++) {
            for ($j=0; $j < $arrJumlah[$i]; $j++) {
                user_voucher::create(
                    [
                        'user_id' => session('loggedIn'),
                        'voucher_id'=> $arrVoucher[$i]->id
                    ]
                );
            }
        }

        $total = $request->totalHidden;
        $oldSaldo = user::where('id',session('loggedIn'))->first()->user_saldo;
        if($oldSaldo >= $total){
            $newsaldo = $oldSaldo - $total;
            user::where('id',session('loggedIn'))->update(
                ['user_saldo'=>$newsaldo]
            );
            return redirect("/home/user");
        }
        else{
            return back()->withErrors(['msg' => 'Saldo tidak mencukupi']);
        }
    }
}
