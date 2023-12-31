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
        Schema::create('setting_translates', function (Blueprint $table) {
            $table->id();
            $table->integer('setting_id');
            $table->string('title')->nullable();
            $table->string('address')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('author')->nullable();
            $table->string('copyright')->nullable();
            $table->string('lang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_translates');
    }
};
