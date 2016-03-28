<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Member extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'member';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'password', 'secretquestion','secretanswer'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	//protected $hidden = ['password', 'deleted_at','created_at','updated_at'];

	public function login(){
		$this->status = 'login';
		$user = $this->toArray();
		$user['isAdmin'] = false;
		if ($user['username']=='admin'){
			$user['isAdmin'] = true;
		}
		Session::put('user',$user);
		$this->save();
	}

	public function logout(){
		$this->status = 'logout';
		Session::pull('user');
		$this->save();
	}
}
