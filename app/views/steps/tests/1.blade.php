@section('content')

<h2>Test #1 - Inicialización</h2>
<p>Inicialize la variable $arr como un arreglo con los valores 
	<span class="phpVariable">'arbol'</span>, <span class="phpVariable">'flor'</span> 
	y sus índices <span class="phpVariable">1</span>, <span class="phpVariable">2</span> respectivamente.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-hidePhp data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-hidePhp data-exercise>&lt;?php
$arr = null;

</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>



@stop