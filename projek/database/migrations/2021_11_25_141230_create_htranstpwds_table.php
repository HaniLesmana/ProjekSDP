<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHtranstpwdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('htranstpwds', function (Blueprint $table) {
            $table->id("htranstpwd_id");
            $table->integer("user_id");
            $table->string("htranstpwd_tanggal");
            $table->integer("htranstpwd_total");
            $table->string("htranstpwd_tipe");
            $table->integer("htranstpwd_status");
            $table->string("token_payment");
            $table->string("status_payment");
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
        Schema::dropIfExists('htranstpwds');
    }
}
