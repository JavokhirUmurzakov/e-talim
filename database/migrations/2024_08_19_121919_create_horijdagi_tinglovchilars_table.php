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
        Schema::create('horijdagi_tinglovchilars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tinglovchi_id');
            $table->unsignedBigInteger('ohtm_id');
            $table->string('muassasa');
            $table->date('ketish_vaqti');
            $table->date('kelish_vaqti');
            $table->string('mutaxassislik');
            $table->string('diplom_pdf');

            $table->foreign('tinglovchi_id')->references('id')->on('tinglovchis');
            $table->foreign('ohtm_id')->references('id')->on('ohtms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horijdagi_tinglovchilars');
    }
};
