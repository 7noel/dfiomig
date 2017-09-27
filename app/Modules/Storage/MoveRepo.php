<?php 

namespace App\Modules\Storage;

use App\Modules\Base\BaseRepo;
use App\Modules\Storage\Move;
use App\Modules\Storage\StockRepo;

class MoveRepo extends BaseRepo{

	public function getModel(){
		return new Move;
	}

	public function save($data, $id=0)
	{
		$data = $this->prepareData($data);
		$stockRepo = new StockRepo;
		$st_model = $stockRepo->find($data['stock_id']);
		if (!$st_model) {
			return false;
		}
		if ($id>0) {
			$moves_before = $this->model->where('id', '>=', $id)->where('stock_id', $data['stock_id'])->orderBy('id', 'asc')->get();
			foreach ($moves_before as $key => $move_before) {
				//$model = $this->model->findOrFail($move_before->id);
				//$q = $model->output - $model->input + $data['input'] - $data['output'];
				$data['id'] = $move_before->id;
				if ($move_before->id == $id) {
					$last_stock = $move_before->stock + $move_before->output - $move_before->input;
					$q = $data['input'] - $data['output'];
					$last_avarage = $move_before->avarage_value_before;
					$v = ($data['change_value']) ? $data['value'] : $last_avarage;
					/*$data['stock'] = $last_stock + $q;
					$data['avarage_value_before'] = $last_avarage;
					$data['avarage_value_after'] = ($last_avarage * $last_stock + (($data['change_value']) ? $data['value'] : $last_avarage) * $q)/($last_stock + $q);*/
				} else {
					unset($data);
					$q = $move_before->input - $move_before->output;
					$v = ($move_before->change_value) ? $move_before->value : $last_avarage;
					/*$data['stock'] = $last_stock + $q;
					$data['avarage_value_before'] = $last_avarage;
					$data['avarage_value_after'] = ($last_avarage * $last_stock + (($move_before->change_value) ? $move_before->value : $last_avarage) * $q)/($last_stock + $q);*/
				}
				$data = $this->calcAvarage($last_stock, $last_avarage, $q, $v);
				$last_stock = $data['stock'];
				$last_avarage =	$data['avarage_value_after'];				
				$model = parent::save($data, $move_before->id);
			}

		} else {
			$move_before = $this->model->where('stock_id', $data['stock_id'])->orderBy('id', 'desc')->first();
			if ($move_before) {
				$last_stock = $move_before->stock;
				$last_avarage = $move_before->avarage_value_after;
			} else {
				$last_stock = 0;
				$last_avarage = $data['value'];
			}
			
			$q = $data['input'] - $data['output'];
			$v = ($data['change_value']) ? $data['value'] : $last_avarage;
			$data = array_merge($data, $this->calcAvarage($last_stock, $last_avarage, $q, $v));
			/*$data['stock'] = $last_stock + $q;
			$data['avarage_value_before'] = $last_avarage;
			$data['avarage_value_after'] = ($last_avarage * $last_stock + (($data['change_value']) ? $data['value'] : $last_avarage) * $q)/($last_stock + $q);*/
			$last_stock = $data['stock'];
			$last_avarage =	$data['avarage_value_after'];				
			$model = parent::save($data, 0);
		}

		//dd($model->getMorphClass());
		//$st_model = $stockRepo->find($data['stock_id']);
		$st_model->stock = $last_stock;
		$st_model->avarage_value = $last_avarage;
		$st_model->save();
		//$st_model = $stockRepo->save(['stock'=>$last_stock, 'avarage_value'=>$last_avarage], $data['stock_id']);
		return $model;
	}

	public function calcAvarage($q0,$v0,$q,$v)
	{
		$arr['stock'] = $q0 + $q;
		$arr['avarage_value_before'] = $v0;
		$arr['avarage_value_after'] = ($q0*$v0 + $q*$v) / ($q0 + $q);
		return $arr;
	}

}