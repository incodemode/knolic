<?php

class GenericCodeController extends BaseController{


	public function ajaxExecute(){
		$currentUser = Users::getCurrentUser();
		if($currentUser == null){
			return null;
		}
		$code = Input::get('code');
		$executionJson = IdeOne::execute($code);
		return Response::json($executionJson);
	}

}