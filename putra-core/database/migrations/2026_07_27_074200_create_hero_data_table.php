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
        Schema::create('hero_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name_id');
            $table->string('name_en');
            $table->string('image')->nullable();
            $table->string('role_id');
            $table->string('role_en');
            $table->string('summary_id');
            $table->text('summary_en');
            $table->text('role_description_id');
            $table->text('role_description_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_data');
    }
};
