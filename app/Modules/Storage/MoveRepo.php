<?php 

namespace App\Modules\Storage;

use App\Modules\Base\BaseRepo;
use App\Modules\Storage\Move;
use App\Modules\Storage\StockRepo;

class MoveRepo extends BaseRepo{

	public function getModel(){
		return new Move;
	}

	/*public function save($data, $id=0)
	{
		$data = $this->prepareData($data);
		$stockRepo = new StockRepo;
		$st_model = $stockRepo->find($data['stock_id']);
		if ($id>0) {
			$m0_model = $this->model->where('id', '<', $data['id'])->where('id', $data['stock_id'])->orderBy('id', 'desc')->first();
			$model = $this->model->findOrFail($id);
			$q = $model->output - $model->input + $data['input'] - $data['output'];
			$model->fill($data);
		} else {
			$m0_model = $this->model->where($data['stock_id'])->orderBy('id', 'desc')->first();
			$model = $this->model->fill($data);
			$q = $data['input'] - $data['output'];
		}
		if ($s0_model) {
			$st['stock'] = $q + $m0_model['stock'];
			$promedio = ($m0_model['avarage_value_after']*$m0_model['stock'] + $q*$data['value'])/($m0_model['stock'] + $q);
		} else {
			$promedio = $value;
		}
		if ($model->save()) {
			$st['avarage_value'] = $data['avarage_value_after'];
			$st_model->fill($st);
			$st_model->save();
			return $model;
		} else {
			return false;
		}
	}
	public function calcAvarage($id=0)
	{
		# code...
	}*/

}