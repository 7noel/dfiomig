<?php 

namespace App\Modules\Storage;

use App\Modules\Base\BaseRepo;
use App\Modules\Storage\SizeType;

class SizeTypeRepo extends BaseRepo{

	public function getModel(){
		return new SizeType;
	}
	
}