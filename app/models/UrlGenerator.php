<?php 

class UrlGenerator{

	public static function getCurrentUrl(Users $user){

		switch($user->current_step){

			case '':
				if($user->c2){
					return route('c2_0');
				}else{
					return route('learn_1', ['page' =>0]);
				}

		}
		
		return '/?bad-current-step';

	}

}