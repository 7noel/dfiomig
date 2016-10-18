<?php namespace App\Modules\Storage;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BasicDesign extends Model {

	use SoftDeletes;

	protected $fillable = ['name', 'intern_code', 'description', 'sub_category_id', 'unit_id'];

	public function scopeName($query, $name){
		if (trim($name) != "") {
			$query->where('name', 'LIKE', "%$name%");
		}
	}
	public function sub_category()
	{
		return $this->belongsTo('App\Modules\Storage\SubCategory');
	}
	public function unit()
	{
		return $this->hasOne('App\Modules\Storage\Unit','id','unit_id');
	}
	public function products()
	{
		return $this->hasMany('App\Modules\Storage\Product');
	}
	// public function stocks()
	// {
	// 	return $this->hasMany('App\Modules\Storage\Stock');
	// }
	// public function currency()
	// {
	// 	return $this->hasOne('App\Modules\Base\Currency','id','currency_id');
	// }
}
