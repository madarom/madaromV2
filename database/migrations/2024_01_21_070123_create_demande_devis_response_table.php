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
        Schema::create('demande_devis_response', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('demande_devis_id');
            $table->foreign('demande_devis_id')->references('id')->on('demande_devis')->onDelete('cascade');
            $table->text('admin_message')->nullable();
            $table->unsignedBigInteger('user_id');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->double('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_devis_response');
    }
};
