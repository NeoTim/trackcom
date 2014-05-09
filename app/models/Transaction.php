<?php


class Transaction extends Eloquent {

	public function Customer(){
		return $this->belongsTo('Customer');
	}

}
