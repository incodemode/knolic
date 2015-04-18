<?php



class C2ExerciseController extends BaseController{

	public function show(){

		$user = Users::getCurrentUser();
		Log::info('hola');
		Log::info($user);
		$user->updateLocation('c2');

		$this->layout->content = View::make('steps.c2.excersice');

	}

	public function store(){


		// creating soap client
		
		
		$sourceCode = Input::get('code');
		$sourceCode = str_replace('//[inicio]','$aTest = $a; $bTest = $b; //', $sourceCode);
		$sourceCode .= 'function pasaTest(){global $a, $b, $aTest, $bTest; return ($aTest == $b && $bTest == $a);}';
		$sourceCode = str_replace('//[fin]','echo "=E=L=I=M=I="; //', $sourceCode);
		$executeAnswer = CodeExecutor::execute($sourceCode);

		$passed = strpos($executeAnswer['output'],'=E=L=I=M=I=OK')===0;
		$executeAnswer['passed'] = $passed;
		
		$executeAnswer['output'] = str_replace('=E=L=I=M=I=', '', $executeAnswer['output']);
		


		return Response::json($executeAnswer);


	}
}