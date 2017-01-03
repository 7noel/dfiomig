<?php

namespace App\Modules\Sales;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
	use Auditable;
	use SoftDeletes;

	protected $fillable = ['order_id', 'basic_design_id', 'unit_id', 'price', 'quantity', 'discount', 'total', 'comment'];

	public function order()
	{
		return $this->hasOne('App\Modules\Sales\Order','id','order_id');
	}
	public function basic_design()
	{
		return $this->hasOne('App\Modules\Storage\BasicDesign','id','basic_design_id');
	}
	public function unit()
	{
		return $this->hasOne('App\Modules\Storage\Unit','id','unit_id');
	}
}
