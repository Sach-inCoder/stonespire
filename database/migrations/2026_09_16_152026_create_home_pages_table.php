<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();

            // Hero
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_button_text')->nullable();
            $table->string('hero_button_url')->nullable();

            // About
            $table->string('about_label')->nullable();
            $table->string('about_experience')->nullable();
            $table->string('about_title')->nullable();
            $table->text('about_description')->nullable();
            $table->text('about_description_2')->nullable();
            $table->string('about_image')->nullable();
            $table->string('about_button_text')->nullable();
            $table->string('about_button_url')->nullable();

            // Quote
            $table->string('quote_title')->nullable();
            $table->string('quote_button_text')->nullable();
            $table->string('quote_button_url')->nullable();

            // Printing Solutions
            $table->string('solutions_subtitle')->nullable();
            $table->string('solutions_title')->nullable();

            // Product Range
            $table->string('products_label')->nullable();
            $table->string('products_title')->nullable();
            $table->text('products_description')->nullable();

            // Nationwide Presence
            $table->string('location_title')->nullable();
            $table->text('location_description')->nullable();
            $table->string('location_label')->nullable();
            $table->string('location_name')->nullable();
            $table->string('location_map')->nullable();

            // Testimonials
            $table->string('testimonials_title')->nullable();
            $table->text('testimonials_description')->nullable();

            // Clients
            $table->string('clients_label')->nullable();
            $table->string('clients_title')->nullable();

            // Quality Lab
            $table->string('quality_title')->nullable();
            $table->string('quality_subtitle')->nullable();
            $table->string('quality_image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_pages');
    }
};