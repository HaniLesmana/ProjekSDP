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
            "admin_saldo"=>0,
            "admin_telepon"=>"3172389",
            "password"=>bcrypt('admin'), //"$2a$12\$H5Gpu7XDfLg2qxES.9LbNO6uTXQ7.nn5cj9.51TeALctqu5UlPk.i",//admin
        ]);
        $admin->save();
    }
}
