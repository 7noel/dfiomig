<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index');
// Auth::routes();
Route::group(['middleware' => ['web']], function() {

// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    // Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    // Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>['auth']], function(){
	//Obtener provincas y distritos x ajax
	Route::get('listarProvincias/{departamento}', ['as' => 'ajaxprovincias', 'uses' => 'Admin\UbigeosController@ajaxProvincias']);
	Route::get('listarDistritos/{departamento}/{provincia}', ['as' => 'ajaxdistritos','uses' => 'Admin\UbigeosController@ajaxDistritos']);
	Route::get('getDataUbigeo/{code}', ['as' => 'ajaxGetDataUbigeo','uses' => 'Admin\UbigeosController@ajaxGetDataUbigeo']);
	Route::get('listUnits/{unit_type_id}', ['as' => 'ajaxUnits','uses' => 'Storage\UnitsController@ajaxList']);
	Route::get('listSubCategories/{category_id}', ['as' => 'ajaxSubCategories','uses' => 'Storage\SubCategoriesController@ajaxList']);
	Route::get('listWarehouses', ['as' => 'ajaxWarehouses','uses' => 'Storage\WarehousesController@ajaxList']);
	//Route::get('finances/companies/autocomplete', ['as' => 'companiesAutocomplete','uses' => 'Finances\CompaniesController@ajaxAutocomplete']);
	Route::get('storage/products/autocomplete/{warehouse_id}', ['as' => 'productsAutocomplete','uses' => 'Storage\ProductsController@ajaxAutocomplete']);
	Route::get('storage/products/ajaxGetData/{warehouse_id}/{product_id}', ['as' => 'ajaxGetData','uses' => 'Storage\ProductsController@ajaxGetData']);
	Route::get('guard/users/autocomplete', ['as' => 'usersAutocomplete','uses' => 'Security\UsersController@ajaxAutocomplete']);
	Route::get('api/companies/autocompleteAjax', ['as' => 'companiesAutocomplete','uses' => 'Finances\CompaniesController@ajaxAutocomplete']);
	Route::get('api/sellers/autocompleteAjax', ['as' => 'sellersAutocomplete','uses' => 'HumanResources\EmployeesController@ajaxAutocompleteSellers']);
	Route::get('api/designs/autocompleteAjax', ['as' => 'designsAutocomplete','uses' => 'Storage\BasicDesignsController@ajaxAutocomplete']);
});

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'permissions'], 'namespace'=>'Admin'], function(){
	Route::resource('id_types','IdTypesController');
	Route::resource('unit_types','UnitTypesController');
	Route::resource('currencies','CurrenciesController');
	Route::resource('document_types','DocumentTypesController');
	Route::resource('document_controls','DocumentControlsController');
});
Route::group(['prefix'=>'finances', 'middleware'=>['auth', 'permissions'], 'namespace'=>'Finances'], function(){
	Route::resource('exchanges','ExchangesController');
	Route::resource('companies','CompaniesController');
	Route::resource('payment_conditions','PaymentConditionsController');
});
Route::group(['prefix'=>'guard', 'middleware'=>['auth', 'permissions'], 'namespace'=>'Security'], function(){
	Route::get('change_password', ['as' => 'change_password', 'uses' => 'UsersController@changePassword']);
	Route::post('update_password', ['as'=>'update_password', 'uses'=>'UsersController@updatePassword']);
	Route::resource('users','UsersController');
	Route::resource('roles','RolesController');
	Route::resource('permissions','PermissionsController');
	Route::resource('permission_groups','PermissionGroupsController');
});

Route::group(['prefix'=>'storage', 'middleware'=>['auth', 'permissions'], 'namespace'=>'Storage'], function(){
	Route::resource('units','UnitsController');
	Route::resource('warehouses','WarehousesController');
	Route::resource('categories','CategoriesController');
	Route::resource('sub_categories','SubCategoriesController');
	Route::resource('products','ProductsController');
	Route::resource('basic_designs','BasicDesignsController');
	Route::resource('size_types','SizeTypesController');
	Route::resource('sizes','SizesController');
	Route::get('products_by_design/{basic_design_id}', ['as' => 'products_by_design', 'uses' => 'BasicDesignsController@getProducts']);
	Route::post('products_generate_by_design', ['as' => 'products_generate_by_design', 'uses' => 'BasicDesignsController@generateProducts']);
});

Route::group(['prefix'=>'humanresources', 'middleware'=>['auth', 'permissions'], 'namespace'=>'HumanResources'], function(){
	Route::resource('employees','EmployeesController');
	Route::resource('jobs','JobsController');
});

Route::group(['prefix'=>'sales', 'middleware'=>['auth', 'permissions'], 'namespace'=>'Sales'], function(){
	Route::resource('orders','OrdersController');
});