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
        Schema::create('uqituvchi_shax_mals', function (Blueprint $table) {
            $table->id();
            $table->string('fuqarolik');
            $table->string('pass_raqami');
            $table->string('jshshir_kod');
            $table->date('tugilgan_sana');
            $table->boolean('jinsi');
            $table->text('uy_manzili');
            $table->text('haqida');
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
        Schema::dropIfExists('uqituvchi_shax_mals');
    }
};
