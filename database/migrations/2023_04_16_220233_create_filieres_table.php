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
        Schema::create('filieres', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('niveau_diplome');
            $table->string('duree_formation');
            $table->string('stage1');
            $table->string('stage2');
            $table->string('niveau_admission');
            $table->double('frais_inscription');
            $table->double('frais_mansuel');
            $table->double('frais_examen');
            $table->double('frais_diplome');
            $table->date('date_creation');
            $table->string('num_autorisation');
            $table->date('date_qualification');
            $table->string('num_qualification');
            $table->date('date_accreditation');
            $table->string('num_accreditation');
 
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
        Schema::dropIfExists('filieres');
    }
};
