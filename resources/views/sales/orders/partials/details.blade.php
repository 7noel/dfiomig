						<a href="#" id="btnAddProduct" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar</a></td>
						@php $i=0; @endphp
						
						<table class="table table-condensed">
							<thead>
								<tr>
									<th class="col-sm-1">#</th>
									<th class="col-sm-5">Descripción</th>
									<th class="col-sm-1">Cantidad</th>
									<th class="col-sm-1">Precio</th>
									<th class="col-sm-1">Dscto(%)</th>
									<th class="col-sm-1">V.Venta</th>
									<th class="col-sm-2">Acciones</th>
								</tr>
							</thead>
							<tbody id="tableItems">
							@if(isset($model->details))
							@foreach($model->details as $detail)
								<tr data-id="{{ $detail->id }}">
									{!! Form::hidden("details[$i][code_cut]", $detail->code_cut, ['class'=>'codeCut','data-codecut'=>'']) !!}
									{!! Form::hidden("details[$i][unit_id]", $detail->unit_id, ['class'=>'unitId','data-unitid'=>'']) !!}
									<td><span class='form-control code_cut text-right' data-labelid>{{ $detail->code_cut }}</span></td>
									<td>{!! Form::text("details[$i][txtDesign]", $detail->v_product->name, ['class'=>'form-control txtDesign', 'data-design'=>'', 'required'=>'required', 'disabled']); !!}</td>
									<td>{!! Form::text("details[$i][quantity]", $detail->quantity, ['class'=>'form-control txtCantidad text-right', 'data-cantidad'=>'']) !!}</td>
									<td>{!! Form::text("details[$i][price]", $detail->price, ['class'=>'form-control txtPrecio text-right', 'data-precio'=>'']) !!}</td>
									<td>{!! Form::text("details[$i][discount]", $detail->discount, ['class'=>'form-control txtDscto text-right', 'data-dscto'=>'']) !!}</td>
									<td> <span class='form-control txtTotal text-right' data-total>{{ $detail->total }}</span> </td>
									<td class="text-center"><div class="checkbox"><label><input type="checkbox" name="details[{{$i}}][is_deleted]" data-isdeleted class="isdeleted"> Eliminar</label></div></td>
								</tr>
								@php $i++; @endphp
							@endforeach
							@endif
							</tbody>
						</table>
						<template id="template-row-item">
							<tr>
								{!! Form::hidden('data1', null, ['class'=>'codeCut','data-codecut'=>'']) !!}
								{!! Form::hidden('data2', null, ['class'=>'unitId','data-unitid'=>'']) !!}
								<div style="display:none;">
									holaaa
								</div>
								<td><span class='form-control code_cut text-right' data-labelid></span></td>
								<td>{!! Form::text('data3', null, ['class'=>'form-control txtDesign', 'data-design'=>'', 'required'=>'required']); !!}</td>
								<td>{!! Form::text('data4', null, ['class'=>'form-control txtCantidad text-right', 'data-cantidad'=>'']) !!}</td>
								<td>{!! Form::text('data5', null, ['class'=>'form-control txtPrecio text-right', 'data-precio'=>'']) !!}</td>
								<td>{!! Form::text('data6', null, ['class'=>'form-control txtDscto text-right', 'data-dscto'=>'']) !!}</td>
								<td> <span class='form-control txtTotal text-right' data-total></span> </td>
								<td class="text-center form-inline"><a href="#" class="btn-delete btn btn-info btn-xs"><span class="glyphicon glyphicon-option-vertical" aria-hidden="true"></span></a>&nbsp&nbsp<div class="checkbox"><label><input type="checkbox" name="data7" data-isdeleted class="isdeleted"> Eliminar</label></div></td>
							</tr>
						</template>
						{!! Form::hidden('items', $i, ['id'=>'items']) !!}
						<table class="table table-condensed">
							<thead>
								<tr>
									<th class="text-center">V.Bruto</th>
									<th class="text-center">Dscto</th>
									<th class="text-center">SubTotal</th>
									<th class="text-center">Total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center"><span id="mGrossValue">{{ (isset($model)) ? $model->gross_value : "0.00" }}</span></td>
									<td class="text-center"><span id="mDiscount">{{ (isset($model)) ? $model->discount : "0.00" }}</span></td>
									<td class="text-center"><span id="mSubTotal">{{ (isset($model)) ? $model->subtotal : "0.00" }}</span></td>
									<td class="text-center"><span id="mTotal">{{ (isset($model)) ? $model->total : "0.00" }}</span></td>
								</tr>
							</tbody>
						</table>
						
						<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content row">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalle del producto</h4>
      </div>
      <div class="modal-body">
      	<div class="col-sm-4 form-group-sm">
	        <table class="table table-condensed">
	        	<thead>
		        	<tr>
		        		<th class="col-sm-2">Talla</th>
		        		<th class="col-sm-2">Cantidad</th>
		        	</tr>
	        	</thead>
	        	<tbody>
	        		<tr>
	        			<td>ADULTO S</td>
	        			<td><input class="form-control" type="number" name="" value="4"></td>
	        		</tr>
	        		<tr>
	        			<td>ADULTO M</td>
	        			<td><input class="form-control" type="number" name="" value="4"></td>
	        		</tr>
	        		<tr>
	        			<td>ADULTO L</td>
	        			<td><input class="form-control" type="number" name="" value="4"></td>
	        		</tr>
	        		<tr>
	        			<td>ADULTO XL</td>
	        			<td><input class="form-control" type="number" name="" value="4"></td>
	        		</tr>
	        	</tbody>
	        </table>
		</div>
			<label for="obs">Observaciones</label>
			<div>
				<textarea id="obs" name="" id="" cols="50" rows="5"></textarea>
			</div>
    	<div>
    	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>