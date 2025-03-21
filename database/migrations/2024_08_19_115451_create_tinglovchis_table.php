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
        Schema::create('tinglovchis', function (Blueprint $table) {
            $table->id();
            $table->string('fio');
            $table->string('lavozim');
            $table->string('rasm');
            $table->text('haqida');
            $table->unsignedBigInteger('guruh_id');
            $table->unsignedBigInteger('tinglovchi_holat_id');
            $table->unsignedBigInteger('tinglovchi_diplom_id')->nullable();
            $table->unsignedBigInteger('harbiy_unvon_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('fakultet_kafedra_id');
            $table->unsignedBigInteger('ohtm_id');

            $table->foreign('ohtm_id')->references('id')->on('ohtms');
            $table->foreign('fakultet_kafedra_id')->references('id')->on('fakultet_kafedras');
            $table->foreign('guruh_id')->references('id')->on('guruhs');
            $table->foreign('tinglovchi_holat_id')->references('id')->on('tinglovchi_holats');
            $table->foreign('tinglovchi_diplom_id')->references('id')->on('tinglovchi_diploms');
            $table->foreign('harbiy_unvon_id')->references('id')->on('harbiy_unvons');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tinglovchis');
    }
};
