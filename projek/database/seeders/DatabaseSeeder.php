<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            KategoriSeeder::class,
            BarangSeeder::class,
            CartSeeder::class,
            ChatSeeder::class,
            DtransbarangSeeder::class,
            DtransbayarSeeder::class,
            DtranssewaSeeder::class,
            DtranstpwdSeeder::class,
            HtransbarangSeeder::class,
            HtransbayarSeeder::class,
            HtranssaldoSeeder::class,
            HtranssewaSeeder::class,
            LogstokSeeder::class,
            PegawaiSeeder::class,
            UserVoucherSeeder::class,
            VoucherSeeder::class,
        ]);
    }
}
