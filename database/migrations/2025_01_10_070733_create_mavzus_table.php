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
        Schema::create('mavzus', function (Blueprint $table) {
            $table->id();
            $table->string('nomi');
            $table->string('soat');
            $table->unsignedBigInteger('jurnal_id');
            $table->unsignedBigInteger('dars_turis_id');
            $table->string('file')->nullable();
            $table->string('file_path')->nullable();
            $table->boolean('used')->default(false);

            $table->foreign('jurnal_id')->references('id')->on('jurnals');
            $table->foreign('dars_turis_id')->references('id')->on('dars_turis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mavzus');
    }
};
