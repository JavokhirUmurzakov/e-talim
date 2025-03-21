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
        Schema::create('fan_uqituvchis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uqituvchi_id');
            $table->unsignedBigInteger('jurnal_id');
            $table->unsignedBigInteger('dars_turi_id');
            $table->unsignedBigInteger('soat');
//            $table->unsignedBigInteger('maruza');
//            $table->unsignedBigInteger('amaliy');
//            $table->boolean('oraliq');
//            $table->boolean('yakuniy');
//            $table->integer('koef');
//            $table->boolean('faol');
//            $table->unsignedBigInteger('guruh_id');

//            $table->foreign('guruh_id')->references('id')->on('guruhs');
            $table->foreign('uqituvchi_id')->references('id')->on('uqituvchis');
            $table->foreign('jurnal_id')->references('id')->on('jurnals');
            $table->foreign('dars_turi_id')->references('id')->on('dars_turis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fan_uqituvchis');
    }
};
