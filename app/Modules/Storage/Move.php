<?php namespace App\Modules\Storage;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;

class Move extends Model
{

	use Auditable;
	use SoftDeletes;

	protected $fillable = ['document', 'code_document', 'series', 'number', 'type_op', 'input', 'output', 'stock', 'avarage_value_before', 'avarage_value_after', 'document_model', 'document_id'];

}
