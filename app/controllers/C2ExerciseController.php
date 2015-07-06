<?php



class C2ExerciseController extends BaseController{

	public function show(){

		$user = Users::getCurrentUser();

		if(!$user){
			return Redirect::to(route('inputData_0'));
		}

		$user->updateLocation('c2');

		$exercise = Exercises::findOrCreate('c2');

		$nextUrl = route('first_learn', ['page' => 0]);

		$this->layout->content = View::make('steps.c2.excersice', ['exercise' => $exercise]);

		View::share(compact('nextUrl'));
		
		$step = 'c2';
		$page = null;
		View::share( compact('page', 'step'));
	}

	public function store(){

		$currentUser = Users::getCurrentUser();

		if(!$currentUser){
			return Response::json(['session_error' => true, 'login_url' => route('inputData_0')]);
		}
		$code = Input::get('code');

		
		$startCode = '$a = rand(1,10); $b = rand(11,20);$aTest = $a; $bTest = $b;';
		$sourceCode = '<?php ' . $startCode . str_replace('<?php','', $code);;
		$sourceCode .= 'function ejecutarTest(){global $a, $b, $aTest, $bTest; return ($aTest == $b && $bTest == $a);}';
		$sourceCode .= 'if(  ejecutarTest()  ){
    echo(\'=O=U=T=Excelente!, puedes pasar a la siguiente página.\');
}else{
    error_log(\'Ha fallado el test, intentalo de nuevo.\');
}';

		$executeAnswer = CodeExecutor::execute($sourceCode);

		$passed = strpos($executeAnswer['output'],'=O=U=T=Excelente')===0;
		$executeAnswer['passed'] = $passed;
		
		$executeAnswer['output'] = str_replace('=O=U=T=', '', $executeAnswer['output']);
		
		$exercise = Exercises::findOrCreate('c2');
		$exercise->storeLastRun($code, $passed);



		return Response::json($executeAnswer);


	}
}