<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRpLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rp_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid')->unsigned();
            $table->foreign('pid')->references('id')->on('rp_production');
            $table->string('content');
            $table->dateTime('time');
            $table->string('version');
            $table->String('version_code')->default("");
            $table->string('type');
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rp_log');
    }
}
