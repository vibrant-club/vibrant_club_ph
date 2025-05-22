<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('registration_code_tbl', function (Blueprint $table) {
            $table->id();
            $table->uuid('registration_code')->unique();
            $table->tinyInteger('status')->default(0); // 0 = unused, 1 = used
            $table->timestamp('date_of_registration')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_code_tbl');
    }
};
