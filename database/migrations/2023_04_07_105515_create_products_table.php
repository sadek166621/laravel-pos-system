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
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->string('product_name');
            $table->string('product_code')->unique();
            $table->float('product_price');
            $table->float('product_cost');
            $table->string('product_stock');
            $table->string('product_made_by')->nullable();
            $table->text('description')->nullable();
            $table->text('main_image');
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
