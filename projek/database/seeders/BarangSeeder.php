<?php

namespace Database\Seeders;

use App\Models\barang;
use App\Models\kategori;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
//use Kategori;

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

        // $kategori = kategori::all();
        // $katgori=kategori::inRandomOrder()->get();
        // $kategori = kategori::all()->random(1)->first()->id;
        Barang::factory()->state(
            new Sequence(
                function($sequence){
                    return[
                        "barang_kategori" => kategori::inRandomOrder()->first()->id
                    ];
                }
            )
        )->count(50)->create();
    }
}
