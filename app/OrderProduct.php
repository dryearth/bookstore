<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model {

	//
	protected $table 	= 'orderproduct';
	protected $fillable = ['oid','pid','qty'];
}
