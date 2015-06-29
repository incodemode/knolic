<?php

class A221Controller extends BaseController{

	public function show(){

		$user = Users::getCurrentUser();

		$user->updateLocation('c2');

		$this->layout->content = View::make('steps.a22.a221');

	}

	public function store(){


		// creating soap client
		
		
		$sourceCode = Input::get('code');
		
		$sourceCode = 'function algunValor(){return "oculto";}'. $sourceCode;
		$sourceCode = str_replace('//[inicio]','$aTest = $a = rand(0,10); $bTest = $b = rand(21,30); $cTest = $c = rand(31,40); $dTest = $d = rand(41,50);//', $sourceCode);
		$sourceCode .= '
		$respuesta = 1;
		function arrString($arr){
			return trim(print_r($arr, true));
		}
		function passed($number){
			return \'<span class="green">\'.$number.\'- Sí pasó. </span>\';
		}
		function notPassed($number){
			return \'<span class="red">\'.$number.\'.- No pasó. </span>\';
		}

		function pasarTests(){
			global $a, $b, $c, $d, $aTest, $bTest, $cTest, $dTest, $arr, $m, $n, $o, $p, $keys; 
			
			//instanciar array
			$testArr = [5 => 3, 4 => $a, $c => 4, $d => $b];
			$testArrString = print_r($testArr, true);
			$passed = true;
			$log = \'<br>\';
			if(!isset($arr) || $testArrString != print_r($arr, true)){
				if(is_array($arr)){
					$log .= notPassed(1).\' $arr debe de quedar como \'.arrString($testArr).\' y quedó \'.arrString($arr);
				}else{
					$log .= notPassed(1). \'$arr no es un array.\';
				}
				$log .=\'<br>\';
				error_log($log);
				return false;
			}else{
				$log .= passed(1);
			}
			$log .=\'<br>\';

			//accesar por indice
			$testM = $arr[4];

			if(!isset($m) || $m != $testM){
				$log .= notPassed(2).\' $m no es igual a \'.$testM;
				$passed = false;
			}else{
				$log .= passed(2);
			}
			$log .=\'<br>\';

			$testN = in_array(5, $arr);
			if(!isset($n) || $testN != $n){
				$log .= notPassed(3).\' $n no es igual a \'.($testN?\'true\':\'false\').\'.\';
				$passed = false;
			}else{
				$log .= passed(3);
			}
			$log .=\'<br>\';

			$oTest = array_search(5, $arr);
			if(!isset($o) || $oTest != $o){
				$log .= notPassed(4).\' $o no es igual a \'.$oTest.\'.\';
				$passed = false;
			}else{
				$log .= passed(4);
			}
			$log .=\'<br>\';

			$testKeys = array_keys($arr);
			if(!isset($keys) || $testKeys != $keys){
				$log .= notPassed(5).\' $keys no es igual a \'.arrString($testKeys).\'.\';
				$passed = false;
			}else{
				$log .= passed(5);
			}
			$log .=\'<br>\';

			// key_exists
			$testP = array_key_exists(3, $arr);
			
			if(!isset($testP) || $testP != $p){
				$log .= notPassed(6).\' $p debia ser igual a \'.arrString($testP).\'. en vez de eso se encontró.\'. arrString($p);
				$passed = false;
			}else{
				$log .= passed(6);
			}
			$log .=\'<br>\';

			if(!$passed){
				error_log($log);
			}
			return $passed;
		}


		';

		
		$sourceCode = str_replace('//[fin]','echo "=E=L=I=M=I="; //', $sourceCode);
		$executeAnswer = CodeExecutor::execute($sourceCode);

		$passed = strpos($executeAnswer['output'],'=E=L=I=M=I=OK')!==false;
		$executeAnswer['passed'] = $passed;
		
		$executeAnswer['output'] = str_replace('=E=L=I=M=I=', '', $executeAnswer['output']);
		


		return Response::json($executeAnswer);


	}

}