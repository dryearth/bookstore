<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model {

	//
	protected $table 	= 'order';
	protected $fillable = ['mid','ttlprice','receiver_name','address_1','address_2','phone','payment_method','credit_card_number','csv','delivery_date'];

}
