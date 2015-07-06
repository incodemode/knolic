
	<h2>Acceso por medio de índices</h2>

	
	<p>La sintaxis para obtener un valor identificado por cierto índice es:
		<pre data-code data-hidePhp data-disableAlerts>&lt;?php
			$valor = $arr['indice'];
</pre>Por ejemplo, si queremos obtener los valores con llaves <span class="phpVariable">0</span> y <span class="phpVariable">'uno'</span> de <span class="phpVariable">$arr</span>, este sería el código:</p>
	<pre data-code data-hidePhp>&lt;?php
		$arr = [0 => 'un valor', 'uno' => 'otro valor'];
		echo $arr[0].PHP_EOL;
		echo $arr['uno'].PHP_EOL;
</pre>
@include('code.execute_panel')


<p>&nbsp;</p>



@if($currentUser->a22)
<h2>Ejercicio</h2>
<p>Coloque en la variable $a el valor con índice <span class="phpVariable">3</span> del arreglo $arr.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-hidePhp data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-hidePhp data-exercise>&lt;?php
		$a = null;
</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>

@endif
