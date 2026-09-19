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
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();

            // Banner
            $table->string('banner_title')->nullable();

            // About Section
            $table->string('about_label')->nullable();
            $table->string('about_tagline')->nullable();
            $table->string('about_title')->nullable();
            $table->text('about_description')->nullable();
            $table->text('about_description_2')->nullable();
            $table->string('about_image')->nullable();
            $table->string('about_button_text')->nullable();

            // Technologies Section
            $table->string('technology_label')->nullable();
            $table->string('technology_title')->nullable();
            $table->text('technology_description')->nullable();

            // Stats
            $table->string('stats_title')->nullable();

            // Vision / Values / Mission
            $table->string('vm_label')->nullable();
            $table->string('vm_title')->nullable();

            $table->string('vision_title')->nullable();
            $table->text('vision_description')->nullable();

            $table->string('values_title')->nullable();
            $table->text('values_description')->nullable();

            $table->string('mission_title')->nullable();

            // Quality
            $table->string('quality_label')->nullable();
            $table->string('quality_title')->nullable();
            $table->text('quality_description')->nullable();
            $table->text('quality_description_2')->nullable();
            $table->string('quality_image')->nullable();

            // CTA
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_button_text')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};
