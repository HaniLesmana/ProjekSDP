<?php

namespace Database\Seeders;

use App\Models\voucher;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $voucher=voucher::create([
            "voucher_nama"=>"Promo 11-11",
            "voucher_harga"=>5,
            "voucher_potongan"=>10,
        ]);
        $voucher->save();
    }
}
