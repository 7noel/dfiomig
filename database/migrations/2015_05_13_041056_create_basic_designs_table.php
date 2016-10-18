<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicDesignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('basic_designs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('intern_code');
			$table->string('name');
			$table->string('description');
			$table->integer('sub_category_id')->unsigned();
			$table->integer('unit_id')->unsigned();
			
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
		Schema::drop('basic_designs');
	}

}
