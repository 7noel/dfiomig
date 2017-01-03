<?php namespace App\Modules\Sales;

use App\Modules\Base\BaseRepo;
use App\Modules\Sales\OrderItem;

class OrderItemRepo extends BaseRepo{

	public function getModel(){
		return new OrderItem;
	}

}