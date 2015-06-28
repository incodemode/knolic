@section('content')

<h2>Test #7 - Existencia del índice</h2>
<p>Usando array_key_exists(...), coloque en la variable $respuesta si "existe" o "no existe" el indice 3 en el array $arr.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-restrictedEdit data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-restrictedEdit data-exercise>
&lt;?php
$arr = [rand(0,1) => 'camisa', rand(2,3) => 'pantalon', rand(4,5) => 'zapatos'];
//[inicio] Escriba su respuesta despues de esta linea:

$respuesta = null;

//[fin] su código termina en esta linea
if(ejecutarTests()): echo "Excelente! puedes pasar a la siguiente página.";
else: error_log("Intentalo de nuevo.");
endif;
</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>

@stop