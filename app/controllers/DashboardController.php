<?php


class DashboardController extends BaseController{


	public function index(){

		$user = Users::getCurrentUser();

		if(!$user || $user->id != 1 ){
			return Redirect::to(route('home'));
		}

		$users = Users::all();

		$viewParameters  = compact('users');

		$this->layout->content = View::make('steps.dashboard', $viewParameters);

	}

}