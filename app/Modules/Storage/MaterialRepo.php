<?php 

namespace App\Modules\Storage;

use App\Modules\Base\BaseRepo;
use App\Modules\Storage\Material;

class MaterialRepo extends BaseRepo{

	public function getModel(){
		return new Material;
	}
	public function autocomplete($term)
	{
		return Material::where('name','like',"%$term%")->get();
	}
	public function index($filter = false, $search = false)
	{
		if ($filter and $search) {
			return Material::$filter($search)->orderBy("$filter", 'ASC')->paginate();
		} else {
			return Material::orderBy('id', 'DESC')->paginate();
		}
	}
}