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
        Schema::create('dossier_inscriptions', function (Blueprint $table) {
            $table->id();

            $table->string('attestation_scolarite');
            $table->string('attestation_bac');
             $table->string('cin');
            $table->string('extrait_acte_naissance');
            $table->string('enveloppe');
            $table->string('photo');
            $table->string('reglement');
            $table->unsignedBigInteger('id_filiere');
    

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
        Schema::dropIfExists('dossier__inscriptions');
    }
};
