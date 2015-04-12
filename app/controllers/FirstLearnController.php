<?php

class FirstLearnController extends BaseController{


	public function show($page){

		$page = intval($page);
		if($page >=7){
			return Redirect::to(route('home'));
		}

		$this->layout->content = View::make("steps.first_learn.{$page}");

	}

}