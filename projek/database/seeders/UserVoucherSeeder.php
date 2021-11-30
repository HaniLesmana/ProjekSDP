<?php

namespace Database\Seeders;

use App\Models\user_voucher;
use Illuminate\Database\Seeder;

class UserVoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user_voucher=user_voucher::create([
            "user_id"=>1,
            "voucher_id"=>1
        ]);
        $user_voucher->save();
    }
}
