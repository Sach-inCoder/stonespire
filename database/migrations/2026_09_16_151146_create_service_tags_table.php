<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_tags', function (Blueprint $table) {
            $table->id();

            $table->foreignId('service_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('slug');

            $table->boolean('status')->default(true);

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();

            $table->unique(['service_id', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_tags');
    }
};