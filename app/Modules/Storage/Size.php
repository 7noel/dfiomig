<?php namespace App\Modules\Storage;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model {

	USE Auditable;
	use SoftDeletes;

	protected $fillable = ['name', 'symbol', 'size_type_id', 'description'];

	public function scopeName($query, $name){
		if (trim($name) != "") {
			$query->where('name', 'LIKE', "%$name%");
		}
	}
	public function size_type()
	{
		return $this->belongsTo('App\Modules\Storage\SizeType');
	}

}
