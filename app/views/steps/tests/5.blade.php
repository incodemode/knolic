@section('content')

<h2>Test #5 - Busqueda</h2>
<p>Utilizando array_search busque en $arr el valor 5 y coloque su índice en la variable $indice. 
	Si el valor 5 no existe en $arr coloque "no existe" en la misma variable $indice</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-restrictedEdit data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-restrictedEdit data-exercise>
&lt;?php

$arr = ['primero' => rand(0,5),   'segundo' => rand(0,5),   'tercero' =>  rand(0,5)];

//[inicio] Escriba su respuesta despues de esta linea:


$indice = null;


//[fin] su código termina en esta linea
if(ejecutarTests()): echo "Excelente! puedes pasar a la siguiente página.";
else: error_log("Ocurrio un error, intentelo de nuevo.");
endif;
</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>



@stop