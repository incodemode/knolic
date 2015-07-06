
	<h2>Inicialización</h2>
	
<p>A los arreglos se les pueden ingresar datos de muchas formas, la más sencilla es inicializar la variable con los valores y sin llaves:</p>

<pre data-code data-hidePhp>&lt;?php
		$arr  =      ['valor 1', 'valor 2', 'valor n'];
		$arr2 = array('valor 1', 'valor 2', 'valor n');
		//ambos arreglos son equivalentes.
		print_r($arr);
		print_r($arr2);
</pre>
	@include('code.execute_panel')

<p>PHP soporta llaves de tipo string, osea que el marcador que indica en que posición esta el valor que estes buscando puede ser <span class="phpVariable">'Una cadena'</span>.</p>

<p>Tambien se pueden inicializar con las llaves ya definidas:
<pre data-code data-hidePhp data-disableAlerts>&lt;?php 
			$arr = ['llave'=>'valor'];
</pre>
</p>
<p>Si quisiera crear un arreglo con 4 numeros primos indexados por su posición empezando del uno. Este sería el código:</p>
	<pre data-code data-hidePhp>&lt;?php
	$arr = [
		1 => 2,
		2 => 3,
		3 => 5,
		4 => 7,
	];

	print_r($arr);
</pre>
@include('code.execute_panel')

<p>Otra forma de ingresar data en los arreglos es utilizando el operador de asignación con corchetes, este asignará el valor a la siguiente llave disponible, empezando desde el <span class="phpVariable">0</span> si no hay datos y desde la llave de mayor valor cuando sí haya datos:</p>
	<pre data-code data-hidePhp>&lt;?php
		$arr = [1 => 'valor 1'];
		$arr[] = 'valor 2';
		$arr[] = 'valor 3';
		print_r($arr);
	</pre>
	@include('code.execute_panel')
<p>	
	O utilizando una llave definida: 
	<pre data-code data-hidePhp data-disableAlerts>&lt;?php	
			$arr['llave'] = 'valor'
	</pre>
</p>

<p>
	Volvamos a utilizar el ejemplo de numeros primos, pero ahora los ingresaremos con el operador de asignación de corchetes con llave definida:
</p>
	<pre data-code data-hidePhp>
&lt;?php
	$arr = []; //la declaración no es necesaria en PHP 
		//pero la hacemos para que el código sea entendible

	$arr['primer numero primo'] 	= 2;
	$arr['segundo numero primo'] 	= 3;
	$arr['tercer numero primo']		= 5; 
		
	print_r($arr);
</pre>
@include('code.execute_panel')

<p>Si lo notan en el ejemplo anterior se han utilizado cadenas de texto para las llaves.</p>
<p>&nbsp;</p>


@if($currentUser->a22)
<h2>Ejercicio</h2>
<p>Inicialize la variable $arr como un arreglo con los valores 'libro', 'revista' y sus índices 1, 2 respectivamente.</p>
<p>Tambien agregue a $otroArr el valor 'chicles' con el índice 3.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-exercise data-hidePhp data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-exercise data-hidePhp>&lt;?php
	$arr = null;
	$otroArr;
</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>
@endif



