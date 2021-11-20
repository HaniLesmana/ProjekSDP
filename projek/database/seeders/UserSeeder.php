<?php

namespace Database\Seeders;

use App\Models\user;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=user::create([
            "user_nama"=>"asd",
            "user_email"=>"asd@a.com",
            "user_telepon"=>"1645653172389",
            "user_alamat"=>"asd 123",
            "user_password"=>md5("12345678"),
            "user_saldo"=>0,
            "user_poin"=>12,
        ]);
        $user->save();
    }
}
