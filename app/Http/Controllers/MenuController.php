<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Modules\Security\UserRepo;

class MenuController extends Controller
{
    protected $repo;

    public function __construct(UserRepo $repo) {
        $this->repo = $repo;
    }
    public function links()
    {
        //$arrayLinks = [];
        $arrayLinks = $this->arrayLinks();

        if (\Auth::user()->is_superuser == true) {
            return $arrayLinks;
        }

        $permissions = $this->repo->allPermissions();

        foreach ($arrayLinks as $k => $module) {
            foreach ($module as $key => $link) {
                if (!isset($link['route'])) {
                    unset($arrayLinks[$k][$key]);
                } else if (!in_array($link['route'], $permissions)) {
                    unset($arrayLinks[$k][$key]);
                }
            }
            if (count($arrayLinks[$k]) == 0) {
                unset($arrayLinks[$k]);
            }
        }

        return $arrayLinks;

    }
    public function arrayLinks()
    {
        $links = [
            'Seguridad'=>[
                ['name' => 'Usuarios', 'route' => 'users.index' ],
                ['name' => 'Roles', 'route' => 'roles.index', 'div' => '1' ],
                ['name' => 'Grupos', 'route' => 'permission_groups.index' ],
                ['name' => 'Permisos', 'route' => 'permissions.index' ],
            ],
            'Almacén'=>[
                ['name' => 'Almacenes', 'route' => 'warehouses.index' ],
                ['name' => 'Productos', 'route' => 'warehouses.index' ],
                ['name' => 'Movimientos', 'route' => 'warehouses.index' ],
                ['name' => 'Categorías', 'route' => 'categories.index', 'div' => '1' ],
                ['name' => 'Sub Categorías', 'route' => 'sub_categories.index' ],
                ['name' => 'Tipos de Unidad', 'route' => 'unit_types.index' ],
                ['name' => 'Unidades', 'route' => 'units.index' ],
            ],
            'Recursos Humanos'=>[
                ['name' => 'Empleados', 'route' => 'employees.index' ],
                ['name' => 'Cargos', 'route' => 'jobs.index' ],
                ['name' => 'Planilla', 'url' => '#' ],
                ['name' => 'Documentos', 'route' => 'id_types.index' ],
            ],
            /*'Logística'=>[
                ['name' => 'Ordenes de Compra', 'url' => '#' ],
                ['name' => 'Compras', 'route' => 'purchases.index' ],
                ['name' => 'Marca', 'route' => 'brands.index', 'div' => '1' ],
            ],*/
        ];
        return $links;
    }

}