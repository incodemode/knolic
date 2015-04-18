
	<h2>in_array($needle, $haystack)</h2>
	<p>in_array sirve para verificar si un valor existe o no en un array, independientemente de su índice. </p>
	<p>La definición formal es bool in_array ( mixed $aguja , array $pajar [, bool $strict = FALSE ] )</p>
	<p>PHP utiliza bastante la analogía de encontrar una aguja en un pajar para varias funciones que involucren busqueda y esta no es la excepción</p>
	<p>La variable $aguja indica el valor que se va a buscar dentro del arreglo.</p>
	<p>La variable $pajar es el arreglo en el que se va a buscar.</p>
	<p>$strinct se utiliza cuando se quiere comparar con === en vez de ==, la diferencia es que 1==true es verdadero mientras que 1===true no es verdadero.</p>
	<p>Por ejemplo nos podria ayudar a saber si 5 y 8 estan dentro de nuestro array $numerosPrimos</p>
	<pre data-code>
&lt;?php
// Definiendo el arreglo
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