@section('content')

<h2>Test #5 - Busqueda</h2>
<p>Utilizando <span class="phpVariable">array_search(...)</span> busque en $arr el valor <span class="phpVariable">5</span> y coloque su índice en la variable $indice. 
	Si el valor <span class="phpVariable">5</span> no existe en $arr coloque <span class="phpVariable">"no existe"</span> en la misma variable $indice</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-hidePhp data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-hidePhp data-exercise>&lt;?php
$indice = null;



</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>



@stop