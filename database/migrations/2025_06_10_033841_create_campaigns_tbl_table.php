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
       Schema::create('campaigns_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('title');                             // Campaign Title
            $table->text('description')->nullable();             // Short Description
            $table->string('brand_name');                        // Brand / Client
            $table->decimal('budget', 10, 2)->nullable();        // Budget in PHP
            $table->date('deadline')->nullable();                // Campaign Deadline
            $table->string('form_link')->nullable();             // Campaign application form link
            $table->integer('total_influencers_needed')->nullable(); // Required influencers
            $table->enum('status', ['active', 'upcoming', 'completed', 'paused'])->default('upcoming');
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns_tbl');
    }
};
