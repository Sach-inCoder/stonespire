<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->string('image')->nullable();

            $table->string('category')->nullable();

            $table->text('short_description')->nullable();

            $table->longText('content')->nullable();

            $table->string('author')->default('Stonespire Graphics');

            $table->string('quote')->nullable();
            $table->string('quote_author')->nullable();

            $table->unsignedInteger('read_time')->nullable();

            $table->unsignedInteger('sort_order')->default(0);

            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(true);

            $table->date('published_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};