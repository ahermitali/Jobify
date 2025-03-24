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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained()->onDelete('cascade'); // References `menus`
            $table->foreignId('parent_id')->nullable()->constrained('menu_items')->onDelete('cascade'); // Self-referencing for submenus
            $table->string('title', 255);
            $table->enum('type', ['page', 'category', 'service', 'custom'])->default('custom');
            $table->unsignedBigInteger('item_id')->nullable();
            $table->string('url', 2048)->nullable();
            $table->unsignedSmallInteger('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
