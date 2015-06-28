
	<h2>Definición</h2>
	<p>Los arrays son mapeos ordenados, un tipo básico que mapea valores a llaves.</p>
	<p>Los arrays se pueden instanciar utilizando array( ) y desde php 5.4  por medio de corchetes [ ]:</p>
	
<pre data-code>
&lt;?php
$arr  = [];
$arr2 = array();

print_r($arr);
print_r($arr2);
</pre>
@include('code.execute_panel', ['nextUrl' => null])
<p>Un array es una colección ordenada de valores indizada por llaves.</p>
<p>Se puede imprimir los valores de los arreglos por medio de print_r($arr);</p>
<p>&nbsp;</p>



@if($currentUser->a22)
<h2>Ejercicio</h2>
<p>Inicialice la variable $arr como un array.</p>
<div>
	<div style="width:100px;height:100px; " class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-restrictedEdit data-exercise data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-restrictedEdit data-exercise>
&lt;?php
//[inicio] Escriba su respuesta despues de esta linea:

$arr = null;

//[fin] su código termina en esta linea
if(ejecutarTests()): echo "Excelente! puedes pasar a la siguiente página.";
else: error_log("Error, intentelo de nuevo.");
endif;
</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>
@endif





