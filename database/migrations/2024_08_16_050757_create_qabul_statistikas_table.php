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
        Schema::create('qabul_statistikas', function (Blueprint $table) {
            $table->id();
            $table->date('qabul_yili');
            $table->integer('abituriyentlar_soni')->unsigned()->default(0);
            $table->integer('qabul_soni')->unsigned()->default(0);
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
        Schema::dropIfExists('qabul_statistikas');
    }
};
