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
        Schema::create('videmost_bahos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('videmost_id');
            $table->unsignedBigInteger('tinglovchi_id');
            $table->unsignedBigInteger('joriy');
            $table->unsignedBigInteger('oraliq');
            $table->unsignedBigInteger('yakuniy');
            $table->unsignedBigInteger('umumiy');
            $table->unsignedBigInteger('baho');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videmost_bahos');
    }
};
