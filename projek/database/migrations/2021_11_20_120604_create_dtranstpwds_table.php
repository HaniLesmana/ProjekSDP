<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtranstpwdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtranstpwd', function (Blueprint $table) {
            $table->id();
            $table->string("htranstpwd_id");
            $table->integer("htranstpwd_nominal");
            $table->integer("htranstpwd_jumlah");
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
        Schema::dropIfExists('dtranstpwds');
    }
}
