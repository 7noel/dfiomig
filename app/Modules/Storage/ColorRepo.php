<?php 

namespace App\Modules\Storage;

use App\Modules\Base\BaseRepo;
use App\Modules\Storage\Color;

class ColorRepo extends BaseRepo{

	public function getModel(){
		return new Color;
	}
	public function autocomplete($term)
	{
		return Color::where('name','like',"%$term%")->get();
	}
	public function index($filter = false, $search = false)
	{
		if ($filter and $search) {
			return Color::$filter($search)->orderBy("$filter", 'ASC')->paginate();
		} else {
			return Color::orderBy('id', 'DESC')->paginate();
		}
	}
}