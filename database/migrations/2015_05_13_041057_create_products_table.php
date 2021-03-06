<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('intern_code');
			$table->string('provider_code');
			$table->string('manufacturer_code');
			$table->string('name');
			$table->string('description');
			$table->integer('sub_category_id')->unsigned();
			$table->integer('unit_id')->unsigned();
			$table->integer('currency_id')->unsigned();
			$table->integer('size_id')->unsigned();
			$table->integer('color_id')->unsigned();
			$table->integer('material_id')->unsigned();
			$table->string('code_cut');
			$table->integer('basic_design_id');
			$table->decimal('last_purchase', 15, 4);
			$table->decimal('profit_margin', 10, 4);
			$table->decimal('price', 15, 4);
			$table->decimal('set_price', 15, 4);
			$table->boolean('use_set_price');
			
			$table->foreign('currency_id')->references('id')->on('currencies');
			$table->foreign('sub_category_id')->references('id')->on('sub_categories');
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
		Schema::dropIfExists('products');
	}

}
