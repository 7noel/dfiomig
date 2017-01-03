<?php

namespace App\Modules\HumanResources;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
	use Auditable;
	use SoftDeletes;

	protected $fillable = ['name', 'description'];

	public function scopeName($query, $name){
		if (trim($name) != "") {
			$query->where('name', 'LIKE', "%$name%");
		}
	}

}
