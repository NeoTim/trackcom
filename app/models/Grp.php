<?php

class Grp extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	//protected $table = 'grps';


	protected $guarded = array();

	public static $rules = array(
	
	);
	public function truck()
	{
		return $this->belongsTo('Truck');
	}

	public function orders()
	{
		return $this->hasMany('Order');
	}

}
