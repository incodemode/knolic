<?php

class InputDataController extends BaseController{

	public function showInputData(){

		$this->layout->content = View::make('steps.inputData');

	}

	public function postInputData(){
		
		extract(Input::only('email', 'born_date'));

		if($email == null || $born_date == null){
			return Redirect::to(route('inputData_0'));
		}
		
		$possibleUser = Users::findByEmail($email);
		
		if($possibleUser){

			if($possibleUser->born_date == $born_date){
				Log::info($possibleUser);
				$url = UrlGenerator::getCurrentUrl($possibleUser);
				return Redirect::to($url);

			}else{

				//wrong born date

			}

		}

		$userData = Input::only(['email', 'name', 'born_date']);
		Users::create($userData);
		Session::put('email', $email);
		$this->layout->content = View::make('steps.inputData');

	}
}