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
        Schema::create('baho_davomats', function (Blueprint $table) {
            $table->id();
            $table->float('baho');
            $table->text('haqida');
            $table->unsignedBigInteger('tinglovchi_id');
            $table->unsignedBigInteger('dars_jadvali_id');
            $table->unsignedBigInteger('baho_davomat_holat_id');

            $table->foreign('tinglovchi_id')->references('id')->on('tinglovchis');
            $table->foreign('dars_jadvali_id')->references('id')->on('dars_jadvalis');
            $table->foreign('baho_davomat_holat_id')->references('id')->on('baho_davomat_holats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baho_davomats');
    }
};
