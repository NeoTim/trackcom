<?php

namespace Cox\Storage\Grp;

use Grp;

class EloquentGrpRepository implements GrpRepositoryInterface
{
	protected $grp;

	public function __construct(Grp $grp)
	{
		$this->grp = $grp;
	}

	public function all()
	{
		return $this->grp->with('orders')->get();
	}

	public function find($id)
	{
		return $this->grp->find($id);
	}

	// STORE Production type
	public function store($input)
	{
		$result = array();
		$validation = \Validator::make($input, \Grp::$rules);

		if ($validation->passes())
		{
			$this->grp->create($input);
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
		$validation = \Validator::make($input, \Grp::$rules);

		if ($validation->passes())
		{
			$grp = $this->grp->find($id);
			$grp->update($input);
			$result['success'] = true;
			$result['message'] = 'Your Production type was successfully updated !!';
			$result['data'] = array("id" => $grp->id, "title" => $grp->title, "backgroundColor" => $grp->backgroundColor);
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
		if($this->grp->find($id)->delete())
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