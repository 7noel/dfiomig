<?php 

namespace App\Modules\Storage;

use App\Modules\Base\BaseRepo;
use App\Modules\Storage\Size;

class SizeRepo extends BaseRepo{

	public function getModel(){
		return new Size;
	}
	public function autocomplete($term)
	{
		return Size::where('name','like',"%$term%")->get();
	}
	public function index($filter = false, $search = false)
	{
		if ($filter and $search) {
			return Size::$filter($search)->with('size_type')->orderBy("$filter", 'ASC')->paginate();
		} else {
			return Size::orderBy('id', 'DESC')->with('size_type')->paginate();
		}
	}
	public function getList2($size_type)
	{
		return [''=>'Seleccionar'] + Size::where('size_type_id',$size_type)->lists('name', 'id')->toArray();
	}
	public function ajaxList($size_type_id)
	{
		$ajax = Size::select('id','name')->where('size_type_id','=',$size_type_id)->get();
		return $ajax;
	}
}