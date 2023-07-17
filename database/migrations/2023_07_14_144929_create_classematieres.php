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
        Schema::create('classematieres', function (Blueprint $table) {
            $table->id();
            $table->integer('matiere_id')->unsigned();
            $table->foreign('matiere_id')->references('id')->on('matieres');
            $table->integer('classe_id')->unsigned();
            $table->foreign('classe_id')->references('id')->on('classes');
            $table->integer('site_id')->unsigned();
            $table->foreign('site_id')->references('id')->on('sites');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classematieres');
    }
};
