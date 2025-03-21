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
        Schema::create('ohtms', function (Blueprint $table) {
            $table->id();
            $table->string('nomi');
            $table->string('qs_nomi');
            $table->unsignedBigInteger('uqituvchi_id')->nullable(); //from uqituvchis as boshliq
            $table->text('haqida');
            $table->string('logo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ohtms');
    }
};
