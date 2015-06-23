@section('content')

<h2>Test #6 - Índices</h2>
<p>Usando array_keys(...), coloque en la variable $indices los índices de $arr.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-restrictedEdit data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-restrictedEdit data-exercise>
&lt;?php

$arr = [rand(0,4) => 'valor uno', rand(5,9) => 'valor dos', rand(10,14) => 'valor tres' ];

//[inicio] Escriba su respuesta despues de esta linea:


$indices = null;


//[fin] su código termina en esta linea
if(ejecutarTests()): echo "Excelente! puedes pasar a la siguiente página.";
else: error_log("Ocurrio un error, intentelo de nuevo.");
endif;
</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>



@stop