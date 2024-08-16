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
            $table->string('slug');
            $table->string('primary_image');
            $table->text('description');
            $table->integer('status')->default(1);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('delivery_amount');
            $table->unsignedInteger('delivery_amount_per_product');
            $table->timestamps();

            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
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
