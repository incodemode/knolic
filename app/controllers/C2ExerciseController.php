<?php



class C2ExerciseController extends BaseController{

	public function show(){

		$user = Users::getCurrentUser();
		$user->updateLocation('c2');

		$this->layout->content = View::make('steps.c2.excersice');

	}

	public function store(){

		
		$sourceCode = Input::get('code');
		$sourceCode = str_replace('//[inicio]','$aTest = $a; $bTest = $b; //', $sourceCode);
		$sourceCode .= 'function pasaTest(){global $a, $b, $aTest, $bTest; return ($aTest == $b && $bTest == $a);}';
		$sourceCode = str_replace('//[fin]','echo "=O=U=T="; //', $sourceCode);
		$executeAnswer = CodeExecutor::execute($sourceCode);

		$passed = strpos($executeAnswer['output'],'=O=U=T=OK')===0;
		$executeAnswer['passed'] = $passed;
		
		$executeAnswer['output'] = str_replace('=O=U=T=', '', $executeAnswer['output']);
		


		return Response::json($executeAnswer);


	}
}