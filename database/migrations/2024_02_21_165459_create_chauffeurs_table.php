<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chauffeurs', function (Blueprint $table) {
            $table->id();
            $table->String("Nom");
            $table->String("Prenom");
            $table->String("Numero_Permis");
            $table->String("Date_Emission");
            $table->String("Date_Expiration");
            $table->unsignedBigInteger("Categorie");
            $table->unsignedBigInteger("Experience");
            $table->String("Image");
            $table->Integer("Assignation")->defaultValue = 0;
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chauffeurs');
    }
};
