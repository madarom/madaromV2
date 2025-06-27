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
        Schema::table('products', function (Blueprint $table) {
            $table->longText('detail_desc_en')->change();
            $table->longText('detail_desc')->change();
        });

        Schema::table('statics_page', function (Blueprint $table) {
            $table->longText('fr')->change();
            $table->longText('en')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('long_text', function (Blueprint $table) {
            //
        });
    }
};
