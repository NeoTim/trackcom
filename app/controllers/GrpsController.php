<?php

use Cox\Storage\Grp\GrpRepositoryInterface as Grp;

class GrpsController extends BaseController {

	protected $grp;

	public function __construct(Grp $grp)
	{
		$this->grp = $grp;
		//$this->beforeFilter('csrf', array('on' => 'post'));

		// Set up Auth Filters
		$this->beforeFilter('auth', array('only' => array('change')));
		$this->beforeFilter('inGroup:Admins', array('only' => array('show', 'index', 'destroy', 'suspend', 'unsuspend', 'ban', 'unban', 'edit', 'update')));
	}

	// INDEX
	public function index()
	{
		$grps = $this->grp->all();

		//return View::make('grps.index', compact('grps'));
		return $grps->toArray();
	}

	// CREATE
	public function create()
	{
		return View::make('grps.create');
	}

	// STORE
	public function store()
	{
		$result = $this->grp->store(Input::all());

		if ($result['success'])
		{
			
			Session::flash('success', $result['message']);
			return Redirect::route('grps.index');
		}
		else
		{
			Session::flash('error', $result['message']);
			return Redirect::route('grps.create')
				->withInput();
		}
	}

	// SHOW($ID)
	public function show($id)
	{
		$grp = $this->grp->find($id);
		return View::make('grps.show', compact('grp'));
	}

	// EDIT($ID)
	public function edit($id)
	{
		$grp = $this->grp->find($id);

		if (is_null($grp))
		{
			return Redirect::route('grps.index');
		}

		return View::make('grps.edit', compact('grp'));
	}

	// UPDATE ($ID, $INPUT)
	public function update($id)
	{
		$input = Input::all();
		$result = $this->grp->update($id, $input);

		if($result['success'])
		{
			Session::flash('success', $result['message']);
			return $result;
		}
		else
		{
			Session::flash('error', $result['message']);
			return $result;
			//return Redirect::route('grps.edit', $id)
				//->withInput();
		}
	}

	// DELETE($ID)
	public function destroy($id)
	{
		$result = $this->grp->destroy($id);

		if($result['success'])
		{
			Session::flash('success', $result['message']);
			return Redirect::route('grps.index');
		}
		else
		{
			Session::flash('error', $result['message']);
			return Redirect::route('grps.show', $id);
		}
	}
}
