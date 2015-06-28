<?php

use Greggilbert\Recaptcha\CheckRecaptchaV2;

class InputDataController extends BaseController{

	public $recaptcha;
	public function __costruct(CheckRecaptchaV2 $recaptcha){

		$this->recaptcha = $recaptcha;
	}

	public function showInputData(){

		$user = Users::getCurrentUser();
		
		if($user){
			return Redirect::to(route('already_logged_in'));	
		}
		
		$email = Input::old('email', null);
		$name = Input::old('name', null);
		$born_date = Input::old('born_date', null);
		$born_date_visible = Input::old('born_date_visible', null);
		$wrongDate = Input::old('wrongDate', null);
		$wrongUser = Input::old('wrongUser', null);
		$wrongCaptcha = Input::old('wrongCaptcha', null);
		$startSession = Input::old('formName', null) == 'startSession';
		$oldInput = compact('email', 'name', 'born_date', 'born_date_visible', 'wrongDate', 'wrongUser', 'wrongCaptcha', 'startSession');
		
		$this->layout->content = View::make('steps.input_data.input_data', $oldInput);

	}

	public function showAlreadyLoggedIn(){

		$currentUser = Users::getCurrentUser();
		if(!$currentUser){
			return Redirect::to(route('inputData_0'));
		}
		$currentUrl = UrlGenerator::getCurrentUrl($currentUser);
		$viewParameters = compact('currentUrl');

		$this->layout->content = View::make('steps.input_data.already_logged_in', $viewParameters);

	}

	public function logout(){

		Session::forget('email');
		return Redirect::to(route('inputData_0'));

	}

	public function postInputData(){
		
		$inputBrought = Input::only('email', 'born_date', 'name');
		extract($inputBrought);

		$captcha = app('Greggilbert\Recaptcha\RecaptchaInterface');
        $challenge = app('Input')->get($captcha->getResponseKey());

        $value = Input::get('recaptcha');
		$recaptchaCheck = $captcha->check($challenge, $challenge);
		if(!$recaptchaCheck){
			$oldData = Input::only('born_date', 'born_date_visible', 'email', 'name', 'formName');
			$oldData['wrongCaptcha'] = true;

			return Redirect::to(route('inputData_0'))->withInput($oldData);
		}

		$formName = Input::get('formName');

		if($email == null || $born_date == null){
			$oldData = Input::only('born_date', 'born_date_visible', 'email', 'name', 'formName');
			$oldData['wrongUser'] = true;

			return Redirect::to(route('inputData_0'))->withInput($oldData);
		}
		
					
		
		$possibleUser = Users::findByEmail($email);

		if($possibleUser){
			Log::info('possibleUser');
			if($possibleUser->born_date == $born_date){
				Log::info('date match');

				Session::put('email', $email);
				$url = UrlGenerator::getCurrentUrl($possibleUser);
				return Redirect::to($url);

			}else{
				Log::info('date dont match');
				$oldData = Input::only('born_date', 'born_date_visible', 'email', 'name', 'formName');
				Log::info($oldData);
				$oldData['wrongDate'] = true;
				return Redirect::to(route('inputData_0'))->withInput($oldData);

			}
		}


		if($name == null){
			$oldData = Input::only('born_date', 'born_date_visible', 'email', 'name');
			$oldData['wrongUser'] = true;
			
			return Redirect::to(route('inputData_0'))->withInput($oldData);
		}

		$userData = Input::only(['email', 'name', 'born_date']);
		$currentUser = Users::create($userData);
		Session::put('email', $email);
		return Redirect::to(UrlGenerator::getCurrentUrl($currentUser));

	}
	public function ajaxCheckEmail(){
		$email = Input::get('email');
		$emailUser = Users::findByEmail($email);
		if($emailUser){
			return Response::json(['userName' => trim(substr($emailUser->name,0,5)). '...']);

		}
		return Response::json(['userName' => '']);
	}

}