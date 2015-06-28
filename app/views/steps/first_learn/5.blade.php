
	<h2>array_search($needle, $haystack, $strict = false)</h2>
	<p> Sirve para encontrar la llave que identifica a un valor de un arreglo, 
		por ejemplo si se busca en [5=> 'Valor'] el 'valor' la funcion devolverá 5. </p>
	<p> Cuando se hace la busqueda de un string, el Valor se compara independientemente de si tiene minusculas o mayusculas. </p>
	<p> La definición completa es mixed array_search ( mixed $aguja , array $pajar [, bool $strict = estricto ] )</p>
	<p> Como ya mencionamos antes, a los desarrolladores de PHP les gusta la analogia de la agua en el pajar. </p>
	<p> $aguja será el valor a bucar, si es un string, la busqueda será insensible a mayusculas y minusculas. </p>
	<p> $pajar es el array en el que se va a buscar </p>
	<p> $strict true hace que se compare con === en vez de == </p>
<pre data-code>
&lt;?php
$arr = [ 'llave_1' => 'Valor 1', 'llave_2' => 'valor 2' ];
$key = array_search('valor 1', $arr);
echo "la llave de 'valor 1' es {$key}";
</pre>
@include('code.execute_panel')
	<p> La función retorna la llave o indice que identifica al valor que se esta buscando o falso si no se encuentra el valor. 
		Se debe tener cuidado a la hora de verificar el valor de retorno pues si algun indice es = 0 por ejemplo el simbolo de igualdad == 
		no será suficiente pues 0 == false es verdadero. Por ejemplo:</p>
	<pre data-code>
&lt;?php
$arr = [0 => 'valor'];
$key = array_search('valor', $arr);
if($key == false){
	echo "Valor encontrado es == false".PHP_EOL;
	echo "Esto no indica que 'valor' no exista en el arreglo.".PHP_EOL;
	echo "Pues 0==false pero no 0===false.".PHP_EOL;
}
if($key === false){
	echo "Esta es la comprobación que se hace para verificar si 'valor'".PHP_EOL.
	     "existe o no en el arreglo.".PHP_EOL;
	echo "Esta no se imprimirá porque 'valor' sí existe.". PHP_EOL;
}
</pre>
@include('code.execute_panel')

<p>&nbsp;</p>




@if($currentUser->a22)
<h2>Ejercicio</h2>
<p>Usando array_search(...), coloque en la variable $indice el índice si es de que si existe el valor 5, si no, dejelo como "Ese valor no existe".</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-restrictedEdit data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-restrictedEdit data-exercise>
&lt;?php
$arr = [rand(0,5), rand(0,5), rand(0,5), rand(0,5)];
//[inicio] Escriba su respuesta despues de esta linea:

$indice = null;

//[fin] su código termina en esta linea
if(ejecutarTests()): echo "Excelente! puedes pasar a la siguiente página.";
else: error_log("Intentalo de nuevo.");
endif;
</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>
@endif
