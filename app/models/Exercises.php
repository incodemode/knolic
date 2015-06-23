<?php

class Exercises extends Eloquent{

	protected $table = 'exercises';
	protected $fillable = ['step', 'page', 'tries', 'passed', 'user_id'];

	public static function findOrCreate($step, $page = null){
		$user = Users::getCurrentUser();
		$user_id = $user->id;
		if(!$user){
			return null;
		}
		if(!$page){
			$page = null;
		}
		$possibleExercice = Exercises::where('step', '=', $step)->where('page', '=', $page)->where('user_id', '=', $user->id)->first();
		if($possibleExercice){
			return $possibleExercice;
		}
		$exerciseParameters = compact('step', 'page', 'user_id');
		$newExercise = Exercises::create($exerciseParameters);
		return $newExercise;

	}

	public function storeLastRun($code, $passed){

		
		if(!$this->passed){
			$this->code = $code;
			$this->tries = $this->tries+1;
		}
		if($passed){
			$this->passed = $passed;
		}
		$this->save();

	}

	public function user(){
		$this->belongsTo('Users', 'user_id');
	}

	public function getSubjectAttribute(){

		$testSubjects = [
				'Introducción', 
				'Inicialización', 
				'Inserción',
				'Lectura',
				'Existencia',
				'Busqueda',
				'Índices',
				'Existencia de índice'
				];
		\Log::info($this->page);
		$subject = $testSubjects[$this->page];
		
		return $subject;

	}

	public function getAverageTriesAttribute(){


		$averageTries = Exercises::where('step', '=', $this->step)->where('page', '=', $this->page)->where('passed','=','1')->avg('tries');
		return $averageTries;

	}

	

	public static function getAverageTriesSum(){

		$averageTriesAvgs = Exercises::where('step', '=', 'tests')->groupBy('page')->where('passed','=','1')->select(DB::raw('avg(tries) as average'));
		
		$averageTriesSum = DB::table( DB::raw("({$averageTriesAvgs->toSql()}) as sub") )
		    ->mergeBindings($averageTriesAvgs->getQuery()) // you need to get underlying Query Builder
		    ->sum('sub.average');

		return $averageTriesSum;

	}

}