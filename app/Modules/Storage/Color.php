<?php namespace App\Modules\Storage;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model {

	use Auditable;
	use SoftDeletes;

	protected $fillable = ['name', 'code', 'description'];

	public function scopeName($query, $name){
		if (trim($name) != "") {
			$query->where('name', 'LIKE', "%$name%");
		}
	}

}
