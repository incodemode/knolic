<?php

//este es otro controller distinto, nada que casi lo mismo, no ni mierda.

class TestsController extends BaseController{

	public function Show($page){
		$page = intval($page);
		if(!View::exists('steps.tests.'.($page))){
			return Redirect::to(route('home'));
		}

		$user = Users::getCurrentUser();
		if(!$user){
			return Redirect::to(route('inputData_0'));
		}

		if(View::exists('steps.tests.'.($page+1))){
			$nextUrl = route('tests', ['page' => $page+1]);
		}else{
			$nextUrl = route('results');
		}
		
		$user->updateLocation('tests', $page);

		if($page == 0){
			$viewParameters = compact('page');
		}else{
			$exercise = Exercises::findOrCreate('tests', $page);
			$viewParameters = compact('page', 'exercise');
		}
		$this->layout->content = View::make("steps.tests.$page", $viewParameters);

		$templateParameters = compact('nextUrl', 'previousUrl');
		
		View::share($templateParameters);

		$step = 'tests';
		View::share( compact('page', 'step'));
	}
	public function store($page){
		
		$page = intval($page);
		if(!View::exists('steps.tests.'.($page))){
			return Redirect::to(route('home'));
		}
		$user = Users::getCurrentUser();
		if(!$user){
			return Redirect::to(route('inputData_0'));
		}
		$code = Input::get('code');
		$codeToExecute = str_replace('<?php', '', $code);
		$startCode = $this->startCode($page);
		$endCode = $this->endCode($page);
		$codeToExecute = '<?php ' . $startCode . $codeToExecute . $endCode;
		$codeToExecute .= 'if(ejecutarTests()): echo "=E=x=e=c=Excelente! puedes pasar a la siguiente página.";
else: error_log("Ocurrio un error, intentelo de nuevo.");
endif;';
		
		$execution = CodeExecutor::execute($codeToExecute);
		
		$execution['passed'] = false;
		$output = $execution['output']?$execution['output']:'';
		
		if(strpos($output, '=E=x=e=c=Excelente!' )!==false){
			$execution['passed'] = true;
		}
		$execution['output'] = str_replace('=E=x=e=c=Excelente!', 'Excelente!', $execution['output']);

		$exercise = Exercises::findOrCreate('tests', $page);
		$exercise->storeLastRun($code, $execution['passed']);
		$user->updateLocation('first_learn', $page);
		return Response::json($execution);

	}

	public function startCode($page){
		switch($page){
			case 1:
				return '$arr = null;';
			case 2:
				return '$arr = [1=>\'peras\', 2=>\'manzanas\']; $tempArr = null;';
			case 3:
				return '$arr = [\'primer_indice\'=>5,   \'segundo\'=>rand(10,20),   \'tercero\'=> 35];$tempArr = $arr; $foo = null;';
			case 4:
				return '$arr = [rand(0,10),    rand(0,10),     rand(0,10),     rand(0,10)]; $tempArr = $arr; $foo = null;';
			case 5:
				return '$arr = [\'primero\' => rand(0,5),   \'segundo\' => rand(0,5),   \'tercero\' =>  rand(0,5)]; $tempArr = $arr; $indice = null;';
			case 6:
				return '$arr = [rand(0,4) => \'valor uno\', rand(5,9) => \'valor dos\', rand(10,14) => \'valor tres\' ]; $tempArr = $arr; $indices = null;';
			case 7:
				return '$arr = [rand(0,1) => \'camisa\', rand(2,3) => \'pantalon\', rand(4,5) => \'zapatos\']; $tempArr = $arr; $respuesta = null;';
		}
		return '';
	}
	public function endCode($page){
		$globalFunctions = 'function arrString($arr){
			return trim(print_r($arr, true));
		}';

