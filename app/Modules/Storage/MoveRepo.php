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
		//$st_model = StockRepo::find($data['stock_id']);
		if ($id>0) {
			$moves_before = $this->model->where('id', '>=', $id)->where('stock_id', $data['stock_id'])->orderBy('id', 'asc')->get();
			foreach ($moves_before as $key => $move_before) {
				//$model = $this->model->findOrFail($move_before->id);
				//$q = $model->output - $model->input + $data['input'] - $data['output'];
				$data['id'] = $move_before->id;
				if ($move_before->id == $id) {
					//dd("if");
					$last_stock = $move_before->stock + $move_before->output - $move_before->input;
					$q = $data['input'] - $data['output'];
					$last_avarage = $move_before->avarage_value_before;
					$data['stock'] = $last_stock + $q;
					$data['avarage_value_before'] = $last_avarage;
					$data['avarage_value_after'] = ($last_avarage * $last_stock + (($data['change_value']) ? $data['value'] : $last_avarage) * $q)/($last_stock + $q);
				} else {
					/*$data['document'] = $move_before->document;
					$data['code_document'] = $move_before->code_document;
					$data['series'] = $move_before->series;
					$data['number'] = $move_before->number;
					$data['type_op'] = $move_before->type_op;
					$data['input'] = $move_before->input;
					$data['output'] = $move_before->output;
					$data['unit_id'] = $move_before->unit_id;
					$data['change_value'] = $move_before->change_value;
					$data['document_model'] = $move_before->document_model;
					$data['document_id'] = $move_before->;*/
					unset($data);
					$q = $move_before->input - $move_before->output;
					//$last_avarage = $move_before->avarage_value_before;
					$data['stock'] = $last_stock + $q;
					$data['avarage_value_before'] = $last_avarage;
					$data['avarage_value_after'] = ($last_avarage * $last_stock + (($move_before->change_value) ? $move_before->value : $last_avarage) * $q)/($last_stock + $q);
				}
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
			$data['stock'] = $last_stock + $q;
			$data['avarage_value_before'] = $last_avarage;
			$data['avarage_value_after'] = ($last_avarage * $last_stock + (($data['change_value']) ? $data['value'] : $last_avarage) * $q)/($last_stock + $q);
			$last_stock = $data['stock'];
			$last_avarage =	$data['avarage_value_after'];				
			$model = parent::save($data, 0);
		}

		$st_model->stock = $last_stock;
		$st_model->avarage_value = $last_avarage;
		$st_model->save();
		return true;
		/*if ($id>0) {
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
		}*/
	}

	public function calcAvarage($id=0)
	{
		# code...
	}

}