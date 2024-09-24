<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->String("Marque");
            $table->String("Model");
            $table->String("Couleur");
            $table->String("Matricule")->unique();
            $table->unsignedBigInteger("Type");
            $table->unsignedBigInteger("Chauffeur")->defaultValue = 0;
            $table->unsignedBigInteger("Statut");
            $table->String("Kilometrage");
            $table->String("Image");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};
