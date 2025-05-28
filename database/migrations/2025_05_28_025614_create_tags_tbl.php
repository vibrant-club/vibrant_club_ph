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
        Schema::create('tags_tbl', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Important for foreign keys later
            $table->id();              // BIGINT UNSIGNED PRIMARY KEY
            $table->string('name')->unique(); // Tag name, must be unique
            $table->timestamps();     // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags_tbl');
    }
};
