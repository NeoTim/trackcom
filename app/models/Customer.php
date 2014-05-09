<?php

class Customer extends Eloquent {

	public function transactions(){
		return $this->hasMany('Transaction');
	} 

	public function orders(){
		return $this->hasMany('Order');
	}
	public function contacts(){
		return $this->hasMany('Contact');
	}
}