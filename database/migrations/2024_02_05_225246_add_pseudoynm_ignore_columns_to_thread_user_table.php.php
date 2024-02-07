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
        Schema::table('thread_user', function (Blueprint $table) {
            $table->string('pseudonym')->nullable();
            $table->boolean('is_ignored')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('thread_user', function (Blueprint $table) {
            $table->removeColumn('pseudonym');
            $table->removeColumn('is_ignored');
        });
    }
};
