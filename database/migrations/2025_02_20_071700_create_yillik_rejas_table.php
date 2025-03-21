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
        Schema::create('yillik_rejas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uqituvchi_id');
            $table->unsignedBigInteger('nashr_tur_id');
            $table->unsignedBigInteger('soni');
            $table->unsignedBigInteger('uquv_yili_id');
            $table->string('haqida');
            $table->unsignedBigInteger('fak_kaf_id');

            $table->foreign('uqituvchi_id')->references('id')->on('uqituvchis');
            $table->foreign('nashr_tur_id')->references('id')->on('nashr_turis');
            $table->foreign('uquv_yili_id')->references('id')->on('uquv_yilis');
            $table->foreign('fak_kaf_id')->references('id')->on('fakultet_kafedras');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yillik_rejas');
    }
};
