
	<h2>array_search($needle, $haystack, $strict = false)</h2>
	<p> Sirve para encontrar la llave que identifica a un valor de un arreglo, 
		por ejemplo si se busca en <span class="phpVariable">[5=> 'Valor']</span> el <span class="phpVariable">'valor'</span> la funcion devolverá <span class="phpVariable">5</span>. </p>
	<p> Cuando se hace la busqueda de un string, el valor se compara independientemente de si tiene minusculas o mayusculas. </p>
	<p> La definición completa es:
		<pre data-code data-hidePhp data-disableAlerts>&lt;?php
		mixed array_search ( 
			mixed $aguja , 
			array $pajar , 
			[bool $strict = estricto ] 
		)
		</pre></p>
	<p> Como ya mencionamos antes, a los desarrolladores de PHP les gusta la analogía de la aguja en el pajar. </p>
	<p> $aguja será el valor a bucar, si es un string, la busqueda será insensible a mayusculas y minusculas. </p>
	<p> $pajar es el arreglo en el que se va a buscar </p>
	<p> $strict true hace que se compare con <span class="phpVariable">===</span> en vez de <span class="phpVariable">==</span> </p>

<pre data-code data-hidePhp>&lt;?php

	// Definimos e inicializamos el arreglo $arr
		$arr = [ 'llave_1' => 'Valor 1', 'llave_2' => 'valor 2' ];

	// Obtenemos la llave del valor 'Valor 1'
		$key = array_search('valor 1', $arr);

	// Imprimimos la llave
		echo "la llave de 'valor 1' es " . $key;

</pre>
@include('code.execute_panel')
	<p> La función retorna la llave o indice que identifica al valor que se esta buscando o <span class="phpVariable">false</span> si no se encuentra el valor.</p>
	<p>Se debe tener cuidado a la hora de verificar el valor de retorno pues si el indice encontrado es <span class="phpVariable">0</span>, <span class="phpVariable">$indice != false</span> será <span class="phpVariable">false</span>.</p>
	<p> Por ejemplo, esta es la forma incorrecta de verificar el resultado de <span class="phpVariable">array_search(...)</span>:</p>
	<pre data-code data-hidePhp>&lt;?php
		
		// Definimos e inicializamos el arreglo $arr
			$arr = [0 => 'valor'];

		// $key es igual a 0
			$key = array_search('valor', $arr);

		// Forma invalida de verificar si $key no tiene la llave
			if($key != false){
				// la ejecución no llega aqui aunque debiera.
				echo 'La llave de "valor" es '. $key; 
			}else{
				echo 'Fallo: "valor" no fue encontrado en $arr';
			}
</pre>
@include('code.execute_panel')

		<p> Esta es la forma CORRECTA de verificar el resultado de <span class="phpVariable">array_search(...)</span> utilizando <span class="phpVariable">$resultado <strong>!==</strong> false</span>:</p>	
	<pre data-code data-hidePhp>&lt;?php
		
		// Definimos e inicializamos el arreglo $arr
			$arr = [0 => 'valor'];

		// $key es igual a 0
			$key = array_search('valor', $arr);

		// Forma VALIDA de verificar si $key no tiene la llave
			if($key !== false){
				echo 'La llave de "valor" es '. $key;
			}else{
				echo '"valor" no fue encontrado en $arr'.PHP_EOL;
			}

</pre>
@include('code.execute_panel')

<p>&nbsp;</p>




@if($currentUser->a22)
<h2>Ejercicio</h2>
<p>Usando array_search(...), coloque en la variable $indice el índice si es de que si existe el valor 5, si no, dejelo como <span class="phpVariable">"Ese valor no existe"</span>.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-hidePhp data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-hidePhp data-exercise>
&lt;?php

$indice = null;



</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>
@endif
