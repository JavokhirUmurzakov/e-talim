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
        Schema::create('kurs', function (Blueprint $table) {
            $table->id();
            $table->string('nomi');
            $table->text('haqida');
            $table->date('boshlanish_vaqti');
            $table->date('tugash_vaqti');
            $table->string('qabul_asos_pdf');
            $table->string('bitiruv_asos_pdf');
            $table->unsignedBigInteger('xorijiy_id');
            $table->unsignedBigInteger('kurs_holat_id');
            $table->unsignedBigInteger('uqituvchi_id');
            $table->unsignedBigInteger('kurs_bosqiches_id');
            $table->unsignedBigInteger('ohtm_id');
            $table->unsignedBigInteger('uquv_turi_id');

            $table->foreign('xorijiy_id')->references('id')->on('xorijiys');
            $table->foreign('kurs_holat_id')->references('id')->on('kurs_holats');
            $table->foreign('uqituvchi_id')->references('id')->on('uqituvchis');
            $table->foreign('kurs_bosqiches_id')->references('id')->on('kurs_bosqiches');
            $table->foreign('ohtm_id')->references('id')->on('ohtms');
            $table->foreign('uquv_turi_id')->references('id')->on('uquv_turis');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurs');
    }
};
