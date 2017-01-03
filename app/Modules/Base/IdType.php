<?php namespace App\Modules\Base;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IdType extends Model {

	use Auditable;
	use SoftDeletes;

	protected $fillable = ['name', 'symbol'];

	public function scopeName($query, $name){
		if (trim($name) != "") {
			$query->where('name', 'LIKE', "%$name%");
		}
	}

}
