<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgaIniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orga-ini', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_organization')->unsigned();
            $table->foreign('id_organization')->references('id')->on('organizations');
            $table->bigInteger('id_initiative')->unsigned();
            $table->foreign('id_initiative')->references('id')->on('initiatives');
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
        //
    }
}
