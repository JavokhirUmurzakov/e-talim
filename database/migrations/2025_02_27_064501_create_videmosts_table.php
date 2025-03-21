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
        Schema::create('videmosts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jurnal_id');
            $table->unsignedBigInteger('nomer');

            $table->date('sana');
            $table->unsignedBigInteger('joriy_uqituvchi_id');
            $table->unsignedBigInteger('oraliq_uqituvchi_id');
            $table->string('yakuniy_oluvchi');
            $table->unsignedBigInteger('uquv_bulim_boshliq_unvon_id');
            $table->string('uquv_bulim_boshliq');
            $table->unsignedBigInteger('jami_tinglovchi');
            $table->unsignedBigInteger('alo');
            $table->unsignedBigInteger('yaxshi');
            $table->unsignedBigInteger('qoniqarli');
            $table->unsignedBigInteger('qoniqarsiz');
            $table->unsignedBigInteger('baholanmagan');
            $table->string('xulosa');

            $table->boolean('faol')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videmosts');
    }
};
