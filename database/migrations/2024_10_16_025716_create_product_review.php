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
        Schema::create('product_review', function (Blueprint $table) {
            $table->id();
            $table->string('description', 1000);

            // F- key 
            $table->string('email', 200);
            $table->unsignedBigInteger('product_id');

            // relationship email
            $table->foreign('email')->references('email')->on('profiles')
            ->restrictOnDelete()
            ->cascadeOnUpdate();

            //relationship product id
            $table->foreign('product_id')->references('id')->on('products')
            ->restrictOnDelete()
            ->cascadeOnUpdate();

            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_review');
    }
};
