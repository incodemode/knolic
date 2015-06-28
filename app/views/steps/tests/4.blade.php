@section('content')

<h2>Test #4 - Existencia</h2>
<p>Utilizando la función in_array(), coloque en la variable $foo 'existe' o  'no existe' dependiendo de si existe o no el valor 5 dentro del array $arr.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-restrictedEdit data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-restrictedEdit data-exercise>
&lt;?php

$arr = [rand(0,10),    rand(0,10),     rand(0,10),     rand(0,10)];

//[inicio] Escriba su respuesta despues de esta linea:


$foo = null;


//[fin] su código termina en esta linea
if(ejecutarTests()): echo "Excelente! puedes pasar a la siguiente página.";
else: error_log("Ocurrio un error, intentelo de nuevo.");
endif;
</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>



@stop