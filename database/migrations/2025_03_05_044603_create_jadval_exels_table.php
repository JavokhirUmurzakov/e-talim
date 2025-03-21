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
        Schema::create('jadval_exels', function (Blueprint $table) {
            $table->id();
            $table->string('nomi');
            $table->string('file');
            $table->date('sana');
//            $table->unsignedBigInteger('uquv_yili_id');
            $table->unsignedBigInteger('ohtm_id');
            $table->timestamps();


//            $table->foreign('uquv_yili_id')->references('id')->on('uquv_yilis');
            $table->foreign('ohtm_id')->references('id')->on('ohtms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadval_exels');
    }
};
