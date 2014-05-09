<?php

use Cox\Storage\Group\GroupRepositoryInterface as Group;

class GroupsController extends BaseController {

	protected $group;

	public function __construct(Group $group)
	{
		$this->group = $group;
		//$this->beforeFilter('csrf', array('on' => 'post'));

		// Set up Auth Filters
		// $this->beforeFilter('auth', array('only' => array('change')));
		// $this->beforeFilter('inGroup:Admins', array('only' => array('show', 'index', 'destroy', 'suspend', 'unsuspend', 'ban', 'unban', 'edit', 'update')));
	}

	// INDEX
	public function index()
	{		
		return $this->group->all();
	}

	// CREATE
	public function create()
	{		
	}

	// STORE
	public function store()
	{
		$result = $this->group->store(Input::all());

		if ($result['success'])
		{
			$groups = $this->group->all();
			Session::flash('success', $result['message']);
			Event::fire(UpdateGroupsEventHandler::EVENT, array($result['group']));
			Event::fire(StoreGroupsEventHandler::EVENT, array($groups));
		}
		else
		{
			Session::flash('error', $result['message']);			
		}
	}

	// SHOW($ID)
	public function show($id)
	{
		return $this->group->find($id);
	}

	// EDIT($ID)
	public function edit($id)
	{
		
	}

	// UPDATE ($ID, $INPUT)
	public function update($id)
	{
		
		$result = $this->group->update($id, Input::all());

		if($result['success'])
		{

			//if(Input::get('backgroundColor')){
			$group = $this->group->find($id);
			$group['msg'] = 'status';
			Event::fire(UpdateGroupsEventHandler::EVENT, array($group));
			//}
			Session::flash('success', $result['message']);
			return $result;
		}
		else
		{
			Session::flash('error', $result['message']);
			return $result;		
		}
	}

	// DELETE($ID)
	public function destroy($id)
	{
		$result = $this->group->destroy($id);
		if($result['success'])
		{	
			$groups = $this->group->all();
			Event::fire(UpdateGroupsEventHandler::EVENT, array($groups));
			Session::flash('success', $result['message']);			
			return $groups;
		}
		else
		{
			Session::flash('error', $result['message']);			
		}
	}
}
