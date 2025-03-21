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
        Schema::create('guruhs', function (Blueprint $table) {
            $table->id();
            $table->string('nomi');
            $table->string('boshliq_fio');
            $table->boolean('holat');
            $table->unsignedBigInteger('til_id');
            $table->unsignedBigInteger('kurs_bosqiches_id');
            $table->unsignedBigInteger('yunalish_id');
            $table->unsignedBigInteger('fakultet_kafedra_id');

            $table->foreign('til_id')->references('id')->on('tils');
            $table->foreign('kurs_bosqiches_id')->references('id')->on('kurs_bosqiches');
            $table->foreign('yunalish_id')->references('id')->on('yunalishlars');
            $table->foreign('fakultet_kafedra_id')->references('id')->on('fakultet_kafedras');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guruhs');
    }
};
