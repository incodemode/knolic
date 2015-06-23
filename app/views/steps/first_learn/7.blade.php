
	<h2>array_key_exists ( $indice_a_buscar ,  $arreglo )</h2>
	<p>array_key_exists retorna un boleano true o false dependiendo de si el $indice_a_buscar existe en $arreglo. </p>
	<p>Esta función es muy util cuando necesitas verificar que cierto array tiene un indice para decidir si muestras o no un valor.</p>
	
	<pre data-code>
&lt;?php
$arr = ['a' => 'casa', 'b' => 'teco', 'c' => 'taco'];
$existeB = array_key_exists('b', $arr);
if($existeB){
	echo "Sí Existe b en el arreglo y su valor es '{$arr['b']}'".PHP_EOL;
}else{
	echo "No Existe b en el arreglo".PHP_EOL;
}

$existeD = array_key_exists('d', $arr);
if($existeD){
	echo "Sí Existe d en el arreglo y su valor es '{$arr['d']}'".PHP_EOL;
}else{
	echo "No Existe d en el arreglo".PHP_EOL;
}
</pre>
@include('code.execute_panel')



<p>&nbsp;</p>
<h2>Ejercicio</h2>
<p>Usando array_key_exists(...), coloque en la variable $respuesta "existe" o "no existe" dependiendo de si existe o no el indice 3 en el array $arr.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-restrictedEdit data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-restrictedEdit data-exercise>
&lt;?php
$arr = [rand(0,1) => 'queso', rand(2,3) => 'pan', rand(4,5) => 'zanahoria'];
//[inicio] Escriba su respuesta despues de esta linea:

$respuesta = null;

//[fin] su código termina en esta linea
if(ejecutarTests()): echo "Excelente! puedes pasar a la siguiente página.";
else: error_log("Intentalo de nuevo.");
endif;
</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>
