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
        Schema::create('dars_jadvalis', function (Blueprint $table) {
            $table->id();
            $table->date('sana');
            $table->string('mavzu');
            $table->unsignedBigInteger('guruh_id');
            $table->unsignedBigInteger('dars_vaqti_id');
            $table->unsignedBigInteger('dars_turi_id');
            $table->unsignedBigInteger('fan_uqituvchi_id');
            $table->unsignedBigInteger('xona_id');
            $table->unsignedBigInteger('uquv_yili_ohtm_id');

            $table->foreign('guruh_id')->references('id')->on('guruhs');
            $table->foreign('dars_vaqti_id')->references('id')->on('dars_vaqtis');
            $table->foreign('dars_turi_id')->references('id')->on('dars_turis');
            $table->foreign('fan_uqituvchi_id')->references('id')->on('fan_uqituvchis');
            $table->foreign('xona_id')->references('id')->on('xonalars');
            $table->foreign('uquv_yili_ohtm_id')->references('id')->on('uquv_yili_ohtms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dars_jadvalis');
    }
};
