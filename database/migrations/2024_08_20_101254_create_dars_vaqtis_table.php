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
        Schema::create('dars_vaqtis', function (Blueprint $table) {
            $table->id();
            $table->string('nomi');
            $table->string('vaqti');
            $table->Time('boshlanishi')->nullable();
            $table->Time('tugashi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dars_vaqtis');
    }
};
