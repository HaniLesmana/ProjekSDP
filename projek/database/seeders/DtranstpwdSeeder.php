<?php

namespace Database\Seeders;

use App\Models\dtranstpwd;
use Illuminate\Database\Seeder;

class DtranstpwdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dtranstopup = dtranstpwd::create([
            'htranstpwd_id'=>1,
            'htranstpwd_nominal'=>100000,
            'htranstpwd_jumlah'=>2
        ]);
        $dtranstopup->save();

        $dtranstopup = dtranstpwd::create([
            'htranstpwd_id'=>1,
            'htranstpwd_nominal'=>250000,
            'htranstpwd_jumlah'=>1
        ]);
        $dtranstopup->save();
    }
}
