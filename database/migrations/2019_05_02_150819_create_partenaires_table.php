<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartenairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partenaires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->string('sexe')->nullable();

            $table->integer('structure_id')->nullable()->unsigned()->index();
            $table->foreign('structure_id')->references('id')->on('configurations')->onDelete('set null');
            $table->integer('type_id')->nullable()->unsigned()->index();
            $table->foreign('type_id')->references('id')->on('configurations')->onDelete('set null');

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
        Schema::dropIfExists('partenaires');
    }
}
