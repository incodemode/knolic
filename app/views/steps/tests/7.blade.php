@section('content')

<h2>Test #7 - Existencia del índice</h2>
<p>Usando <span class="phpVariable">array_key_exists(...)</span>, 
	coloque en la variable $respuesta si <span class="phpVariable">"existe"</span> o <span class="phpVariable">"no existe"</span>
	 el índice <span class="phpVariable">3</span> en el arreglo $arr.</p>
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

@stop