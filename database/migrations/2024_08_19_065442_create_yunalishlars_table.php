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
        Schema::create('yunalishlars', function (Blueprint $table) {
            $table->id();
            $table->string('nomi');
            $table->string('qs_nomi');
            $table->string('shifr');
            $table->text('haqida');
            $table->text('fanlar');
            $table->string('logo');
            $table->boolean('faol');
            $table->unsignedBigInteger('ohtm_id');

            $table->foreign('ohtm_id')->references('id')->on('ohtms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yunalishlars');
    }
};
