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
        Schema::create('uqituvchi_yutuqlars', function (Blueprint $table) {
            $table->id();
            $table->text('haqida');
            $table->unsignedBigInteger('yutuq_yunalish_id');
            $table->unsignedBigInteger('uquv_yili_ohtm_id');
            $table->unsignedBigInteger('uqituvchi_id');
            $table->string('fayl')->nullable();

            $table->foreign('yutuq_yunalish_id')->references('id')->on('yutuq_yunalishes');
            $table->foreign('uquv_yili_ohtm_id')->references('id')->on('uquv_yili_ohtms');
            $table->foreign('uqituvchi_id')->references('id')->on('uqituvchis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uqituvchi_yutuqlars');
    }
};
