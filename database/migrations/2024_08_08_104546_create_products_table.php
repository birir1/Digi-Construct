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
            $table->id(); // This will be the Order ID
            $table->string('product'); // Product name
            $table->integer('quantity'); // Quantity of the product
            $table->decimal('price', 8, 2); // Price of the product
            $table->decimal('shipping_fee', 8, 2); // Shipping fee
            $table->decimal('total', 8, 2); // Total cost (price + shipping fee)
            $table->string('status'); // Order status (e.g., pending, completed)
            $table->timestamps(); // Created at and updated at timestamps
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