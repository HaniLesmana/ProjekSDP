<?php

namespace Database\Seeders;

use App\Models\dtranssewa;
use Illuminate\Database\Seeder;

class DtranssewaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dtranssewa=dtranssewa::create([
            "pegawai_id"=>1,
            "dSewa_tanggal"=>2021-11-30,
            "dSewa_harga"=>12000,
            "dSewa_alamat"=>"asd 123",
            "hSewa_id"=>1,
        ]);
        $dtranssewa->save();
    }
}
