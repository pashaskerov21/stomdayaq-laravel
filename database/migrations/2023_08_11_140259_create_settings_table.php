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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_old')->nullable();
            $table->string('favicon')->nullable();
            $table->string('favicon_old')->nullable();
            $table->string('location_text')->nullable();
            $table->string('location_url')->nullable();
            $table->string('mail')->nullable();
            $table->string('phone')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->text('author')->nullable();
            $table->text('copyright')->nullable();
            $table->string('report_total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
