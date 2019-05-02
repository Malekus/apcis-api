<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('sexe')->nullable();
            $table->integer('enfant')->nullable()->default(0);
            $table->string('nationalite')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('adresse')->nullable();
            $table->string('code_postale')->nullable();
            $table->string('ville')->nullable();
            $table->boolean('prioritaire')->nullable();
            $table->string('matricule_caf')->nullable();

            $table->integer('logement_id')->nullable()->unsigned()->index();
            $table->foreign('logement_id')->references('id')->on('configurations')->onDelete('set null');
            $table->integer('csp_id')->nullable()->unsigned()->index();
            $table->foreign('csp_id')->references('id')->on('configurations')->onDelete('set null');
            $table->integer('categorie_id')->nullable()->unsigned()->index();
            $table->foreign('categorie_id')->references('id')->on('configurations')->onDelete('set null');
            $table->integer('scolaire_id')->nullable()->unsigned()->index();
            $table->foreign('scolaire_id')->references('id')->on('configurations')->onDelete('set null');
            $table->integer('situation_id')->nullable()->unsigned()->index();
            $table->foreign('situation_id')->references('id')->on('configurations')->onDelete('set null');

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
        Schema::dropIfExists('personnes');
    }
}
