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
        Schema::create('tinglovchi_diploms', function (Blueprint $table) {
            $table->id();
            $table->string('klassifikatsiya');
            $table->string('seriya');
            $table->string('bitiruv_ishi');
            $table->string('uqish_vaqti');
            $table->text('baholar');
            $table->text('haqida');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tinglovchi_diploms');
    }
};
