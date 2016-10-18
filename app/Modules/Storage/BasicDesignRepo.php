<?php 

namespace App\Modules\Storage;

use App\Modules\Base\BaseRepo;
use App\Modules\Storage\Product;
use App\Modules\Storage\BasicDesign;

class BasicDesignRepo extends BaseRepo{

	public function getModel(){
		return new BasicDesign;
	}
	public function index($filter = false, $search = false)
	{
		if ($filter and $search) {
			return BasicDesign::$filter($search)->with('unit', 'sub_category')->orderBy("$filter", 'ASC')->paginate();
		} else {
			return BasicDesign::orderBy('id', 'DESC')->with('unit', 'sub_category')->paginate();
		}
	}
	public function prepareData($data)
	{
		if (!isset($data['unit_id'])) {
			$data['unit_id'] = 1;
		}
		return $data;
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
}