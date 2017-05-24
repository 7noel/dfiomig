<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\DB::statement("CREATE VIEW v_products AS
                        SELECT p.code_cut, p.name, p.sub_category_id, t.name as sub_category, p.unit_id, t1.symbol as unit, p.currency_id, t2.symbol as currency, b.price, p.basic_design_id, sum(s.stock) as stock
                        from products as p inner join
                        basic_designs as b on p.basic_design_id=b.id
                        inner join stocks as s on p.id=s.product_id
                        inner join units as t1 on p.unit_id=t1.id
                        inner join currencies as t2 on p.currency_id=t2.id
                        inner join sub_categories as t on p.sub_category_id=t.id
                        WHERE p.code_cut != ''
                        GROUP BY p.code_cut");
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		\DB::statement("DROP VIEW v_products");
	}

}
