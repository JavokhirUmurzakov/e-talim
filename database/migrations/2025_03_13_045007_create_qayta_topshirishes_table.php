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
        Schema::create('qayta_topshirishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('videmost_id');
            $table->date('sana');
            $table->unsignedBigInteger('muddati');
            $table->string('nazorat_oluvchi');
            $table->unsignedBigInteger('kaf_bosh_unvon_id');
            $table->unsignedBigInteger('kaf_bosh_id');
            $table->unsignedBigInteger('nomer');


            $table->foreign('videmost_id')->references('id')->on('videmosts');
            $table->foreign('kaf_bosh_unvon_id')->references('id')->on('harbiy_unvons');
            $table->foreign('kaf_bosh_id')->references('id')->on('uqituvchis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qayta_topshirishes');
    }
};
