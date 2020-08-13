<?php

use App\Product;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->integer('quantity')->unsigned();
            $table->string('on_sale')->default(Product::PRODUCT_NOT_ON_SALE);
            $table->string('status')->default(Product::PRODUCT_AVAILABLE);
            $table->integer('record')->unsigned();
            $table->integer('price');
            $table->string('image');
            $table->integer('client_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_id')->references('id')->on('users');
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
