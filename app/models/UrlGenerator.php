<?php 

class UrlGenerator{

	public static function getCurrentUrl(Users $user){

		switch($user->current_step){

			case '':
			case 'c2':
				if($user->c2){
					return route('c2_0');
				}else{
					return route('first_learn', ['page' =>0]);
				}
				break;
			case 'first_learn':
				return route('first_learn', ['page' =>$user->current_page]);
			case 'a221':
				return route('a221');
			case 'tests':
				
				return route('tests', ['page' => $user->current_page]);
			case 'results':
				return route('results');


		}
		
		return '/?bad-current-step';

	}

}