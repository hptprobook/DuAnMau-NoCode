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
            $table->unsignedTinyInteger('rate')->nullable();
            $table->unsignedBigInteger('price');
            $table->unsignedTinyInteger('discount');
            $table->string('avatar');
            $table->string('product_code');
            $table->string('description');
            $table->text('detail');
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('id')->on('child_categories');
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
