<?php

namespace Cox\Storage\Group;

use Group;

class EloquentGroupRepository implements GroupRepositoryInterface
{
	protected $group;

	public function __construct(Group $group)
	{
		$this->group = $group;
	}

	public function all()
	{
		return $this->group->with('orders')->get();
	}

	public function find($id)
	{
		return $this->group->find($id)->with('orders')->get();
	}

	// STORE Production type
	public function store($input)
	{
		$result = array();
		$validation = \Validator::make($input, \Group::$rules);

		if ($validation->passes())
		{
			
			$result['group'] = $this->group->create($input);
			$result['success'] = true;
			$result['message'] = 'Your Production type was successfully created !!';
			return $result;
		}
		else
		{
			$result['success'] = false;
			$result['message'] = 'There was an error creating this production type!!';
			return $result;	
		}
	}

	// UPDATE Production type
	public function update($id, $input)
	{
		$result = array();
		$validation = \Validator::make($input, \Group::$rules);

		if ($validation->passes())
		{
			$group = $this->group->find($id);
			$group->update($input);
			$result['group'] = $group;
			$result['success'] = true;
			$result['message'] = 'Your Production type was successfully updated !!';
			$result['data'] = array("id" => $group->id, "title" => $group->title, "backgroundColor" => $group->backgroundColor);
			return $result;
		}
		else
		{
			$result['success'] = false;
			$result['message'] = 'There was an error updating this production type!!';
			return $result;
		}
	}

	public function destroy($id)
	{
		if($this->group->find($id)->delete())
		{
			$result['success'] = true;
			$result['message'] = 'Your Production type was successfully deleted!!';
			return $result;
		}
		else
		{
			$result['success'] = false;
			$result['message'] = 'There was an error Deleteing this production type!!';
			return $result;
		}
	}
}