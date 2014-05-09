<?php

class Batch extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function entries()
	{
		return $this->hasMany('Entry');
	}
}
