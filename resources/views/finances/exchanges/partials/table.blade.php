					<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th>#</th>
								<th>Fecha</th>
								<th>Moneda</th>
								<th>Venta</th>
								<th>Compra</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($models as $model)
							<tr data-id="{{ $model->id }}">
								<td>{{ $model->id }}</td>
								<td class='date'>{{ $model->date }}</td>
								<td>{{ $model->currency->symbol }}</td>
								<td>{{ $model->sales }}</td>
								<td>{{ $model->purchase }}</td>
								<td>
									<a href="{{ route($routes['edit'] , $model) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
									<a href="#" class="btn-delete btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>