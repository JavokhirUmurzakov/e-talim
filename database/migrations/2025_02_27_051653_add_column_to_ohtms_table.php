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
        Schema::table('ohtms', function (Blueprint $table) {
            $table->string('ohtm_boshliq')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ohtms', function (Blueprint $table) {
            $table->dropColumn('ohtm_boshliq');
        });
    }
};
