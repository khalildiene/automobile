<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->String("Depart");
            $table->String("Arriver");
            $table->String("Date");
            $table->String("Heure");
            $table->String("Distance");
            $table->Integer("Etat");
            $table->unsignedBigInteger("Client");
            $table->unsignedBigInteger("Voiture");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
