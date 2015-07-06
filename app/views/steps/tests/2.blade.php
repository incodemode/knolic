@section('content')

<h2>Test #2 - Inserción</h2>
<p>Agregue a $arr el valor <span class="phpVariable">'mangos'</span> con el índice <span class="phpVariable">3</span>.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-hidePhp data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-hidePhp data-exercise>&lt;?php  



</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>



@stop