		switch($page){
			case 1:
				return $globalFunctions . 'function ejecutarTests(){ 
					global $arr; 
					$done = true;
					$testArr = [1 => \'arbol\', 2 => \'flor\'];
					$testArrStr = arrString($testArr);

					if(!is_array($arr)){
						error_log(\'$arr no es un array!<br>\');
						$done = false;
					}else if($arr != $testArr){
						$arrStr = arrString($arr);
						error_log(\'- $arr debio quedar con los valores<br>&nbsp;&nbsp;&nbsp;&nbsp;\'.  $testArrStr .\' <br>&nbsp;&nbsp;y quedo así <br>&nbsp;&nbsp;&nbsp;&nbsp;\' . $arrStr .\'<br>\');
						$done = false;
					}
					return $done;
				}';
			case 2:
				return $globalFunctions . 'function ejecutarTests(){ 
					global $arr; 
					$done = true;
					$testArr = [1 => \'peras\', 2 => \'manzanas\', 3 => \'mangos\'];
					$testArrStr = arrString($testArr);
					
					if(!is_array($arr)){
						error_log(\'- $arr no es un array!<br>\');
						$done = false;
					}else if($arr != $testArr){
						$arrStr = arrString($arr);
						error_log(\'- $arr debio quedar con los valores<br>&nbsp;&nbsp;&nbsp;&nbsp;\'.  $testArrStr .\' <br>&nbsp;&nbsp;y quedo así <br>&nbsp;&nbsp;&nbsp;&nbsp;\' . $arrStr .\'<br>\');
						$done = false;
					}
					return $done;
				}';
			case 3:
				return $globalFunctions . 'function ejecutarTests(){ 
					global $foo, $tempArr; 
					$done = true;
					$testA = $tempArr[\'segundo\'];
					$arrString = arrString($tempArr);
					if($foo != $testA){
						error_log(\'El arreglo $arr esta asi: <br>&nbsp;&nbsp;$arr = \'.$arrString.\'<br>&nbsp;&nbsp;$foo no es igual a \' . $testA . \'.<br>\');
						$done = false;
					}
					return $done;
				}';
			case 4:
				return $globalFunctions . 'function ejecutarTests(){
					global $foo, $tempArr;
					$done = true;
					$testFoo = in_array(5, $tempArr)?\'existe\':\'no existe\';
					$arrString = arrString($tempArr);
					if($testFoo != strtolower($foo)){
						error_log(\'El arreglo $arr esta asi: <br>&nbsp;&nbsp;$arr = \'.$arrString.\'<br>&nbsp;&nbsp;$foo no es igual a \\\'\' . $testFoo . \'\\\'.<br>\');
						$done = false;
					}
					return $done;

				}';
			case 5:
				return $globalFunctions . 'function ejecutarTests(){
					global $indice, $tempArr;
					$done = true;
					$testIndice = array_search(5, $tempArr)?array_search(5, $tempArr):\'no existe\';
					$arrString = arrString($tempArr);
					if($testIndice != strtolower($indice)){
						error_log(\'El arreglo $arr esta asi: <br>&nbsp;&nbsp;$arr = \'.$arrString.\'<br>&nbsp;&nbsp;$indice no es igual a \\\'\' . $testIndice . \'\\\'.<br>\');
						$done = false;
					}
					return $done;

				}';
			case 6:
				return $globalFunctions . 'function ejecutarTests(){
					global $indices, $tempArr;
					$done = true;
					$testIndices = array_keys($tempArr);
					$testIndicesStr = arrString($testIndices);
					if(!is_array($indices)){
						error_log(\'Error:<br>&nbsp;&nbsp;$indices debe de ser un array <br>\');
						$done = false;
					}else if($testIndices != $indices){
						$arrString = arrString($tempArr);
						error_log(\'El arreglo $arr esta asi: <br>&nbsp;&nbsp;$arr = \'.$arrString.\'<br>&nbsp;&nbsp;$indices no es igual a \' . $testIndicesStr . \'.<br>\');
						$done = false;
					}
					return $done;

				}';
			case 7:
				return $globalFunctions . 'function ejecutarTests(){
					global $respuesta, $tempArr;
					$done = true;
					$testRespuesta = array_key_exists(3, $tempArr)!==false?\'Existe\':\'No existe\';
					if(strtolower($testRespuesta) != strtolower($respuesta)){
						error_log(\'Error:<br>&nbsp;&nbsp; $respuesta debe ser igual a "\'. $testRespuesta . \'"<br>\');
						$done = false;
					}
					return $done;

				}';


		}
		return '';
		//1,2,3,4,$c y sus índices 2,3,4,5,6
	}
}