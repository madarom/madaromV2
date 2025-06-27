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
        Schema::table('seo', function (Blueprint $table) {
            $table->string('title_fr')->nullable()->change();
            $table->text('description_fr')->nullable()->change();
            $table->text('keywords_fr')->nullable()->change();
            $table->string('title_en')->nullable()->change();
            $table->text('description_en')->nullable()->change();
            $table->text('keywords_en')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
