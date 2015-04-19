<?php

class InputDataController extends BaseController{

	public function showInputData(){

		$user = Users::getCurrentUser();
		
		if($user){
			$currentUrl = UrlGenerator::getCurrentUrl($user);
			return Redirect::to($currentUrl);
		}

		$this->layout->content = View::make('steps.inputData');

	}

	public function showAlreadyLoggedIn(){

	}

	public function logout(){

		Session::forget('email');
		return Redirect::to(route('inputData_0'));

	}

	public function postInputData(){
		
		extract(Input::only('email', 'born_date'));

		if($email == null || $born_date == null){
			return Redirect::to(route('inputData_0'));
		}
		
		$possibleUser = Users::findByEmail($email);
		
		if($possibleUser){

			if($possibleUser->born_date == $born_date){
				Session::put('email', $email);
				$url = UrlGenerator::getCurrentUrl($possibleUser);
				return Redirect::to($url);

			}else{

				//wrong born date

			}

		}

		$userData = Input::only(['email', 'name', 'born_date']);
		$currentUser = Users::create($userData);
		Session::put('email', $email);
		return Redirect::to(UrlGenerator::getCurrentUrl($currentUser));

	}
}