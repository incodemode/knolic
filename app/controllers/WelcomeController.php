<?php


class WelcomeController extends BaseController{

	

	public function showWelcome(){

		$this->layout->with(['name'=>'Luis']);

		$this->layout->content = View::make('steps.welcome');
		
	}
}