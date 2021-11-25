<?php

namespace Database\Seeders;

use App\Models\dtransbarang;
use Illuminate\Database\Seeder;

class DtransbarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dtransbarang=dtransbarang::create([
            "barang_id"=>"1",
            "barang_jumlah"=>"1",
            "dSewa_id"=>"1",
        ]);
        $dtransbarang->save();
    }
}
