<?php 

namespace App\Modules\Storage;

use App\Modules\Base\BaseRepo;
use App\Modules\Storage\Product;
use App\Modules\Storage\ProductRepo;
use App\Modules\Storage\StockRepo;
use App\Modules\Storage\Stock;
use App\Modules\Storage\BasicDesign;

class ProductRepo extends BaseRepo{

	public function getModel(){
		return new Product;
	}
	public function index($filter = false, $search = false)
	{
		if ($filter and $search) {
			return Product::$filter($search)->with('unit', 'sub_category', 'sub_category.category', 'stocks')->orderBy("$filter", 'ASC')->paginate();
		} else {
			return Product::orderBy('id', 'DESC')->with('unit', 'sub_category', 'sub_category.category', 'stocks')->paginate();
		}
	}
	public function prepareData($data)
	{
		$data['price'] = $data['last_purchase'] * (100 + $data['profit_margin']) / 100;
		if (!isset($data['use_set_price'])) {
			$data['use_set_price'] = false;
		}
		if (isset($data['stocks'])) {
			foreach ($data['stocks'] as $key => $value) {
				$data['stocks'][$key]['product_id'] = $data['id'];
			}
		}
		return $data;
	}
	public function save($data, $id=0)
	{
		$model = parent::save($data, $id);
		if (isset($data['stocks'])) {
			$stockRepo= new StockRepo;
			$stockRepo->syncMany($data['stocks'], ['key'=>'product_id', 'value'=>$model->id], 'warehouse_id');
		}
		return $model;
	}
	public function autocomplete($term, $warehouse_id)
	{
		//return Product::where('name','like',"%$term%")->orWhere('intern_code','like',"%$term%")->orWhere('provider_code','like',"%$term%")->orWhere('manufacturer_code','like',"%$term%")->with('stocks','currency')->get();
		$stockRepo = new StockRepo;
		return $stockRepo->autocomplete($term, $warehouse_id);
	}
	public function ajaxGetData($warehouse_id, $product_id)
	{
		$stockRepo = new StockRepo;
		return $stockRepo->ajaxGetData($warehouse_id, $product_id);
	}
	public function generateProducts($data)
	{
		$design = BasicDesign::findOrFail($data['basic_design_id']);
		foreach ($data['products'] as $key => $p) {
			//dd($p);
			if (isset($p)) {
				$product = new Product;
				$pr['name'] = $design->name;
				$pr['description'] = $p['description'];
				$pr['sub_category_id'] = $design->sub_category_id;
				$pr['unit_id'] = $design->unit_id;
				$pr['currency_id'] = 1;
				$pr['size_id'] = $p['size_id'];
				$pr['code_cut'] = $data['code_cut'];
				$pr['basic_design_id'] = $data['basic_design_id'];
				$pr['last_purchase'] = $p['last_purchase'];
				$pr['profit_margin'] = $p['profit_margin'];
				$pr = $this->prepareData($pr);
				$product->fill($pr)->save();

				$stock = new Stock;
				$st['warehouse_id'] = 1;
				$st['product_id'] = $product->id;
				$st['stock_initial'] = $p['stock_initial'];
				$st['stock'] = $p['stock_initial'];
				$st['avarage_value'] = $p['last_purchase'];
				$stock->fill($st)->save();
			}
		}
		return true;
	}
}