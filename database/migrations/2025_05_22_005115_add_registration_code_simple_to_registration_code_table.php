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
        Schema::table('registration_code_tbl', function (Blueprint $table) {
            $table->string('registration_code_simple')->nullable()->after('registration_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registration_code_tbl', function (Blueprint $table) {
            $table->dropColumn('registration_code_simple');
        });
    }
};
