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
        Schema::create('programmes', function (Blueprint $table) {

            $table->id();
            $table->string('annee_scolaire');
            $table->string('classe');
            $table->unsignedBigInteger('id_filiere');
            $table->unsignedBigInteger('id_matiere');
    

            $table->foreign('id_filiere')->references('id')->on('filieres'); 
            $table->foreign('id_matiere')->references('id')->on('matieres'); 
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
        Schema::dropIfExists('programmes');
    }
};
