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
        Schema::create('kunlik_nazorats', function (Blueprint $table) {
            $table->id();
            $table->text('haqida');
            $table->unsignedBigInteger('fakultet_kafedra_id');
            $table->unsignedBigInteger('uquv_yili_ohtm_id');
            $table->string('fayl');
            $table->unsignedBigInteger('xona_id');
            $table->date('vaqti')->nullable();
            $table->boolean('korildi');

            $table->foreign('fakultet_kafedra_id')->references('id')->on('fakultet_kafedras');
            $table->foreign('uquv_yili_ohtm_id')->references('id')->on('uquv_yili_ohtms');
            $table->foreign('xona_id')->references('id')->on('xonalars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunlik_nazorats');
    }
};
