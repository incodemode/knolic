@section('content')

<h2>Test #4 - Existencia</h2>
<p>Utilizando la función <span class="phpVariable">in_array(...)</span>, 
	coloque en la variable $foo <span class="phpVariable">'existe'</span> o  <span class="phpVariable">'no existe'</span> 
	dependiendo de si existe o no el valor <span class="phpVariable">5</span> dentro del arreglo $arr.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-hidePhp data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-hidePhp data-exercise>&lt;?php
$foo = null;
</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>



@stop