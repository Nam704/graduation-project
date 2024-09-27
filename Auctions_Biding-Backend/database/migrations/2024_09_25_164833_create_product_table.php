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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->unsignedInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('ram_id');
            $table->unsignedBigInteger('storage_id');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brand')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('color')->onDelete('cascade');
            $table->foreign('ram_id')->references('id')->on('ram')->onDelete('cascade');
            $table->foreign('storage_id')->references('id')->on('storage')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
