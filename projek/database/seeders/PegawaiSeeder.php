<?php

namespace Database\Seeders;

use App\Models\pegawai;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
            "password"=>bcrypt('123'),//  "$2a$12$/FMItufb16oLVyxB1N0IsOl4E4u29lhM92huNmzKnnFE13Uq8vNx6",//123
            "pegawai_jasa"=>"Cleaning",
            "pegawai_saldo"=>10000,
            "pegawai_deskripsi"=>"sudah pernah menjadi pegawai rumah tangga"
        ]);

        //

        $pegawai=pegawai::create([
            "pegawai_nik"=>"P002",
            "pegawai_email"=>"fdsa@a.com",
            "pegawai_nama"=>"fdsa",
            "pegawai_telepon"=>"41234",
            "pegawai_alamat"=>"fdsa",
            "password"=>bcrypt("123"),
            "pegawai_jasa"=>"Plumbing",
            "pegawai_saldo"=>23000,
            "pegawai_deskripsi"=>"sudah berpengalaman dalam menjalankan tugas",
        ]);

        $pegawai=pegawai::create([
            "pegawai_nik"=>"P003",
            "pegawai_email"=>"aaaa@a.com",
            "pegawai_nama"=>"aaaa",
            "pegawai_telepon"=>"41234",
            "pegawai_alamat"=>"aaaa",
            "password"=>bcrypt("123"),
            "pegawai_jasa"=>"Painting",
            "pegawai_saldo"=>23000,
            "pegawai_deskripsi"=>"sudah berpengalaman dalam menjalankan tugas",
        ]);

        $pegawai=pegawai::create([
            "pegawai_nik"=>"P004",
            "pegawai_email"=>"ssss@a.com",
            "pegawai_nama"=>"ssss",
            "pegawai_telepon"=>"41234",
            "pegawai_alamat"=>"ssss",
            "password"=>bcrypt("123"),
            "pegawai_jasa"=>"Electrical",
            "pegawai_saldo"=>23000,
            "pegawai_deskripsi"=>"sudah berpengalaman dalam menjalankan tugas",
        ]);

        $pegawai=pegawai::create([
            "pegawai_nik"=>"P005",
            "pegawai_email"=>"dddd@a.com",
            "pegawai_nama"=>"dddd",
            "pegawai_telepon"=>"41234",
            "pegawai_alamat"=>"dddd",
            "password"=>bcrypt("123"),
            "pegawai_jasa"=>"Repair",
            "pegawai_saldo"=>23000,
            "pegawai_deskripsi"=>"sudah berpengalaman dalam menjalankan tugas",
        ]);

        $pegawai->save();

        Pegawai::factory()->count(20)->state(
            new Sequence(
                function($sequence){
                    return[

                    ];
                }
            )
        )->create();
    }
}
