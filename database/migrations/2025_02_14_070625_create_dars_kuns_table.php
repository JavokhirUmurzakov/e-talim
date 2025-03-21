<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dars_kuns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jurnal_id'); //jurnal_id
            $table->date('sana');
            $table->unsignedBigInteger('nazorat_turi_id');
            $table->unsignedBigInteger('ohtm_id');
            $table->unsignedBigInteger('mavzu_id');
            $table->unsignedBigInteger('uqituvchi_id');

            $table->foreign('jurnal_id')->references('id')->on('jurnals');
            $table->foreign('uqituvchi_id')->references('id')->on('uqituvchis');
            $table->foreign('nazorat_turi_id')->references('id')->on('nazorat_turis');
            $table->foreign('ohtm_id')->references('id')->on('ohtms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dars_kuns');
    }
};
