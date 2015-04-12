<?php



class C2ExerciseController extends BaseController{

	public function show(){

		$this->layout->content = View::make('steps.c2.excersice');

	}

	public function store(){


		// creating soap client
		$sourceCode = '<?php ';
		//$sourceCode = '';
		$sourceCode .= Input::get('editor');
		
		$executeAnswer = IdeOne::execute($sourceCode);
		if($executeAnswer['error'] != '1' && $executeAnswer['output']!='OK'){
			$executeAnswer['error'] = '1';
			$executeAnswer['errorDescription'] = 'Se esperaba OK en la salida, en vez de eso se recibio: <br> '. $executeAnswer['output'];
		}
		return Response::json($executeAnswer);


	}
}