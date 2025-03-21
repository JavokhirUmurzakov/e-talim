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
        Schema::create('baho5s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dars_kun_id');
            $table->unsignedBigInteger('baho_id');
            $table->unsignedBigInteger('tinglovchi_id');

            $table->foreign('dars_kun_id')->references('id')->on('dars_kuns');
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
        Schema::dropIfExists('baho5s');
    }
};
