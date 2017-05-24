@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default" id='prueba'>
				<div class="panel-heading panel-heading-custom">
					<button type="button" class="btn btn-success btn-xs btnAddProduct" aria-label="Left Align">
						AGREGAR <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					</button>
					<span> {{ $model->name }}</span>
				</div>
				<div class="panel-body">
				{!! Form::open(['route'=> 'products_generate_by_design' , 'method'=>'POST', 'class'=>'form-horizontal']) !!}
					{!! Form::hidden('basic_design_id', $model->id, ['id'=>'basic_design_id']) !!}
					{!! Form::hidden('items', '0', ['id'=>'items']) !!}
					<div class="form-group form-group-sm" id="prueba2">
						{!! Form::label('code_cut','Número de Corte', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-2">
						{!! Form::text('code_cut', null, ['class'=>'form-control uppercase', 'required'=>'required']) !!}
						</div>
					</div>
					<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th class="col-sm-1">Talla</th>
								<th class="col-sm-1">Color</th>
								<th class="col-sm-1">Material</th>
								<th class="col-sm-1">Cantidad</th>
								<th class="col-sm-1">Costo</th>
								<th class="col-sm-1">Margen(%)</th>
								<th class="col-sm-1">Precio</th>
								<th>Descripcion</th>
							</tr>
						</thead>
						<tbody id="table-products">
						</tbody>
					</table>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Grabar Productos</button>
						</div>
					</div>
				{!! Form::close() !!}
					<template id="template-row-product">
						<tr>
							<td>{!! Form::select('data1', $sizes, null, ['class'=>'form-control', 'data-size_id'=>'', 'required'=>'required']); !!}</td>
							<td>{!! Form::select('data6', $colors, null, ['class'=>'form-control', 'data-color_id'=>'', 'required'=>'required']); !!}</td>
							<td>{!! Form::select('data7', $materials, null, ['class'=>'form-control', 'data-material_id'=>'', 'required'=>'required']); !!}</td>
							<td>{!! Form::text('data5', null, ['class'=>'form-control', 'data-stock_initial'=>'', 'required'=>'required']) !!}</td>
							<td>{!! Form::text('data2', null, ['class'=>'form-control', 'data-last_purchase'=>'']) !!}</td>
							<td>{!! Form::text('data3', null, ['class'=>'form-control', 'data-profit_margin'=>'']) !!}</td>
							<td> <span class='form-control' data-price></span> </td>
							<td>{!! Form::text('data4', null, ['class'=>'form-control', 'data-description'=>'']) !!}</td>
						</tr>
					</template>
				</div>
			</div>
		</div>
	</div>
</div>
@section('scripts')

{!! Html::script('js/storage/generateProducts.js') !!}

@endsection

@endsection
