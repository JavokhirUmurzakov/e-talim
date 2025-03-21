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
        Schema::create('yuklamas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uquv_yili_ohtm_id');
            $table->unsignedBigInteger('fan_uqituvchi_id');
            $table->integer('umumiy_soat');
            $table->integer('utilgan_soat');
            $table->text('mashgulot_turi_soat');
            $table->text('uquv_rejasi');

            $table->foreign('uquv_yili_ohtm_id')->references('id')->on('uquv_yili_ohtms');
            $table->foreign('fan_uqituvchi_id')->references('id')->on('fan_uqituvchis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yuklamas');
    }
};
