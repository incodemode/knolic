<?php

class CodeExecutor{

	public static function execute($code){

		$enviroment = \App::environment();
		if($enviroment == 'local'){
			return LocalCodeExecutor::execute($code);
		}else{
			return IdeOne::execute($code);
		}

	}

}