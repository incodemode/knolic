@section('content')

<h2>Test #3 - Lectura</h2>
<p>Coloque el valor del array $arr identificado por el índice 'segundo' en la variable $foo.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-restrictedEdit data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-restrictedEdit data-exercise>
&lt;?php
$arr = ['primer_indice'=>5,   'segundo'=>rand(10,20),   'tercero'=> 35];
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