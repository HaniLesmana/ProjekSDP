<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin=admin::create([
            "admin_nama"=>"admin",
            "admin_email"=>"admin@a.com",
            "admin_telepon"=>"3172389",
            "admin_password"=>"admin",
        ]);
        $admin->save();
    }
}
