<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Security\User;
use App\Modules\Security\Role;
use App\Modules\Security\Permission;
use App\Modules\Security\PermissionGroup;
use App\Modules\Base\IdType;
use App\Modules\Base\UnitType;
use App\Modules\Storage\Unit;
use App\Modules\Storage\SizeType;
use App\Modules\Storage\Size;
use App\Modules\Base\Currency;
use App\Modules\Finances\Exchange;
use App\Modules\Storage\Category;
use App\Modules\Storage\SubCategory;
use App\Modules\Storage\Warehouse;
use App\Modules\Logistics\Brand;
use App\Modules\Base\DocumentType;
use App\Modules\Finances\PaymentCondition;
use App\Modules\Sales\Modelo;
use App\Modules\HumanResources\Job;

use Faker\Factory as Faker;

class AdminTableSeeder extends Seeder {

    public function run()
    {
        User::create([
        	'name' => 'Noel',
        	'email' => 'noel.logan@gmail.com',
        	'password' => '123',
            'is_superuser' => true
        ]);
        User::create([
            'name' => 'Carmen',
            'email' => 'calba@dfiomig.com',
            'password' => '123',
            'is_superuser' => true
        ]);
        Role::create(['name' => 'ADMINISTRADOR DE SISTEMA']);
        /*Role::create(['name' => 'JEFE DE ALMACEN']);
        Role::create(['name' => 'ASISTENTE DE ALMACEN']);
        Role::create(['name' => 'JEFE DE COMPRAS']);
        Role::create(['name' => 'ASISTENTE DE ADV']);
        Role::create(['name' => 'VENDEDOR']);
        Role::create(['name' => 'JEFE DE VENTAS']);
        Role::create(['name' => 'RECEPCIONISTA']);
        Role::create(['name' => 'GERENTE GENERAL']);

        Job::create(['name' => 'ANALISTA DE SISTEMAS']);
        Job::create(['name' => 'ASESOR DE VENTAS']);
        Job::create(['name' => 'ADMINISTRADOR DE VENTAS']);
        Job::create(['name' => 'TECNICO']);
        Job::create(['name' => 'JEFE DE TALLER']);
        Job::create(['name' => 'ASESOR DE SERVICIO']);
        Job::create(['name' => 'COORDINADOR DE POSTVENTA']);
        Job::create(['name' => 'JEFE DE POSTVENTA']);*/

        PermissionGroup::create(['name' => 'SISTEMAS']);
        PermissionGroup::create(['name' => 'ALMACEN']);
        PermissionGroup::create(['name' => 'LOGISTICA']);
        PermissionGroup::create(['name' => 'VENTAS']);
        PermissionGroup::create(['name' => 'PRODUCCION']);
        PermissionGroup::create(['name' => 'FINANZAS']);
        PermissionGroup::create(['name' => 'CONTABILIDAD']);
        PermissionGroup::create(['name' => 'ADMINISTRACION']);

        Permission::create(['name' => 'Usuarios Listar', 'action' => 'users.index', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Usuarios Ver', 'action' => 'users.show', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Usuarios Crear', 'action' => 'users.create', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Usuarios Editar', 'action' => 'users.edit', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Usuarios Eliminar', 'action' => 'users.destroy', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Roles Listar', 'action' => 'roles.index', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Roles Ver', 'action' => 'roles.show', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Roles Crear', 'action' => 'roles.create', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Roles Editar', 'action' => 'roles.edit', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Roles Eliminar', 'action' => 'roles.destroy', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Grupos Listar', 'action' => 'permission_groups.index', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Grupos Ver', 'action' => 'permission_groups.show', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Grupos Crear', 'action' => 'permission_groups.create', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Grupos Editar', 'action' => 'permission_groups.edit', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Grupos Eliminar', 'action' => 'permission_groups.destroy', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Permisos Listar', 'action' => 'permissions.index', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Permisos Ver', 'action' => 'permissions.show', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Permisos Crear', 'action' => 'permissions.create', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Permisos Editar', 'action' => 'permissions.edit', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Permisos Eliminar', 'action' => 'permissions.destroy', 'permission_group_id' => '1']);
        Permission::create(['name' => 'Modelos Listar', 'action' => 'modelos.index', 'permission_group_id' => '4']);
        Permission::create(['name' => 'Modelos Ver', 'action' => 'modelos.show', 'permission_group_id' => '4']);
        Permission::create(['name' => 'Modelos Crear', 'action' => 'modelos.create', 'permission_group_id' => '4']);
        Permission::create(['name' => 'Modelos Editar', 'action' => 'modelos.edit', 'permission_group_id' => '4']);
        Permission::create(['name' => 'Modelos Eliminar', 'action' => 'modelos.destroy', 'permission_group_id' => '4']);

        IdType::create(['name' => 'REGISTRO UNICO DE CONTRIBUYENTE', 'symbol' => 'RUC']);
        IdType::create(['name' => 'DOCUMENTO NACIONAL DE IDENTIDAD', 'symbol' => 'DNI']);
        IdType::create(['name' => 'CARNÉ DE EXTRANJERÍA', 'symbol' => 'CEX']);
        IdType::create(['name' => 'PASAPORTE', 'symbol' => 'PAS']);

        UnitType::create(['name' => 'LONGITUD']);
        UnitType::create(['name' => 'VOLUMEN']);
        UnitType::create(['name' => 'MASA']);
        UnitType::create(['name' => 'UNIDAD']);

        Unit::create(['name' => 'UNIDAD', 'symbol' => 'und', 'unit_type_id' => 4, 'value' => 1]);
        Unit::create(['name' => 'CENTIMETRO', 'symbol' => 'cm', 'unit_type_id' => 1, 'value' => 1]);
        Unit::create(['name' => 'METRO', 'symbol' => 'mt', 'unit_type_id' => 1, 'value' => 100]);
        Unit::create(['name' => 'KILOMETRO', 'symbol' => 'km', 'unit_type_id' => 1, 'value' => 100000]);
        Unit::create(['name' => 'PULGADA', 'symbol' => 'pulg', 'unit_type_id' => 1, 'value' => 2.54]);
        Unit::create(['name' => 'PIE', 'symbol' => 'pie', 'unit_type_id' => 1, 'value' => 30.48]);
        Unit::create(['name' => 'YARDA', 'symbol' => 'yar', 'unit_type_id' => 1, 'value' => 91.44]);
        Unit::create(['name' => 'MILLA', 'symbol' => 'milla', 'unit_type_id' => 1, 'value' => 160934]);
        Unit::create(['name' => 'MILILITRO', 'symbol' => 'ml', 'unit_type_id' => 2, 'value' => 1]);
        Unit::create(['name' => 'LITRO', 'symbol' => 'lt', 'unit_type_id' => 2, 'value' => 1000]);
        Unit::create(['name' => 'METRO CUBICO', 'symbol' => 'm3', 'unit_type_id' => 2, 'value' => 1000000]);
        Unit::create(['name' => 'PULGADA CUBICA', 'symbol' => 'pulg3', 'unit_type_id' => 2, 'value' => 16.3871]);
        Unit::create(['name' => 'PIE CUBICO', 'symbol' => 'pie3', 'unit_type_id' => 2, 'value' => 28317]);
        Unit::create(['name' => 'GALON', 'symbol' => 'gal', 'unit_type_id' => 2, 'value' => 3785.4]);
        Unit::create(['name' => 'GRAMO', 'symbol' => 'gr', 'unit_type_id' => 3, 'value' => 1]);
        Unit::create(['name' => 'KILOGRAMO', 'symbol' => 'kg', 'unit_type_id' => 3, 'value' => 1000]);
        Unit::create(['name' => 'TONELADA', 'symbol' => 'ton', 'unit_type_id' => 3, 'value' => 1000000]);
        Unit::create(['name' => 'ONZA', 'symbol' => 'oz', 'unit_type_id' => 3, 'value' => 28.349]);
        Unit::create(['name' => 'LIBRA', 'symbol' => 'lb', 'unit_type_id' => 3, 'value' => 453.59]);

        Currency::create(['name' => 'NUEVOS SOLES', 'symbol' => 'S/.']);
        Currency::create(['name' => 'DOLARES AMERICANOS', 'symbol' => 'US$']);

        Exchange::create(['date' => date('Y-m-d'), 'currency_id' => 1, 'sales' => 3, 'purchase' => 3]);

        Category::create(['name' => 'PRODUCTO FINAL']);
        Category::create(['name' => 'MATERIA PRIMA']);
        Category::create(['name' => 'INSUMOS']);
        Category::create(['name' => 'HERRAMIENTAS']);

        SubCategory::create(['name' => 'PIJAMA', 'category_id' => 1]);
        SubCategory::create(['name' => 'BATA', 'category_id' => 1]);
        SubCategory::create(['name' => 'BABY DOLL´S', 'category_id' => 1]);
        SubCategory::create(['name' => 'BEBECRECE', 'category_id' => 1]);
        SubCategory::create(['name' => 'CAMISÓN', 'category_id' => 1]);
        SubCategory::create(['name' => 'CONJUNTO', 'category_id' => 1]);
        SubCategory::create(['name' => 'ENTERIZO', 'category_id' => 1]);
        SubCategory::create(['name' => 'JGO. MATERNO', 'category_id' => 1]);
        SubCategory::create(['name' => 'JGO. BATA CAMISÓN', 'category_id' => 1]);
        SubCategory::create(['name' => 'VESTIDO', 'category_id' => 1]);

        SizeType::create(['name' => 'BEBE']);
        SizeType::create(['name' => 'NIÑO']);
        SizeType::create(['name' => 'ADULTO']);
        Size::create(['name' => '6 MESES', 'symbol' => '6', 'size_type_id' => 1]);
        Size::create(['name' => '12 MESES', 'symbol' => '12', 'size_type_id' => 1]);
        Size::create(['name' => '18 MESES', 'symbol' => '18', 'size_type_id' => 1]);
        Size::create(['name' => '24 MESES', 'symbol' => '24', 'size_type_id' => 1]);
        Size::create(['name' => '36 MESES', 'symbol' => '36', 'size_type_id' => 1]);
        Size::create(['name' => '2', 'symbol' => '2', 'size_type_id' => 2]);
        Size::create(['name' => '4', 'symbol' => '4', 'size_type_id' => 2]);
        Size::create(['name' => '6', 'symbol' => '6', 'size_type_id' => 2]);
        Size::create(['name' => '8', 'symbol' => '8', 'size_type_id' => 2]);
        Size::create(['name' => '10', 'symbol' => '10', 'size_type_id' => 2]);
        Size::create(['name' => '12', 'symbol' => '12', 'size_type_id' => 2]);
        Size::create(['name' => '14', 'symbol' => '14', 'size_type_id' => 2]);
        Size::create(['name' => '16', 'symbol' => '16', 'size_type_id' => 2]);
        Size::create(['name' => 'SMALL', 'symbol' => 'S', 'size_type_id' => 3]);
        Size::create(['name' => 'MEDIUM', 'symbol' => 'M', 'size_type_id' => 3]);
        Size::create(['name' => 'LARGE', 'symbol' => 'L', 'size_type_id' => 3]);
        Size::create(['name' => 'EXTRA LARGE', 'symbol' => 'XL', 'size_type_id' => 3]);


        Warehouse::create(['name' => 'ALMACEN LIMA', 'ubigeo_id' => 1309, 'address' => 'DIRECCION']);
        Warehouse::create(['name' => 'ALMACEN TRUJILLO', 'ubigeo_id' => 1309, 'address' => 'DIRECCION']);
        Warehouse::create(['name' => 'ALMACEN CHICLAYO', 'ubigeo_id' => 1309, 'address' => 'DIRECCION']);

        // Brand::create(['name' => 'NINGUNO', 'is_car' => '0']);
        // Brand::create(['name' => 'HONDA', 'is_car' => '1']);
        // Brand::create(['name' => '3M', 'is_car' => '0']);
        // Brand::create(['name' => 'ABRO', 'is_car' => '0']);
        // Brand::create(['name' => 'ALTERNATIVA', 'is_car' => '0']);//5
        // Brand::create(['name' => 'BASF', 'is_car' => '0']);
        // Brand::create(['name' => 'BOSCH', 'is_car' => '0']);
        // Brand::create(['name' => 'CAPSA', 'is_car' => '0']);
        // Brand::create(['name' => 'CHEVRON', 'is_car' => '0']);
        // Brand::create(['name' => 'CONCEPT', 'is_car' => '0']);//10
        // Brand::create(['name' => 'DURACELL', 'is_car' => '0']);
        // Brand::create(['name' => 'ETNA', 'is_car' => '0']);
        // Brand::create(['name' => 'FACTA', 'is_car' => '0']);
        // Brand::create(['name' => 'FAST', 'is_car' => '0']);
        // Brand::create(['name' => 'GARMIN', 'is_car' => '0']);//15
        // Brand::create(['name' => 'GLASURIT', 'is_car' => '0']);
        // Brand::create(['name' => 'GORILLA', 'is_car' => '0']);
        // Brand::create(['name' => 'HELLA', 'is_car' => '0']);
        // Brand::create(['name' => 'LG', 'is_car' => '0']);
        // Brand::create(['name' => 'MAC', 'is_car' => '0']);//20
        // Brand::create(['name' => 'MICHELIN', 'is_car' => '0']);
        // Brand::create(['name' => 'MITSUBISHI', 'is_car' => '0']);
        // Brand::create(['name' => 'NISSAN', 'is_car' => '0']);
        // Brand::create(['name' => 'PRESTIGE', 'is_car' => '0']);
        // Brand::create(['name' => 'PROTEMAX', 'is_car' => '0']);//25
        // Brand::create(['name' => 'SHELL', 'is_car' => '0']);
        // Brand::create(['name' => 'TOYOTA', 'is_car' => '0']);
        // Brand::create(['name' => 'WURTH', 'is_car' => '0']);
        // Brand::create(['name' => 'YOKOHAMA', 'is_car' => '0']);

        DocumentType::create(['name' => 'FACTURA', 'to_sales' => '1', 'to_purchases' => '1']);
        DocumentType::create(['name' => 'BOLETA', 'to_sales' => '1', 'to_purchases' => '1']);
        DocumentType::create(['name' => 'NOTA DE CREDITO', 'to_sales' => '1', 'to_purchases' => '1']);
        DocumentType::create(['name' => 'NOTA DE DEBITO', 'to_sales' => '1', 'to_purchases' => '1']);

        PaymentCondition::create(['name' => 'CONTADO', 'to_sales' => '1', 'to_purchases' => '1']);
        PaymentCondition::create(['name' => 'CRÉDITO', 'to_sales' => '1', 'to_purchases' => '1']);

        // Modelo::create(['name' => 'FIT', 'brand_id' => '2', 'image' => 'logo_fit.png']);//1
        // Modelo::create(['name' => 'CIVIC', 'brand_id' => '2', 'image' => 'logo_civic.png']);//2
        // Modelo::create(['name' => 'CIVIC COUPE', 'brand_id' => '2', 'image' => 'logo_civic.png']);//3
        // Modelo::create(['name' => 'ACCORD', 'brand_id' => '2', 'image' => 'logo_accord.png']);//4
        // Modelo::create(['name' => 'ACCORD COUPE', 'brand_id' => '2', 'image' => 'logo_accord.png']);//5
        // Modelo::create(['name' => 'CR-V', 'brand_id' => '2', 'image' => 'logo_crv.png']);//6
        // Modelo::create(['name' => 'PILOT', 'brand_id' => '2', 'image' => 'logo_pilot.png']);//7
        // Modelo::create(['name' => 'ODYSSEY', 'brand_id' => '2', 'image' => 'logo_odyssey.png']);//8
        
    }
}