
@section('content')

	<h2>PHP 101</h2>
	<div>
		

			<p> Antes de empezar por favor resuelva este sencillo problema de php:</p>
			<p> Si tiene las variables $a y $b, utilizando solamente una variable temporal $c intercambie los valores de $a y $b.</p>
			<p> Por ejemplo si al inicio $a = 1 y $b = 2</p>
			<p> Luego de ejecutar su código los valores quedarán como: $a = 2 y $b = 1</p>
			

					<pre id="exercise" style="height:240px;" data-restrictedEdit data-code data-exercise>
&lt;?php
//definiendo $a y $b.
$a = rand(1,10);
$b = rand(11,20);
//[inicio] su código va despues de esta linea

/* TODO, escriba su código aqui */

//[fin] su código termina en esta linea
if(  pasaTest()  ){
    echo('OK, puedes pasar a la siguiente página.');
}else{
    error_log('Ha fallado el test, intentalo de nuevo.');
}
</pre>
@include('code.execute_panel', [ 'nextUrl' => route('learn_1', ['page' => 0]),
                                'executeUrl' => route('c2_0')])
	</div>






@stop