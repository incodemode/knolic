<?php

class ResultsController extends BaseController{


	public function show(){

		$user = Users::getCurrentUser();
		if(!$user){
			return Redirect::to(route('inputData_0'));
		}

		$user->updateLocation('results', null);

		$introductionUrl = route('home');
		$learningAreaUrl = route('first_learn', ['page' => 0]);
		$testsUrl = route('tests', ['page' => 0]);

		$testResults = $user->testResults;
		
		$user->updateLocation('results');
		$averageTriesSum = Exercises::getAverageTriesSum();

		$resultsViewParameters = compact('introductionUrl', 'learningAreaUrl', 'testsUrl', 'testResults', 'averageTriesSum', 'user');

		$this->layout->content = View::make('steps.results', $resultsViewParameters);

	}

}