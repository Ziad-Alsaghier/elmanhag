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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->float('discount')->default(0);
            $table->foreignId('category_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('demo_video')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('url')->nullable();
            $table->string('description')->nullable();
            $table->boolean('status')->default(1);
            $table->date('expired_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
