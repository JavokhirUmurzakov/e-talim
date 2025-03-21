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
        Schema::create('uqituvchis', function (Blueprint $table) {
            $table->id();
            $table->string('fio');
            $table->string('lavozim');
            $table->string('rasm');
            $table->string('mutaxassisligi');
            $table->boolean('rahbar');

            $table->unsignedBigInteger('uqituvchi_holat_id');
            $table->unsignedBigInteger('harbiy_unvon_id');
            $table->unsignedBigInteger('fakultet_kafedra_id');
            $table->unsignedBigInteger('ilmiy_unvon_id');
            $table->unsignedBigInteger('ilmiy_daraja_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ohtm_id');

            $table->foreign('ohtm_id')->references('id')->on('ohtms');
            $table->foreign('uqituvchi_holat_id')->references('id')->on('uqituvchi_holats');
            $table->foreign('harbiy_unvon_id')->references('id')->on('harbiy_unvons');
            $table->foreign('fakultet_kafedra_id')->references('id')->on('fakultet_kafedras');
            $table->foreign('ilmiy_unvon_id')->references('id')->on('ilmiy_unvons');
            $table->foreign('ilmiy_daraja_id')->references('id')->on('ilmiy_darajas');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uqituvchis');
    }
};
