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
        Schema::create('nashrs', function (Blueprint $table) {
            $table->id();
            $table->string('nomi');
            $table->text('haqida');
            $table->date('sana');
            $table->string('pdf');
            $table->unsignedBigInteger('uqituvchi_id');
            $table->unsignedBigInteger('nashr_turi_id');
            $table->unsignedBigInteger('uquv_yili_id');

            $table->foreign('uqituvchi_id')->references('id')->on('uqituvchis');
            $table->foreign('nashr_turi_id')->references('id')->on('nashr_turis');
            $table->foreign('uquv_yili_id')->references('id')->on('uquv_yilis');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nashrs');
    }
};
