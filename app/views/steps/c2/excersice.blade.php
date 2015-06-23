
@section('content')

	<h2>PHP 101</h2>
	
		

			<p> Antes de empezar por favor resuelva este sencillo problema de php:</p>
			<p> Si tiene las variables $a y $b, utilizando solamente una variable temporal $c intercambie los valores de $a y $b para que el valor de $a quede en $b y el valor de $b quede en $a.</p>
			<p> Por ejemplo si al inicio $a = 1 y $b = 2</p>
			<p> Luego de ejecutar su código los valores quedarán como: $a = 2 y $b = 1</p>
<div>
<div class="passedFront"></div>	
@if(isset($exercise) && $exercise && $exercise->code)

<pre id="exercise" style="height:240px;" 
	data-code 
	data-restrictedEdit 
	data-exercise 
	data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre id="exercise" style="height:240px;" 
	data-code 
	data-restrictedEdit 
	data-exercise>
&lt;?php
//definiendo $a y $b.
$a = rand(1,10);
$b = rand(11,20);
//[inicio] escriba su código de respuesta despues de esta linea

/* RESPUESTA AQUI */

//[fin] su código termina en esta linea
if(  ejecutarTest()  ){
    echo('Excelente!, puedes pasar a la siguiente página.');
}else{
    error_log('Ha fallado el test, intentalo de nuevo.');
}
</pre>
@endif
@include('code.execute_panel', [ 'nextUrl' => route('first_learn', ['page' => 0]),
                                'executeUrl' => route('c2_0')])
	</div>






@stop