<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eleve', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matricule');
            $table->string('nomEl');
            $table->string('prenomEl');
            $table->date('dateNais');
            $table->string('lieuNais');
            $table->string('gender');
            $table->string('codeCl');
            $table->string('contactP');
            $table->string('newOld');
            $table->integer('montantDue');
            $table->integer('montantVerse');
            $table->integer('resteV');
            $table->date('datePay');
            $table->string('photoE');
            $table->timestamps(); // Cela ajoutera created_at et updated_at

            // Foreign key constraint
            $table->foreign('codeCl')->references('codeCl')->on('sujets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleve');
    }
};
