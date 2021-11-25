<?php

namespace Database\Seeders;

use App\Models\htranssewa;
use Illuminate\Database\Seeder;

class HtranssewaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $htranssewa=htranssewa::create([
            "user_id"=>"1",
            "hSewa_total"=>2000,
            "hSewa_status"=>2,
            "voucher_id"=>1,
            "alamat"=>"alamat"
        ]);
        $htranssewa->save();
    }
}
