<?php

namespace App\Modules\Sales;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	use Auditable;
	use SoftDeletes;

	protected $fillable = ['note', 'company_id', 'payment_condition_id', 'currency_id', 'seller_id', 'approved_at', 'checked_at', 'invoiced_at', 'sent_at', 'canceled_at', 'gross_value', 'discount', 'subtotal', 'tax', 'total', 'amortization', 'exchange', 'exchange_sunat', 'comment', 'status'];

	public function scopeName($query, $name){
		if (trim($name) != "") {
			$query->where('name', 'LIKE', "%$name%");
		}
	}
	public function company()
	{
		return $this->hasOne('App\Modules\Finances\Company','id','company_id');
	}
	public function currency()
	{
		return $this->hasOne('App\Modules\Base\Currency','id','currency_id');
	}
	public function payment_condition()
	{
		return $this->hasOne('App\Modules\Finances\PaymentCondition','id','payment_condition_id');
	}
	public function seller()
	{
		return $this->hasOne('App\Modules\HumanResources\Employee','id','seller_id');
	}
	public function details()
	{
		return $this->hasMany('App\Modules\Sales\OrderDetail');
	}
}
