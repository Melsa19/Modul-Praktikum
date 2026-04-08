<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            // Perbaikan: id() sudah otomatis membuat Primary Key & Auto-Increment
            $table->id('product_id'); 
            
            $table->unsignedBigInteger('category_id');
            $table->string('product_name');
            $table->integer('product_price');
            $table->integer('product_stock');
            $table->timestamps();

            // Relasi Foreign Key
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};