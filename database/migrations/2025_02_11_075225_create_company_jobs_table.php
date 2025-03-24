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
        Schema::create('company_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('jobtitle');
            $table->string('salary');
            $table->string('location');
            $table->string('qualification');
            $table->string('category');
            $table->text('responsibilities')->nullable(); // Store as JSON or comma-separated values
            $table->text('jobdesc')->nullable();
            $table->string('companyname');
            $table->string('company_location');
            $table->string('website')->nullable();
            $table->text('companydescription')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_jobs');
    }
};
