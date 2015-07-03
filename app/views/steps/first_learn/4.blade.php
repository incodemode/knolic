
	<h2>in_array($needle, $haystack)</h2>
	<p>in_array sirve para verificar si un valor existe o no en un arreglo, independientemente de su índice. </p>
	<p>La definición formal es bool in_array ( mixed $aguja , array $pajar [, bool $strict = FALSE ] )</p>
	<p>PHP utiliza bastante la analogía de encontrar una aguja en un pajar para varias funciones que involucren busqueda y esta no es la excepción</p>
	<p>La variable $aguja indica el valor que se va a buscar dentro del arreglo.</p>
	<p>La variable $pajar es el arreglo en el que se va a buscar.</p>
	
	<p>Por ejemplo, podemos utilizar in_array para saber si 5 y 8 estan dentro de nuestro arreglo $numerosPrimos</p>
	<pre data-code>
&lt;?php

// Definiendo el arreglo de numeros primos
	$numerosPrimos = [2,3,5,7,11];

// Verificando si 5 esta en el arreglo de numeros primos:
	if(in_array(5, $numerosPrimos)){
		echo '5 sí esta en el array $numerosPrimos'.PHP_EOL;
	}else{
		echo '5 no esta en el array $numerosPrimos'.PHP_EOL;
	}

// Verificando si 8 esta en el arreglo de numeros primos:
	if(in_array(8, $numerosPrimos)){
		echo '8 sí esta en el array $numerosPrimos'.PHP_EOL;
	}else{
		echo '8 no esta en el array $numerosPrimos'.PHP_EOL;
	}
</pre>
@include('code.execute_panel')

<p>$strict se utiliza como true cuando se quiere comparar con === en vez de ==, la diferencia es que 
	<pre data-code>&lt;?  	1 ==  true; 	// es verdadero. </pre> 
mientras que 
	<pre data-code>&lt;?  	1 === true; 	// es falso. </pre>
</p>
<p>$strict no es tan utilizado y tampoco es necesario colocarlo ya que por defecto es false</p>


<p>&nbsp;</p>




@if($currentUser->a22)
<h2>Ejercicio</h2>
<p>Usando in_array(...), coloque en la variable $respuesta "existe" o "no existe" dependiendo de si existe o no el valor 5 en $arr.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-restrictedEdit data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-restrictedEdit data-exercise>
&lt;?php
$arr = [rand(0, 5), rand(0,5), rand(0,5)];
//[inicio] Escriba su respuesta despues de esta linea:

$respuesta = null;


//[fin] su código termina en esta linea
if(ejecutarTests()): echo "Excelente! puedes pasar a la siguiente página.";
else: error_log("Ocurrio un error, intentelo de nuevo.");
endif;
</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>
@endif


