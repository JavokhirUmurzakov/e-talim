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
        Schema::create('tinglovchi_yutuqlars', function (Blueprint $table) {
            $table->id();
            $table->text('haqida');
            $table->unsignedBigInteger('yutuq_yunalish_id');
            $table->unsignedBigInteger('uquv_yili_ohtm_id');
            $table->unsignedBigInteger('tinglovchi_id');

            $table->foreign('yutuq_yunalish_id')->references('id')->on('yutuq_yunalishes');
            $table->foreign('uquv_yili_ohtm_id')->references('id')->on('uquv_yili_ohtms');
            $table->foreign('tinglovchi_id')->references('id')->on('tinglovchis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tinglovchi_yutuqlars');
    }
};
