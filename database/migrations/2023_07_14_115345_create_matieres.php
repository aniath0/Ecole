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
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('description');
            $table->integer('coefficient');
            $table->float('notemax');
            $table->float('notesoumise');
            $table->integer('site_id')->unsigned()->nullable();
            $table->foreign('site_id')->references('id')->on('sites');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matieres');
    }
};
