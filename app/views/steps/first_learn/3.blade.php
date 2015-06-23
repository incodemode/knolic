
	<h2>Acceso por medio de índices</h2>

	<p>Los arrays en PHP soportan llaves de tipo string, osea que el marcador que indica en que posición esta el valor que estes buscando puede ser 'Una cadena'.</p>
	<p>La sintaxis para obtener un valor identificado por cierto indice es $arr['indice']. Por ejemplo:</p>
	<pre data-code>
&lt;?php
$arr = [0 => 'valor', 'uno' => 'otro valor'];
echo $arr[0].PHP_EOL;
echo $arr['uno'].PHP_EOL;
</pre>
@include('code.execute_panel')


<p>&nbsp;</p>
<h2>Ejercicio</h2>
<p>Coloque en la variable $a el valor con índice 3 del array $arr.</p>
<div>
	<div class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-restrictedEdit data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-restrictedEdit data-exercise>
&lt;?php
$arr = [1 => 5463, 2 => 3548, 3=> rand(1000, 5000)];
//[inicio] Escriba su respuesta despues de esta linea:

/********************************/
/***  escriba su código aqui ****/
/********************************/


//[fin] su código termina en esta linea
if(ejecutarTests()): echo "Excelente! puedes pasar a la siguiente página.";
else: error_log("Ocurrio un error, intentelo de nuevo.");
endif;
</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>


