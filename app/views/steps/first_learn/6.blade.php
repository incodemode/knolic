
	<h2>array_keys($arreglo, $valor_de_busqueda, $strict)</h2>
	<p><span class="phpVariable">array_keys(...)</span> retorna un arreglo con las llaves que tiene $arr, por ejemplo:</p>
	<pre data-code data-hidePhp>&lt;?php
		$arr = ['a' => 'casa', 'b' => 'perro', 'c' => 'perro']; 
		
		$keys = array_keys($arr); 

		echo 'Las llaves de $arr son:' . PHP_EOL;
		print_r($keys); //['a', 'b', 'c']
	</pre>
	@include('code.execute_panel')

<p>Cuando se utiliza con $valor_de_busqueda devolverá las llaves de los valores que sean encontrados.</p>
	<pre data-code data-hidePhp>&lt;?php
		$arr = ['a' => 'casa', 'b' => 'perro', 'c' => 'perro']; 
		
		$valor_de_busqueda = 'perro';
		$keys = array_keys($arr, $valor_de_busqueda);

		echo 'Llaves de $arr para el valor "perro":' . PHP_EOL;
		print_r($keys); // ['b', 'c']
	</pre>
@include('code.execute_panel')


<p>$strict indica si valor de busqueda será evaluado con <span class="phpVariable">==</span> o <span class="phpVariable">===</span>.</p>
	<pre data-code data-hidePhp>&lt;?php
		$arr = ['a' => 1, 'b' => '1', 'c' => true]; 
		$valor_de_busqueda = '1';

		echo 'Sin $strinct retorna:' . PHP_EOL;
		$keys = array_keys($arr, $valor_de_busqueda, false); 
		print_r( $keys ); // ["a", "b", "c"]

		echo 'Con $strinct retorna:' . PHP_EOL;
		$keysStrict = array_keys($arr, $valor_de_busqueda, true);
		print_r( $keysStrict ); // ['c']
</pre>
@include('code.execute_panel')


<p>&nbsp;</p>


@if($currentUser->a22)
<h2>Ejercicio</h2>
<p>Usando array_keys(...), coloque en la variable $indices los índices de $arr.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-hidePhp data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-hidePhp data-exercise>&lt;?php
		$indices = null;
</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>
@endif
