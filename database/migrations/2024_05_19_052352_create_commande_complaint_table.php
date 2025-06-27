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
        Schema::create('commande_complaint', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('message');
            $table->unsignedBigInteger('commande_id');
            $table->foreign('commande_id')->references('id')->on('commande')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_complaint');
    }
};
