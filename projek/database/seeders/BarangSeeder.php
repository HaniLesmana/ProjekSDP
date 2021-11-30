<?php

namespace Database\Seeders;

use App\Models\barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $barang=barang::create([
            'barang_kategori'=>'1',
            'barang_nama'=>'sapu',
            'barang_harga'=>13,
            'barang_stok'=>10
        ]);
        $barang->save();
    }
}
