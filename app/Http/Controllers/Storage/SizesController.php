<?php namespace App\Http\Controllers\Storage;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Modules\Storage\SizeRepo;
use App\Modules\Storage\SizeTypeRepo;

class SizesController extends Controller {

	protected $repo;
	protected $sizeTypeRepo;

	public function __construct(SizeRepo $repo, SizeTypeRepo $sizeTypeRepo) {
		$this->repo = $repo;
		$this->sizeTypeRepo = $sizeTypeRepo;
	}

	public function index()
	{
		$models = $this->repo->index('name', \Request::get('name'));
		return view('partials.index',compact('models'));
	}

	public function create()
	{
		$size_types = $this->sizeTypeRepo->getList();
		return view('partials.create', compact('size_types'));
	}

	public function store()
	{
		$this->repo->save(\Request::all());
		return \Redirect::route('sizes.index');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$size_types = $this->sizeTypeRepo->getList();
		$model = $this->repo->findOrFail($id);
		return view('partials.edit', compact('model', 'size_types'));
	}

	public function update($id, FormUnitRequest $request)
	{
		$this->repo->save(\Request::all(), $id);
		return \Redirect::route('sizes.index');
	}

	public function destroy($id)
	{
		$model = $this->repo->destroy($id);
		if (\Request::ajax()) {	return $model; }
		return redirect()->route('sizes.index');
	}
	public function ajaxList($uni_type_id)
	{
		$ajax = $this->repo->ajaxList($uni_type_id);
		return \Response::json($ajax);
	}
}
