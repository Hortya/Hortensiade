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
        Schema::create('choices', function(Blueprint $table){
            $table->id();
            $table->string('text');
            $table->foreignId('comes_from')->references('id')->on('body_texts');
            $table->foreignId('leads_to')->references('id')->on('body_texts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choices');
    }
};
