<?php

class InputDataController extends BaseController{

	public function showInputData(){

		$this->layout->content = View::make('steps.inputData');

	}

}