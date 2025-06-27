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
        Schema::table('demande_devis_response', function (Blueprint $table) {
            $table->unsignedBigInteger('price_unit_id')->default(1);
            $table->foreign('price_unit_id')->references('id')->on('currency')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }


};
