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
        Schema::create('yakuniy_bahos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('yakuniy_id');
            $table->unsignedBigInteger('baho_id');
            $table->unsignedBigInteger('tinglovchi_id');

            $table->foreign('yakuniy_id')->references('id')->on('yakuniys');
            $table->foreign('baho_id')->references('id')->on('bahos');
            $table->foreign('tinglovchi_id')->references('id')->on('tinglovchis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yakuniy_bahos');
    }
};
