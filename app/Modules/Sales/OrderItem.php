<?php

namespace App\Modules\Sales;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
	use Auditable;
	use SoftDeletes;

	protected $fillable = [];
}
