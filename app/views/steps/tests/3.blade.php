@section('content')

<h2>Test #3 - Lectura</h2>
<p>Coloque el valor del arreglo $arr identificado por el índice <span class="phpVariable">'segundo'</span> en la variable $foo.</p>
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