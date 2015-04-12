<?php

Class IdeOne {
	
	//devolver error = 0, errorDescription = x, output.
	public static function execute($sourceCode){

		$client = new SoapClient("http://ideone.com/api/1/service.wsdl");
		$language = 29;
		$input = '';
		$error = '0';
		$createSubmission = $client->createSubmission("lmdbluis", "holaSphere3$", $sourceCode, $language, $input, true, false);
		if(!isset($createSubmission['error']) || $createSubmission['error']!=='OK'){
			$error = '1';
			$errorDescription = 'Nos se logro comunicar con el servidor de jailed PHP, por favor intentelo de nuevo.';
			$output = '';
			\Log::error($createSubmission);
			return compact('error', 'errorDescription', 'output', 'stderr', 'cmpinfo');
		}
		$status = 0;
		$link = $createSubmission['link'];
		do{
			$submissionStatus = $client->getSubmissionStatus("lmdbluis", "holaSphere3$", $link);
			
			$status = $submissionStatus['status'];
			$result = $submissionStatus['result'];

			if($status != 0){
				sleep(3);
			}
		}while($status != 0);
		
		if($result != 15){
			$error = '1';
			$errorDescription = self::translateResult($result);
		}
		$withSource = false;
		$withInput = false;
		$withOputput = true;
		$withStderr = true;
		$withCmpinfo = true;
		$submissionDetails = $client->getSubmissionDetails("lmdbluis", "holaSphere3$", $link, $withSource, $withInput, $withOputput, $withStderr, $withCmpinfo);

		if($submissionDetails['error'] != 'OK'){
			\Log::error($submissionDetails);
			$errorDescription = 'Hay problemas con el servidor de jail PHP, por favor contacte con el administrador.';
			$error = 1;
		}
		$output = $submissionDetails['output'];
		$stderr = $submissionDetails['stderr'];
		$cmpinfo = $submissionDetails['cmpinfo'];

		return compact('error', 'errorDescription', 'output', 'stderr', 'cmpinfo');

	}

	public static function translateResult($result){
		switch($result){
			case 0:
				return 'No esta corriendo, contacte al administrador.';
			case 11:
				return 'Error de compilación.';
			case 12:
				return 'Error en tiempo de ejecución.';
			case 13:
				return 'Limite de tiempo excedido.';
			case 15:
				return 'Exito!';
			case 17:
				return 'Limite de memoria alcanzado.';
			case 19:
				return 'Llamada ilegal.';
			case 20:
				return 'Error interno del servidor de jail PHP.';
		}
		return 'Error desconocido.';
	}

}
