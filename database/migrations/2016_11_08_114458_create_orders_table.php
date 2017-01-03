<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('note', 20);
            $table->integer('company_id')->unsigned();
            $table->integer('payment_condition_id')->unsigned();
            $table->integer('currency_id')->unsigned();
            $table->integer('seller_id')->unsigned();
            $table->dateTime('approved_at')->nullable();
            $table->dateTime('checked_at')->nullable();
            $table->dateTime('invoiced_at')->nullable();
            $table->dateTime('sent_at')->nullable();
            $table->dateTime('canceled_at')->nullable();
            $table->string('status', 20);
            $table->decimal('gross_value', 12,2);
            $table->decimal('discount', 12,2);
            $table->decimal('subtotal', 12,2);
            $table->decimal('tax', 12,2);
            $table->decimal('total', 12,2);
            $table->decimal('amortization', 12,2);
            $table->decimal('exchange', 12,2);
            $table->decimal('exchange_sunat', 12,2);
            $table->text('comment');

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('payment_condition_id')->references('id')->on('payment_conditions');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('seller_id')->references('id')->on('employees');
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
        Schema::dropIfExists('orders');
    }
}
