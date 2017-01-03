					<div class="form-group form-group-sm">
						{!! Form::label('name','Nombre', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
						{!! Form::text('name', null, ['class'=>'form-control uppercase']) !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('sub_category_id','SubCategoría', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-3">
						{!! Form::select('sub_category_id', $sub_categories, ((isset($model->sub_category_id)) ? $model->sub_category_id : null),['class'=>'form-control', 'id'=>'lstSubCategories']); !!}
						</div>
						{!! Form::label('price','Precio', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
						{!! Form::text('price', null, ['class'=>'form-control']) !!}
						</div>
						<div class="col-sm-2">
						{!! Form::select('currency_id', $currencies, ((isset($model->currency_id)) ? $model->currency_id : null),['class'=>'form-control', 'id'=>'lstCurrencies']); !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						{!! Form::label('description','Descripción', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
						{!! Form::text('description', null, ['class'=>'form-control']) !!}
						</div>
					</div>
