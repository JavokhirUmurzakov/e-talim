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
        Schema::create('akkreditatsiyas', function (Blueprint $table) {
            $table->id();
            $table->text('nomi');
            $table->text('haqida');
            $table->date('sana');
            $table->string('pdf');
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
        Schema::dropIfExists('akkreditatsiyas');
    }
};
