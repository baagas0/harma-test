<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id');
            $table->foreignId('category_id');
            $table->integer('sku');
            $table->string('status');
            $table->string('name');
            $table->integer('price');
            $table->integer('stock')->default(0);
            $table->string('unit');
            $table->enum('always_ready_stock', ['false', 'true'])->default('false');
            $table->integer('wight');
            $table->integer('leght')->nullable();
            $table->integer('wide')->nullable();
            $table->integer('high')->nullable();
            $table->integer('minimum_buying')->default(1);
            $table->integer('multiple_buying')->default(1);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
