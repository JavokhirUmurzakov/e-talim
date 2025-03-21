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
        Schema::create('uquv_yili_ohtms', function (Blueprint $table) {
            $table->id();
            $table->string('nomi');
            $table->date('boshlanishi');
            $table->date('tugashi');
            $table->boolean('faol')->default(1);;
            $table->unsignedBigInteger('ohtm_id');
            $table->unsignedBigInteger('uquv_yili_id');

            $table->foreign('ohtm_id')->references('id')->on('ohtms');
            $table->foreign('uquv_yili_id')->references('id')->on('uquv_yilis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uquv_yili_ohtms');
    }
};
