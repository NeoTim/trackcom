<?php

class Group extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function orders()
	{
		return $this->hasMany('Order');
	}
}
