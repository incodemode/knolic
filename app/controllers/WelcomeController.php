<?php


class WelcomeController extends BaseController{

	

	public function showWelcome(){

		

		$this->layout->content = View::make('steps.welcome');
		
		$step = 'home';
		$page = null;
		View::share( compact('page', 'step'));
		
	}
}