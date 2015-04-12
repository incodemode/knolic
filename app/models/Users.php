<?php 

class Users extends Eloquent{

	protected $table = 'users';
	protected $fillable = ['email', 'name', 'born_date', 'current_step', 'current_page', 'a1', 'a21', 'a22', 'r3', 'c2'];


	public static function create(array $attributes){
		
		$newUser = parent::create($attributes);
		$newUser->a1 = rand(0,1);
		$newUser->a21 = rand(0,1);
		$newUser->a22 = rand(0,1);
		$newUser->r3 = rand(0,1);
		$newUser->c2 = rand(0,1);
		//temporal
		
		$newUser->a1 = 1;
		$newUser->a21 = 1;
		$newUser->a22 = 1;
		$newUser->r3 = 1;
		$newUser->c2 = 1;

		$newUser->save();
		return $newUser;
		
	}

	public static function getCurrentUser(){

		$email = Session::get('email');
		if($email == null){
			return null;
		}

		return Users::findByEmail($email);

	}

	public static function findByEmail($email){

		return Users::where('email', '=', $email)->first();

	}
}