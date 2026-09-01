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
        Schema::create('education_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('institution_id');
            $table->string('institution_en');
            $table->string('degree')->nullable();
            $table->string('field_of_study_id')->nullable();
            $table->string('field_of_study_en')->nullable();
            $table->string('final_grade')->nullable();

            $table->text('description_id')->nullable();
            $table->text('description_en')->nullable();

            $table->string('location')->nullable();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_data');
    }
};
