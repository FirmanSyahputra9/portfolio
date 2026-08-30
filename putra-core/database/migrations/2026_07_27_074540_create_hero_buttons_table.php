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
        Schema::create('hero_buttons', function (Blueprint $table) {
            $table->id();
            $table->string('label_id');
            $table->string('label_en');
            $table->string('url');
            $table->enum('action', ['link', 'download'])->default('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_buttons');
    }
};
