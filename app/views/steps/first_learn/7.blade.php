
	<h2>array_key_exists ( $indice_a_buscar ,  $arreglo )</h2>
	<p><span class="phpVariable">array_key_exists(...)</span> retorna un boleano true o false dependiendo de si el $indice_a_buscar existe en $arreglo. </p>
	<p>Esta función sirve para verificar si un arreglo tiene cierto índice para decidir si se debe mostrar o no su valor.</p>
	
	<pre data-code data-hidePhp>&lt;?php
		$arr = ['a' => 'casa', 'b' => 'teco', 'c' => 'taco'];
		
		$existeB = array_key_exists('b', $arr);
		if($existeB){
			echo "El valor en 'b' es " . $arr['b'] . PHP_EOL;
		}else{
			echo "No Existe b en el arreglo".PHP_EOL;
		}

		$existeD = array_key_exists('d', $arr);
		if($existeD){
			echo "El valor en 'd' es " . $arr['d'] . PHP_EOL;
		}else{
			echo "No Existe d en el arreglo".PHP_EOL;
		}
</pre>
@include('code.execute_panel')


@if($currentUser->a22)
<p>&nbsp;</p>
<h2>Ejercicio</h2>
<p>Usando <span class="phpVariable">array_key_exists(...)</span>, coloque en la variable $respuesta  <span class="phpVariable">"existe"</span> o <span class="phpVariable">"no existe"</span> dependiendo de si existe o no el indice <span class="phpVariable">3</span> en el arreglo $arr.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-hidePhp data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-hidePhp data-exercise>
&lt;?php
$respuesta = null;



</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>
@endif
