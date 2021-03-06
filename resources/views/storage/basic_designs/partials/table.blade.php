					<table class="table table-hover table-condensed">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Sub Categoría</th>
								<th>Unidad</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($models as $model)
							<tr data-id="{{ $model->id }}">
								<td>{{ $model->id }}</td>
								<td>{{ $model->name }} </td>
								<td>{{ $model->sub_category->name }} </td>
								<td>{{ $model->unit->symbol }} </td>
								<td>
									<a href="{{ route( 'products_by_design' , ['basic_design_id' => $model->id]) }}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Productos</a>
									<a href="{{ route( $routes['edit'] , $model) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
									<a href="#" class="btn-delete btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>