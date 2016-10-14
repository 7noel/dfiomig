<?php namespace App\Http\Controllers\Sales;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Modules\Sales\ModeloRepo;
use App\Modules\Sales\VersionRepo;

class VersionsController extends Controller {

	protected $repo;
	protected $modeloRepo;

	public function __construct(VersionRepo $repo, ModeloRepo $modeloRepo) {
		$this->repo = $repo;
		$this->modeloRepo = $modeloRepo;
	}

	public function index()
	{
		$models = $this->repo->index('name', \Request::get('name'));
		return view('partials.index',compact('models'));
	}

	public function create()
	{
		$modelos = $this->modeloRepo->getList();
		return view('partials.create', compact('modelos'));
	}

	public function store()
	{
		$this->repo->save(\Request::all());
		return \Redirect::route('sales.versions.index');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$model = $this->repo->findOrFail($id);
		$modelos = $this->modeloRepo->getList();
		return view('partials.edit', compact('model', 'modelos'));
	}

	public function update($id)
	{
		$this->repo->save(\Request::all(), $id);
		return \Redirect::route('sales.versions.index');
	}

	public function destroy($id)
	{
		$model = $this->repo->destroy($id);
		if (\Request::ajax()) {	return $model; }
		return redirect()->route('sales.versions.index');
	}
}