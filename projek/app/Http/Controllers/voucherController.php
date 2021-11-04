<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class voucherController extends Controller
{

    //MASTER VOUCHER
    public function listVoucher()
    {
        $voucher = DB::table('voucher')->get();
        return view('admin.voucher.listVoucher_Admin',['voucher'=>$voucher]);
    }
    public function editVoucher($id){
        $voucher = DB::table('voucher')->where('voucher_id',$id)->get();
        return view('admin.voucher.editVoucher_Admin',['id'=>$id],['voucher'=>$voucher]);
    }
    public function prosesAddVoucher(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'harga' => ['required'],
            'potongan' => 'required',
            'masaberlaku' => 'required',
        ];
        $message = [
            'required'=>':attribute harus diisi'
        ];
        $request->validate($rules, $message);

        $namavoucher = $request->nama;
        $huruf1="";$huruf2="";$spasi=0;
        if(str_contains($namavoucher,' ')){
            $spasi=1;
        }if($spasi==1){
            $ambil = explode(' ',trim($namavoucher));
            $huruf1 = strtoupper($ambil[0]);
            $huruf2 = strtoupper($ambil[1]);
        }else{
            $huruf1 = strtoupper(substr($namavoucher,0,1));
            $huruf2 = strtoupper(substr($namavoucher,1,1));
        }
        $ambil_kode = DB::table('voucher')->select("voucher_id")->get();
        $ctr = 0;
        for ($i = 0 ; $i < sizeof($ambil_kode) ; $i++){
            $kodeb = (int)substr($ambil_kode,3);
            if($ctr <= $kodeb){
                $ctr++;
            }
        }
        $urutan = str_pad($ctr,4,'0',STR_PAD_LEFT);
        $kodeconcate = "V".$huruf1.$huruf2.$urutan;
        try {
            DB::table('voucher')->insert(
                [
                    'voucher_id' => $kodeconcate,
                    'voucher_nama' => $namavoucher,
                    'voucher_harga'=> $request->harga,
                    'voucher_potongan'=> $request->potongan,
                    'voucher_masaberlaku' =>$request->masaberlaku,
                    'voucher_status'=>1
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
            'potongan' => 'required',
            'masaberlaku' => 'required',
        ];
        $message = [
            'required'=>':attribute harus diisi'
        ];
        $request->validate($rules, $message);
        if($request->status=='Active'){
            $status=1;
        }else{
            $status=0;
        }
        try {
            DB::table('voucher')->where('voucher_id',$id)->update(
                [
                    'voucher_nama' => $request->nama,
                    'voucher_harga'=> $request->harga,
                    'voucher_potongan'=> $request->potongan,
                    'voucher_masaberlaku' =>$request->masaberlaku,
                    'voucher_status'=>$status
                ]
            );
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

        return $this->listVoucher();
    }
    public function prosesDeleteVoucher($id)
    {
        DB::table('voucher')->where('voucher_id',$id)->delete();
        return $this->listVoucher();
    }

    //END MASTER VOUCHER
}
