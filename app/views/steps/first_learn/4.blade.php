
	<h2>in_array($needle, $haystack)</h2>
	<p><span class="phpVariable">in_array(...)</span> sirve para verificar si un valor existe o no en un arreglo, independientemente de su índice. </p>
	<p>La definición formal es: </p>
	<pre data-code data-hidePhp data-disableAlerts>&lt;?php	
		bool in_array ( 
			(mixed) $aguja , 
			(array) $pajar , 
			[(bool) $estricto = FALSE ]
		);
	</pre>
	<p>PHP utiliza bastante la analogía de encontrar una aguja en un pajar para varias funciones que involucren busqueda y esta no es la excepción</p>
	<p>La variable $aguja indica el valor que se va a buscar dentro del arreglo.</p>
	<p>La variable $pajar es el arreglo en el que se va a buscar.</p>
	
	<p>Por ejemplo, podemos utilizar <span class="phpVariable">in_array(...)</span> para saber si 5 y 8 estan dentro de nuestro arreglo $numerosPrimos:</p>
	<pre data-code data-hidePhp>&lt;?php

	// Definiendo el arreglo de numeros primos
		$numerosPrimos = [2,3,5,7,11];

	// Verificando si 5 esta en el arreglo de numeros primos:
		if(in_array(5, $numerosPrimos)){
			echo '5 sí esta en el arreglo $numerosPrimos'.PHP_EOL;
		}else{
			echo '5 no esta en el arreglo $numerosPrimos'.PHP_EOL;
		}

	// Verificando si 8 esta en el arreglo de numeros primos:
		if(in_array(8, $numerosPrimos)){
			echo '8 sí esta en el arreglo $numerosPrimos'.PHP_EOL;
		}else{
			echo '8 no esta en el arreglo $numerosPrimos'.PHP_EOL;
		}
</pre>
@include('code.execute_panel')

<p>$strict se utiliza como true cuando se quiere comparar con === en vez de ==, la diferencia es que 
	<pre data-code data-hidePhp data-disableAlerts>&lt;?php
		  	1 ==  true; 	// es verdadero.
</pre> 
mientras que 
	<pre data-code data-hidePhp data-disableAlerts>&lt;?php
		  	1 === true; 	// es falso. 
</pre>
</p>
<p>$strict no es tan utilizado y tampoco es necesario colocarlo ya que por defecto es <span class="phpVariable">false</span></p>


<p>&nbsp;</p>




@if($currentUser->a22)
<h2>Ejercicio</h2>
<p>Usando <span class="phpVariable">in_array(...)</span>, coloque en la variable $respuesta <span class="phpVariable">"existe"</span> o <span class="phpVariable">"no existe"</span> dependiendo de si existe o no el valor <span class="phpVariable">5</span> en $arr.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-hidePhp data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-hidePhp data-exercise>&lt;?php

		$respuesta = null;




</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>
@endif


