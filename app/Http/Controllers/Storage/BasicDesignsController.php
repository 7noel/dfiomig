<?php namespace App\Http\Controllers\Storage;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Modules\Storage\UnitRepo;
use App\Modules\Storage\SubCategoryRepo;
use App\Modules\Storage\ProductRepo;
use App\Modules\Storage\BasicDesignRepo;
use App\Modules\Storage\SizeRepo;
use App\Modules\Storage\ColorRepo;
use App\Modules\Storage\MaterialRepo;
use App\Modules\Base\CurrencyRepo;

use App\Modules\Storage\Stock;

class BasicDesignsController extends Controller {

	protected $repo;
	protected $productRepo;
	protected $subCategoryRepo;
	protected $unitRepo;
	protected $currencyRepo;
	protected $sizeRepo;
	protected $colorRepo;
	protected $materialRepo;

	public function __construct(BasicDesignRepo $repo, SubCategoryRepo $subCategoryRepo, ProductRepo $productRepo, UnitRepo $unitRepo, CurrencyRepo $currencyRepo, SizeRepo $sizeRepo, ColorRepo $colorRepo, MaterialRepo $materialRepo) {
		$this->repo = $repo;
		$this->productRepo = $productRepo;
		$this->subCategoryRepo = $subCategoryRepo;
		$this->unitRepo = $unitRepo;
		$this->currencyRepo = $currencyRepo;
		$this->sizeRepo = $sizeRepo;
		$this->colorRepo = $colorRepo;
		$this->materialRepo = $materialRepo;
	}

	public function index()
	{
		$models = $this->repo->index('name', \Request::get('name'));
		return view('partials.index',compact('models'));
	}

	public function create()
	{
		$sub_categories = $this->subCategoryRepo->getListGroup('category');
		$units = $this->unitRepo->getListGroup('unit_type');
		$currencies = $this->currencyRepo->getList('symbol');
		
		return view('partials.create', compact('sub_categories', 'units', 'currencies'));
	}

	public function store()
	{
		$this->repo->save(\Request::all());
		return \Redirect::route('basic_designs.index');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$model = $this->repo->findOrFail($id);
		$sub_categories = $this->subCategoryRepo->getListGroup('category');
		$currencies = $this->currencyRepo->getList('symbol');
		return view('partials.edit', compact('model', 'sub_categories', 'currencies'));
	}

	public function update($id)
	{
		$this->repo->save(\Request::all(), $id);
		return \Redirect::route('basic_designs.index');
	}

	public function destroy($id)
	{
		$model = $this->repo->destroy($id);
		if (\Request::ajax()) {	return $model; }
		return redirect()->route('basic_designs.index');
	}

	public function ajaxAutocomplete()
	{
		$term = \Input::get('term');
		$models = $this->repo->autocomplete($term);
		$result=[];
		foreach ($models as $model) {
			$result[]=[
				'value' => $model->name,
				'id' => $model,
				'label' => $model->intern_code.'  '.$model->name
			];
		}
		return \Response::json($result);
	}
	public function ajaxGetData($warehouse_id,$product_id)
	{
		$term = \Input::get('term');
		$result = $this->repo->ajaxGetData($warehouse_id,$product_id);
		return \Response::json($result);
	}
	public function getProducts($basic_design_id)
	{
		$model = $this->repo->findOrFail($basic_design_id);
		$sizes = $this->sizeRepo->getListGroup('size_type', 'symbol');
		$colors = $this->colorRepo->getList();
		$materials = $this->materialRepo->getList();
		return view('storage.basic_designs.products', compact('model', 'sizes', 'colors', 'materials'));
	}
	public function generateProducts()
	{
		$rq = \Request::all();
		$this->productRepo->generateProducts($rq);
		return \Redirect::route('basic_designs.index');
	}
}
