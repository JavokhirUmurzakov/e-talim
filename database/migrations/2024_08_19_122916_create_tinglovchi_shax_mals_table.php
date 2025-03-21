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
        Schema::create('tinglovchi_shax_mals', function (Blueprint $table) {
            $table->id();
            $table->string('fuqarolik');
            $table->string('pass_raqami');
            $table->string('jshshir_kod');
            $table->date('tugilgan_sana');
            $table->boolean('jinsi');
            $table->text('haqida');
            $table->text('uy_manzili');
            $table->unsignedBigInteger('tinglovchi_id');

            $table->foreign('tinglovchi_id')->references('id')->on('tinglovchis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tinglovchi_shax_mals');
    }
};
