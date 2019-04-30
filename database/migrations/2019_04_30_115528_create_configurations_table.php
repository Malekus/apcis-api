<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('categorie');
            $table->string('champ');
            $table->string('libelle');
            $table->timestamps();
            $table->unique(['categorie', 'champ', 'libelle']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('Configurations');
    }
}
