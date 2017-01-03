<?php 
return array(
//	'admin' => [
		'id_types' => [
			'index'  => ['panel'=>'Tipos de Documento', 'create'=>'Crear Tipo de Documento'],
			'create' => ['panel'=>'Nuevo Tipo de Documento:', 'create'=>'Crear Tipo de Documento'],
			'show'   => ['panel'=>'Vizualizando Tipo de Documento'],
			'edit'   => ['panel'=>'Editar Tipo de Documento: ', 'update'=>'Actualizar Tipo de Documento', 'delete'=>'Eliminar Tipo de Documento']
		],
		'unit_types' => [
			'index'  => ['panel'=>'Tipos de Unidad', 'create'=>'Crear Tipo de Unidad'],
			'create' => ['panel'=>'Nuevo Tipo de Unidad', 'create'=>'Crear Tipo de Unidad'],
			'show'   => ['panel'=>'Vizualizando Tipo de Unidad:'],
			'edit'   => ['panel'=>'Editar Tipo de Unidad: ', 'update'=>'Actualizar Tipo de Unidad', 'delete'=>'Eliminar Tipo de Unidad']
		],
		'currencies' => [
			'index'  => ['panel'=>'Monedas', 'create'=>'Crear Moneda'],
			'create' => ['panel'=>'Nueva Moneda', 'create'=>'Crear Moneda'],
			'show'   => ['panel'=>'Vizualizando Moneda:'],
			'edit'   => ['panel'=>'Editar Moneda: ', 'update'=>'Actualizar Moneda', 'delete'=>'Eliminar Moneda']
		],
		'document_types' => [
			'index'  => ['panel'=>'Tipos de Documento', 'create'=>'Crear Tipo de Documento'],
			'create' => ['panel'=>'Nueva Tipo de Documento:', 'create'=>'Crear Tipo de Documento'],
			'show'   => ['panel'=>'Vizualizando Tipo de Documento'],
			'edit'   => ['panel'=>'Editar Tipo de Documento: ', 'update'=>'Actualizar Tipo de Documento', 'delete'=>'Eliminar Tipo de Documento']
		],
		'document_controls' => [
			'index'  => ['panel'=>'Controles de Documento', 'create'=>'Crear Control de Documento'],
			'create' => ['panel'=>'Nueva Control de Documento:', 'create'=>'Crear Control de Documento'],
			'show'   => ['panel'=>'Vizualizando Control de Documento'],
			'edit'   => ['panel'=>'Editar Control de Documento: ', 'update'=>'Actualizar Control de Documento', 'delete'=>'Eliminar Control de Documento']
		],
	// ],
	// 'finances' => [
		'exchanges' => [
			'index'  => ['panel'=>'Tipo de Cambio', 'create'=>'Crear Tipo de Cambio'],
			'create' => ['panel'=>'Nuevo Tipo de Cambio:', 'create'=>'Crear Tipo de Cambio'],
			'show'   => ['panel'=>'Vizualizando Tipo de Cambio'],
			'edit'   => ['panel'=>'Editar Tipo de Cambio: ', 'update'=>'Actualizar Tipo de Cambio', 'delete'=>'Eliminar Tipo de Cambio']
		],
		'companies' => [
			'index'  => ['panel'=>'Empresas', 'create'=>'Crear Empresa'],
			'create' => ['panel'=>'Nueva Empresa', 'create'=>'Crear Empresa'],
			'show'   => ['panel'=>'Vizualizando Empresa:'],
			'edit'   => ['panel'=>'Editar Empresa: ', 'update'=>'Actualizar Empresa', 'delete'=>'Eliminar Empresa']
		],
		'payment_conditions' => [
			'index'  => ['panel'=>'Condiciones de Pago', 'create'=>'Crear Condición de Pago'],
			'create' => ['panel'=>'Nueva Condición de Pago', 'create'=>'Crear Condición de Pago'],
			'show'   => ['panel'=>'Vizualizando Condición de Pago:'],
			'edit'   => ['panel'=>'Editar Condición de Pago: ', 'update'=>'Actualizar Condición de Pago', 'delete'=>'Eliminar Condición de Pago']
		],
	// ],
	// 'autorepair' => [
		'checkitem_groups' => [
			'index'  => ['panel'=>'Grupo de Hoja Semaforo', 'create'=>'Crear Grupo'],
			'create' => ['panel'=>'Nuevo Grupo', 'create'=>'Crear Grupo'],
			'show'   => ['panel'=>'Vizualizando Grupo:'],
			'edit'   => ['panel'=>'Editar Grupo: ', 'update'=>'Actualizar Grupo', 'delete'=>'Eliminar Grupo']
		],
		'service_checklists' => [
			'index'  => ['panel'=>'Hojas Semáforo', 'create'=>'Crear Hoja Semáforo'],
			'create' => ['panel'=>'Nueva Hoja Semáforo', 'create'=>'Crear Hoja Semáforo'],
			'show'   => ['panel'=>'Vizualizando Hoja Semáforo:'],
			'edit'   => ['panel'=>'Editar Hoja Semáforo: ', 'update'=>'Actualizar Hoja Semáforo', 'delete'=>'Eliminar Hoja Semáforo']
		],
		'appointments' => [
			'index'  => ['panel'=>'Citas', 'create'=>'Crear Cita'],
			'create' => ['panel'=>'Nueva Cita', 'create'=>'Crear Cita'],
			'show'   => ['panel'=>'Vizualizando Cita:'],
			'edit'   => ['panel'=>'Editar Cita: ', 'update'=>'Actualizar Cita', 'delete'=>'Eliminar Cita']
		],
	// ],
	// 'humanresources' => [
		'employees' => [
			'index'  => ['panel'=>'Empleados', 'create'=>'Crear Empleado'],
			'create' => ['panel'=>'Nuevo Empleado', 'create'=>'Crear Empleado'],
			'show'   => ['panel'=>'Vizualizando Empleado:'],
			'edit'   => ['panel'=>'Editar Empleado: ', 'update'=>'Actualizar Empleado', 'delete'=>'Eliminar Empleado']
		],
		'jobs' => [
			'index'  => ['panel'=>'Cargos', 'create'=>'Crear Cargo'],
			'create' => ['panel'=>'Nuevo Cargo', 'create'=>'Crear Cargo'],
			'show'   => ['panel'=>'Vizualizando Cargo:'],
			'edit'   => ['panel'=>'Editar Cargo: ', 'update'=>'Actualizar Cargo', 'delete'=>'Eliminar Cargo']
		],
	// ],
	// 'logistics' => [
		'brands' => [
			'index'  => ['panel'=>'Marcas', 'create'=>'Crear Marca'],
			'create' => ['panel'=>'Nueva Marca', 'create'=>'Crear Marca'],
			'show'   => ['panel'=>'Vizualizando Marca:'],
			'edit'   => ['panel'=>'Editar Marca: ', 'update'=>'Actualizar Marca', 'delete'=>'Eliminar Marca']
		],
		'purchases' => [
			'index'  => ['panel'=>'Compras', 'create'=>'Crear Compra'],
			'create' => ['panel'=>'Nueva Compra', 'create'=>'Crear Compra'],
			'show'   => ['panel'=>'Vizualizando Compra:'],
			'edit'   => ['panel'=>'Editar Compra: ', 'update'=>'Actualizar Compra', 'delete'=>'Eliminar Compra']
		],
	// ],
	// 'sales' => [
		'orders' => [
			'index'  => ['panel'=>'Ordenes', 'create'=>'Crear Orden'],
			'create' => ['panel'=>'Nuevo Orden', 'create'=>'Crear Orden'],
			'show'   => ['panel'=>'Vizualizando Orden:'],
			'edit'   => ['panel'=>'Editar Orden: ', 'update'=>'Actualizar Orden', 'delete'=>'Eliminar Orden']
		],
	// ],
	// 'guard' => [
		'users' => [
			'index'  => ['panel'=>'Usuarios', 'create'=>'Crear Usuario'],
			'create' => ['panel'=>'Nuevo Usuario', 'create'=>'Crear Usuario'],
			'show'   => ['panel'=>'Vizualizando Usuario:'],
			'edit'   => ['panel'=>'Editar Usuario: ', 'update'=>'Actualizar Usuario', 'delete'=>'Eliminar Usuario']
		],
		'roles' => [
			'index'  => ['panel'=>'Roles', 'create'=>'Crear Rol'],
			'create' => ['panel'=>'Nuevo Rol', 'create'=>'Crear Rol'],
			'show'   => ['panel'=>'Vizualizando Rol:'],
			'edit'   => ['panel'=>'Editar Rol: ', 'update'=>'Actualizar Rol', 'delete'=>'Eliminar Rol']
		],
		'permissions' => [
			'index'  => ['panel'=>'Permisos', 'create'=>'Crear Permiso'],
			'create' => ['panel'=>'Nuevo Permiso', 'create'=>'Crear Permiso'],
			'show'   => ['panel'=>'Vizualizando Permiso:'],
			'edit'   => ['panel'=>'Editar Permiso: ', 'update'=>'Actualizar Permiso', 'delete'=>'Eliminar Permiso']
		],
		'permission_groups' => [
			'index'  => ['panel'=>'Grupos', 'create'=>'Crear Grupo'],
			'create' => ['panel'=>'Nuevo Grupo', 'create'=>'Crear Grupo'],
			'show'   => ['panel'=>'Vizualizando Grupo:'],
			'edit'   => ['panel'=>'Editar Grupo: ', 'update'=>'Actualizar Grupo', 'delete'=>'Eliminar Grupo']
		],
	// ],
	// 'storage' => [
		'units' => [
			'index'  => ['panel'=>'Unidades', 'create'=>'Crear Unidad'],
			'create' => ['panel'=>'Nueva Unidad', 'create'=>'Crear Unidad'],
			'show'   => ['panel'=>'Vizualizando Unidad:'],
			'edit'   => ['panel'=>'Editar Unidad: ', 'update'=>'Actualizar Unidad', 'delete'=>'Eliminar Unidad']
		],
		'warehouses' => [
			'index'  => ['panel'=>'Almacenes', 'create'=>'Crear Almacén'],
			'create' => ['panel'=>'Nuevo Almacén', 'create'=>'Crear Almacén'],
			'show'   => ['panel'=>'Vizualizando Almacén:'],
			'edit'   => ['panel'=>'Editar Almacén: ', 'update'=>'Actualizar Almacén', 'delete'=>'Eliminar Almacén']
		],
		'categories' => [
			'index'  => ['panel'=>'Categorías', 'create'=>'Crear Categoría'],
			'create' => ['panel'=>'Nueva Categoría', 'create'=>'Crear Categoría'],
			'show'   => ['panel'=>'Vizualizando Categoría:'],
			'edit'   => ['panel'=>'Editar Categoría: ', 'update'=>'Actualizar Categoría', 'delete'=>'Eliminar Categoría']
		],
		'sub_categories' => [
			'index'  => ['panel'=>'SubCategorías', 'create'=>'Crear SubCategoría'],
			'create' => ['panel'=>'Nueva SubCategoría', 'create'=>'Crear SubCategoría'],
			'show'   => ['panel'=>'Vizualizando SubCategoría:'],
			'edit'   => ['panel'=>'Editar SubCategoría: ', 'update'=>'Actualizar SubCategoría', 'delete'=>'Eliminar SubCategoría']
		],
		'products' => [
			'index'  => ['panel'=>'Productos', 'create'=>'Crear Producto'],
			'create' => ['panel'=>'Nuevo Producto', 'create'=>'Crear Producto'],
			'show'   => ['panel'=>'Vizualizando Producto:'],
			'edit'   => ['panel'=>'Editar Producto: ', 'update'=>'Actualizar Producto', 'delete'=>'Eliminar Producto']
		],
		'basic_designs' => [
			'index'  => ['panel'=>'Diseños Básicos', 'create'=>'Crear Diseño Básico'],
			'create' => ['panel'=>'Nuevo Diseño Básico', 'create'=>'Crear Diseño Básico'],
			'show'   => ['panel'=>'Vizualizando Diseño Básico:'],
			'edit'   => ['panel'=>'Editar Diseño Básico: ', 'update'=>'Actualizar Diseño Básico', 'delete'=>'Eliminar Diseño Básico']
		],
		'sizes' => [
			'index'  => ['panel'=>'Tallas', 'create'=>'Crear Talla'],
			'create' => ['panel'=>'Nueva Talla', 'create'=>'Crear Talla'],
			'show'   => ['panel'=>'Vizualizando Talla:'],
			'edit'   => ['panel'=>'Editar Talla: ', 'update'=>'Actualizar Talla', 'delete'=>'Eliminar Talla']
		],
		'size_types' => [
			'index'  => ['panel'=>'Tipos de Talla', 'create'=>'Crear Tipo de Talla'],
			'create' => ['panel'=>'Nuevo Tipo de Talla', 'create'=>'Crear Tipo de Talla'],
			'show'   => ['panel'=>'Vizualizando Tipo de Talla:'],
			'edit'   => ['panel'=>'Editar Tipo de Talla: ', 'update'=>'Actualizar Tipo de Talla', 'delete'=>'Eliminar Tipo de Talla']
		],

	// ]

);
