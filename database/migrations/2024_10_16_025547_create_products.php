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
            $table->string('title', 200);
            $table->string('short_des', 500);
            $table->string('price', 50);
            $table->boolean('discount');
            $table->string('discount_price', 50);
            $table->string('image', 100);
            $table->boolean('stock');
            $table->float('star');
            $table->enum('Remark', ['popular', 'new', 'top', 'special', 'trending']);

            // F -key 
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');

            //categories relationship 
            $table->foreign('category_id')->references('id')->on('categories')->restrictOnDelete()->cascadeOnUpdate();

            // brand relationship 
            $table->foreign('brand_id')->references('id')->on('brands')->restrictOnDelete()->cascadeOnUpdate();

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
