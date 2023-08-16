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
        Schema::create('worker_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('region')->nullable();
            $table->string('work_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mail')->nullable();
            $table->string('image')->nullable();
            $table->integer('destroy')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worker_registrations');
    }
};
