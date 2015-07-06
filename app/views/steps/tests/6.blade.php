@section('content')

<h2>Test #6 - Índices</h2>
<p>Usando <span class="phpVariable">array_keys(...)</span>, coloque en la variable $indices los índices de $arr.</p>
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



@stop