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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ref')->nullable();
            $table->string('nom');
            $table->string('subtitle');
            $table->text('summary_desc');
            $table->text('detail_desc');
            $table->boolean('pure')->default(true);
            $table->boolean('stock')->default(true);
            $table->boolean('home_page')->default(false);
            $table->unsignedBigInteger('product_type_id'); ///1 - Huiles essentiel 2 - Epices
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
