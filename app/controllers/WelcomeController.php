<?php


class WelcomeController extends BaseController{

	

	public function showWelcome(){


		$this->layout->content = View::make('steps.welcome');
		
	}
}