<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string("pegawai_nik");
            $table->string("pegawai_email");
            $table->string("pegawai_nama");
            $table->string("pegawai_telepon");
            $table->string("pegawai_alamat");
            $table->string("pegawai_password");
            $table->string("pegawai_jasa");
            $table->integer("pegawai_saldo");
            $table->string("pegawai_deskripsi");
            $table->string("pegawai_photo")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
