<?php

class FirstLearnController extends BaseController{

	public function show($page){

		$page = intval($page);
		if(!View::exists('steps.first_learn.'.($page))){
			return Redirect::to(route('home'));
		}

		$user = Users::getCurrentUser();
		if(!$user){

			return Redirect::to(route('home'));

		}

		$user->updateLocation('learn_1', $page);

		$viewParameters = compact('page');
		$this->layout->content = View::make("steps.first_learn.first_learn", $viewParameters);

	}

}