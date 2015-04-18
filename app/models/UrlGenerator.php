<?php 

class UrlGenerator{

	public static function getCurrentUrl(Users $user){

		switch($user->current_step){

			case '':
			case 'c2':
				if($user->c2){
					return route('c2_0');
				}else{
					return route('learn_1', ['page' =>0]);
				}
				break;
			case 'learn_1':
				return route('learn_1', ['page' =>$user->current_step]);
			case 'a221':
				return route('a221');

		}
		
		return '/?bad-current-step';

	}

}