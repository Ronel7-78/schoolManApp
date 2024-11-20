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
        Schema::table('students', function (Blueprint $table) {
            // Changer le type de 'dateNais' en date
            $table->date('dateNais')->change();

            // Changer le type de 'contactP' en entier
            $table->integer('contactP')->change();

            // Changer le type de 'montantVerse' et 'resteV' en décimal
            $table->decimal('montantVerse', 10, 2)->change();
            $table->decimal('resteV', 10, 2)->change();

            // Changer le type de 'datePay' en date
            $table->date('datePay')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
};
