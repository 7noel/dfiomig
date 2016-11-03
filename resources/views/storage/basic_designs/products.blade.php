@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading panel-heading-custom">
					<button type="button" class="btn btn-success btn-xs btnAddProduct" aria-label="Left Align">
						Nuevo <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					</button>
					<span> {{ $model->name }}</span>
				</div>
				<div class="panel-body">
				{!! Form::open(['route'=> 'products_generate_by_design' , 'method'=>'POST', 'class'=>'form-horizontal']) !!}
					{!! Form::hidden('basic_design_id', $model->id, ['id'=>'basic_design_id']) !!}
					{!! Form::hidden('items', '0', ['id'=>'items']) !!}
					<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th class="col-sm-1">Talla</th>
								<th class="col-sm-1">Nro Corte</th>
								<th class="col-sm-1">Precio Venta</th>
								<th class="col-sm-3">Descripcion</th>
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
							<td>{!! Form::select('description1', $sizes, null, ['class'=>'form-control', 'data-size_id'=>'']); !!}</td>
							<td>{!! Form::text('description2', null, ['class'=>'form-control', 'data-code_cut'=>'']) !!}</td>
							<td>{!! Form::text('description3', null, ['class'=>'form-control', 'data-use_set_price'=>'']) !!}</td>
							<td>{!! Form::text('description4', null, ['class'=>'form-control', 'data-description'=>'']) !!}</td>
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
