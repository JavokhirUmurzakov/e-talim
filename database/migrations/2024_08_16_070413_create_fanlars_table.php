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
        Schema::create('fanlars', function (Blueprint $table) {
            $table->id();
            $table->string('nomi');
            $table->string('qs_nomi');
            $table->string('kod');
            $table->boolean('faol')->default('0');
            $table->unsignedBigInteger('fakultet_kafedra_id');
            $table->unsignedBigInteger('ohtm_id');
            $table->foreign('ohtm_id')->references('id')->on('ohtms');
            $table->foreign('fakultet_kafedra_id')->references('id')->on('fakultet_kafedras');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fanlars');
    }
};
