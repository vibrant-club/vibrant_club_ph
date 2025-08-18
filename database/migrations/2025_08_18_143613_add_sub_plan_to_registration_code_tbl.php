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
            $table->string('sub_plan')->nullable()->after('registration_code_simple');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registration_code_tbl', function (Blueprint $table) {
            $table->dropColumn('sub_plan');
        });
    }
};
