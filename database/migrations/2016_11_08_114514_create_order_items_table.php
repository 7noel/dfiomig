<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->integer('stock_id')->unsigned();
            $table->integer('unit_id')->unsigned();
            $table->decimal('price',15,2);
            $table->decimal('quantity',15,2);
            $table->decimal('discount',15,2);
            $table->decimal('total',15,2);
            $table->text('comment');

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('stock_id')->references('id')->on('stocks');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
