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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('acronym')->nullable();
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->string('type')->default('software'); // software, app, web
            $table->string('platform')->nullable(); // android, ios, web, desktop
            $table->string('technology')->nullable(); // React, Kotlin, Laravel, etc
            $table->string('image')->nullable();
            $table->json('screenshots')->nullable();
            $table->string('download_url')->nullable();
            $table->string('demo_url')->nullable();
            $table->string('playstore_url')->nullable();
            $table->string('status')->default('active'); // active, development, coming_soon
            $table->json('features')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
