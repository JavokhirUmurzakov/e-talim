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
        Schema::create('fakultet_kafedras', function (Blueprint $table) {
            $table->id();
            $table->string('nomi');
            $table->string('qs_nomi');
            $table->text('haqida');
            $table->string('kod');
            $table->unsignedBigInteger('parent_id')->nullable()->default(null);
            $table->unsignedBigInteger('fak_kaf_turi_id')->nullable();
            $table->unsignedBigInteger('ohtm_id')->nullable();

            $table->foreign('parent_id')->references('id')->on('fakultet_kafedras')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('fak_kaf_turi_id')->references('id')->on('fak_kaf_turis');
            $table->foreign('ohtm_id')->references('id')->on('ohtms');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fakultet_kafedras');
    }
};
