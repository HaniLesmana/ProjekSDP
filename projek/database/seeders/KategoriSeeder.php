<?php

namespace Database\Seeders;

use App\Models\kategori;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $kategori=kategori::create([
            'kategori_nama'=>"Cleaning"
        ]);
        $kategori=kategori::create([
            'kategori_nama'=>"Painting"
        ]);
        $kategori=kategori::create([
            'kategori_nama'=>"Plumbing"
        ]);
        $kategori=kategori::create([
            'kategori_nama'=>"Electrical"
        ]);
        $kategori=kategori::create([
            'kategori_nama'=>"Repair"
        ]);
        $kategori->save();
    }
}
