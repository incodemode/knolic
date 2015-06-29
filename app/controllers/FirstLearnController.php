<?php

class FirstLearnController extends BaseController{

	public function show($page){

		$page = intval($page);
		if(!View::exists('steps.first_learn.'.($page))){
			return Redirect::to(route('home'));
		}

		$user = Users::getCurrentUser();
		if(!$user){
			return Redirect::to(route('inputData_0'));
		}

		if($page == 0){
			if($user->c2){
				$previousUrl = route('c2_0');
			}
		}else{
			$previousUrl = route('first_learn', ['page' => $page-1]);
		}
		if(View::exists('steps.first_learn.'.($page+1))){
			$nextUrl = route('first_learn', ['page' => $page+1]);
		}else{
			$nextUrl = route('tests', ['page' => 0]);
		}
		
		$user->updateLocation('first_learn', $page);

		$exercise = Exercises::findOrCreate('first_learn', $page);

		$viewParameters = compact('page', 'exercise');
		
		$this->layout->content = View::make("steps.first_learn.first_learn", $viewParameters);

		$templateParameters = compact('nextUrl', 'previousUrl');
		
		View::share($templateParameters);

		$step = 'first_learn';
		View::share( compact('page', 'step'));

	}

	public function store($page){
		$page = intval($page);
		if(!View::exists('steps.first_learn.'.($page))){
			return Redirect::to(route('home'));
		}
		$user = Users::getCurrentUser();
		if(!$user){
			return Redirect::to(route('inputData_0'));
		}
		$code = Input::get('code');
		$codeToExecute = $code;
		$codeToExecute = str_replace('Excelente!', '=E=x=e=c=Exelente!', $codeToExecute);
		$startCode = $this->startCode($page);
		$codeToExecute = substr_replace($codeToExecute, $startCode . '//[inicio]', strpos($codeToExecute, '//[inicio]'), strlen('//[inicio]'));// str_replace('//[inicio]', $startCode . '//[inicio]', $codeToExecute);
		$endCode = $this->endCode($page);
		$codeToExecute = substr_replace($codeToExecute, $endCode . '//[fin]', strrpos($codeToExecute, '//[fin]'), strlen('//[fin]'));
		
		$execution = CodeExecutor::execute($codeToExecute);
		
		$execution['passed'] = false;
		$output = $execution['output']?$execution['output']:'';
		
		if(strpos($output, '=E=x=e=c=Exelente!' )!==false){
			$execution['passed'] = true;
		}
		$execution['output'] = str_replace('=E=x=e=c=Exelente!', 'Exelente!', $execution['output']);

		$exercise = Exercises::findOrCreate('first_learn', $page);
		$exercise->storeLastRun($code, $execution['passed']);
		$user->updateLocation('first_learn', $page);
		return Response::json($execution);

	}

	public function startCode($page){
		switch($page){
			case 1:
				return '$arr = null;';
			case 2:
				return '$arr = null; $tempOtroArr = $otroArr;';
			case 3:
				return '$tempArr = $arr; $a = null;';
			case 4:
				return '$tempArr = $arr; $respuesta = null;';
			case 5:
				return '$tempArr = $arr; $indice = null;';
			case 6:
				return '$tempArr = $arr; $indices = null;';
			case 7:
				return '$tempArr = $arr; $respuesta = null;';
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
					if(!is_array($arr)){
						error_log(\'$arr no es un array!<br>\');
						$done = false;
					}
					return $done;
				}';
			case 2:
				return $globalFunctions . 'function ejecutarTests(){ 
					global $arr, $tempArr, $otroArr, $tempOtroArr; 
					$done = true;
					$testArr = [1 => \'libro\', 2 => \'revista\'];
					$testArrStr = arrString($testArr);
					
					if(!is_array($arr)){
						error_log(\'- $arr no es un array!<br>\');
						$done = false;
					}else if($arr != $testArr){
						$arrStr = arrString($arr);
						error_log(\'- $arr debio quedar con los valores<br>&nbsp;&nbsp;&nbsp;&nbsp;\'.  $testArrStr .\' <br>&nbsp;&nbsp;y quedo así <br>&nbsp;&nbsp;&nbsp;&nbsp;\' . $arrStr .\'<br>\');
						$done = false;
					}
					$testOtroArr = $tempOtroArr;
					$testOtroArr[3] = \'chicles\';
					$testOtroArrStr = arrString($testOtroArr);
					if(!is_array($otroArr)){
						error_log(\'- $otroArr no es un array().<br>\');
						$done = false;
					}else if($otroArr != $testOtroArr){
						$otroArrStr = arrString($otroArr); 
						error_log(\'- $otroArr debio quedar con el valor<br>&nbsp;&nbsp;&nbsp;&nbsp;\'.$testOtroArrStr.\'<br>&nbsp;&nbsp;y quedo así<br>&nbsp;&nbsp;&nbsp;&nbsp;\'.$otroArrStr.\'<br>&nbsp;\');
						$done = false;
					}
					return $done;
				}';
			case 3:
				return $globalFunctions . 'function ejecutarTests(){ 
					global $a, $tempArr; 
					$done = true;
					$testA = $tempArr[3];

					if($a != $testA){
						error_log(\'Error: <br>&nbsp;&nbsp;$a no es igual a \' . $testA . \'.\');
						$done = false;
					}
					return $done;
				}';
			case 4:
				return $globalFunctions . 'function ejecutarTests(){
					global $respuesta, $tempArr;
					$done = true;
					$testRespuesta = in_array(5, $tempArr)?\'existe\':\'no existe\';
					if($testRespuesta != strtolower($respuesta)){
						error_log(\'Error:<br>&nbsp;&nbsp; $respuesta debe ser igual a "\'. $testRespuesta.\'"<br>\');
						$done = false;
					}
					return $done;

				}';
			case 5:
				return $globalFunctions . 'function ejecutarTests(){
					global $indice, $tempArr;
					$done = true;
					$testIndice = array_search(5, $tempArr)!==false?array_search(5, $tempArr):\'Ese valor no existe\';
					if(strtolower($testIndice) != strtolower($indice)){
						error_log(\'Error:<br>&nbsp;&nbsp; $indice debe ser igual a "\'. $testIndice . \'"<br>\');
						$done = false;
					}
					return $done;

				}';
			case 6:
				return $globalFunctions . 'function ejecutarTests(){
					global $indices, $tempArr;
					$done = true;
					$testIndices = array_keys($tempArr);
					
					if(!is_array($indices)){
						error_log(\'Error:<br>&nbsp;&nbsp;$indices debe de ser un array <br>\');
						$done = false;
					}else if($testIndices != $indices){
						$testIndicesStr = arrString($testIndices);
						error_log(\'Error:<br>&nbsp;&nbsp; $indices debe de ser igual a \'. $testIndicesStr . \'"<br>\');
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