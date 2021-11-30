<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtranssewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtranssewa', function (Blueprint $table) {
            $table->id();
            $table->string("pegawai_id");
            $table->string("dSewa_tanggal");
            $table->integer("dSewa_harga");
            $table->string("dSewa_alamat");
            //$table->integer("dSewa_status_bayar")->default(2);
            $table->integer("dSewa_status_accpegawai")->default(2);
            $table->string("hSewa_id");
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
        Schema::dropIfExists('dtranssewas');
    }
}
