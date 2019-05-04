<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCafsTable extends Migration
{

    public function up()
    {
        Schema::create('cafs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dateCaf');

            $table->integer('personne_id')->unsigned()->index();
            $table->foreign('personne_id')->references('id')->on('personnes')->onDelete('cascade');
            $table->integer('motif_id')->unsigned()->nullable();
            $table->foreign('motif_id')->references('id')->on('configurations')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cafs');
    }
}
