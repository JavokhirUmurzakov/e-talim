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
        Schema::create('malaka_oshirishes', function (Blueprint $table) {
            $table->id();
            $table->string('maqsad_mavzusi');
            $table->string('uqish_joyi');
            $table->date('boshlanish_vaqti');
            $table->date('tugash_vaqti');
            $table->string('dip_sert_pdf');
            $table->unsignedBigInteger('uqituvchi_id');

            $table->foreign('uqituvchi_id')->references('id')->on('uqituvchis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('malaka_oshirishes');
    }
};
