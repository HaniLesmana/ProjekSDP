<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHtranssewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('htranssewa', function (Blueprint $table) {
            $table->id();
            $table->string("user_id");
            $table->integer("hSewa_total");
            $table->integer("hSewa_status");
            $table->string("voucher_id");
            $table->string("alamat");
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
        Schema::dropIfExists('htranssewas');
    }
}
