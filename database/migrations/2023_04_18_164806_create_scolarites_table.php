<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('scolarites', function (Blueprint $table) {
            $table->id();
            $table->string("annee_scolaire");
            $table->string("classe");
            $table->string("resultat");
            $table->date("date_resultat");
            $table->unsignedBigInteger('id_stagiaire');
            $table->unsignedBigInteger('id_filiere');
   

            $table->foreign('id_stagiaire')->references('id')->on('stagiaires'); 
            $table->foreign('id_filiere')->references('id')->on('filieres'); 
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
        Schema::dropIfExists('scolarites');
    }
};
