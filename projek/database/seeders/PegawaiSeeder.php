<?php

namespace Database\Seeders;

use App\Models\pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pegawai=pegawai::create([
            "pegawai_nik"=>"P001",
            "pegawai_email"=>"asdf@a.com",
            "pegawai_nama"=>"asdf",
            "pegawai_telepon"=>"41234",
            "pegawai_alamat"=>"asdf",
            "pegawai_password"=>md5("123"),
            "pegawai_jasa"=>"Cleaning",
            "pegawai_saldo"=>10000,
        ]);

        $pegawai=pegawai::create([
            "pegawai_nik"=>"P002",
            "pegawai_email"=>"fdsa@a.com",
            "pegawai_nama"=>"fdsa",
            "pegawai_telepon"=>"41234",
            "pegawai_alamat"=>"fdsa",
            "pegawai_password"=>md5("123"),
            "pegawai_jasa"=>"Plumbing",
            "pegawai_saldo"=>23000
        ]);

        $pegawai->save();
    }
}
