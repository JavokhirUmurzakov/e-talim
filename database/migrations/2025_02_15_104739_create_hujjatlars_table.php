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
        Schema::create('hujjatlars', function (Blueprint $table) {
            $table->id();
            $table->string('nomi');
            $table->unsignedBigInteger('hujjat_turi_id');
            $table->unsignedBigInteger('jurnal_id');
            $table->string('file_name');
            $table->string('file_path');

            $table->foreign('hujjat_turi_id')->references('id')->on('hujjat_turis');
            $table->foreign('jurnal_id')->references('id')->on('jurnals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hujjatlars');
    }
};
