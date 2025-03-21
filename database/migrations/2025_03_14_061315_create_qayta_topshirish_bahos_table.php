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
        Schema::create('qayta_topshirish_bahos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qayta_topshirish_id');
            $table->unsignedBigInteger('tinglovchi_id');
            $table->unsignedBigInteger('joriy');
            $table->unsignedBigInteger('oraliq');
            $table->unsignedBigInteger('yakuniy');
            $table->unsignedBigInteger('umumiy');
            $table->unsignedBigInteger('baho');


            $table->foreign('qayta_topshirish_id')->references('id')->on('qayta_topshirishes');
            $table->foreign('tinglovchi_id')->references('id')->on('tinglovchis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qayta_topshirish_bahos');
    }
};
