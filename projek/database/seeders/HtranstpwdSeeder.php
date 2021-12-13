<?php

namespace Database\Seeders;

use App\Models\htransTopup;
use Illuminate\Database\Seeder;

class HtranstpwdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $htranstpwd = htransTopup::create([
            'user_id'=>1,
            'htranstpwd_tanggal'=>date("Y-m-d H:i:s"),
            'htranstpwd_total'=>450000,
            'htranstpwd_tipe'=>'topup',
            'htranstpwd_status'=>2,
            'token_payment'=>'',
            'status_payment'=>'',
        ]);
        $htranstpwd->save();
    }
}
