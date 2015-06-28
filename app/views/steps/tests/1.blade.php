@section('content')

<h2>Test #1 - Inicialización</h2>
<p>Inicialize la variable $arr como un array con los valores 'arbol', 'flor' y sus índices 1, 2 respectivamente.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-restrictedEdit data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-restrictedEdit data-exercise>
&lt;?php
//[inicio] Escriba su respuesta despues de esta linea:


$arr = [null];


//[fin] su código termina en esta linea
if(ejecutarTests()): echo "Excelente! puedes pasar a la siguiente página.";
else: error_log("Ocurrio un error, intentelo de nuevo.");
endif;
</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>



@stop