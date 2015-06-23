<?php

class LocalCodeExecutor{

	public static function execute($code){
		
		$codeFile = self::getTempFileName();
		file_put_contents($codeFile, $code);

		$stdErrFile = self::getTempFileName();

		$outputArr = [];
		exec("php {$codeFile} 2> {$stdErrFile}", $outputArr);
		$output = implode('\n\r', $outputArr);
		$stderr = file_get_contents($stdErrFile);
		$error = false;
		$cmpinfo = '';
		$errorDescription = '';

		return compact('code', 'error', 'errorDescription', 'output', 'stderr', 'cmpinfo');
	}

	public static function getTempFileName(){
		$tempFile = tmpfile ();
		$meta_data = stream_get_meta_data($tempFile);
		return $filename = $meta_data["uri"];
	}


}