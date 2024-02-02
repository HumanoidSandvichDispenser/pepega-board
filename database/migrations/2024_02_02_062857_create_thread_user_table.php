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
        Schema::create('thread_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thread_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->boolean('has_read');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thread_user');
    }
};
