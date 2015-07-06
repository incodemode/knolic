
@section('content')

	<h2>PHP 101</h2>
	
		

<p> Antes de empezar por favor resuelva este sencillo problema de programación en php:</p>

<p> Si tiene las variables 
	<pre data-code data-hidePhp data-disableAlerts>&lt;?php
		$a; // y
		$b;
</pre>
Utilizando solamente una variable temporal 
<pre data-code data-hidePhp data-disableAlerts>&lt;?php
		$c;
</pre> intercambie los valores de $a y $b para que el valor de $a quede en $b y el valor de $b quede en $a.</p>

<p> Por ejemplo si al inicio 
<pre data-code data-hidePhp data-disableAlerts>&lt;?php
		$a = 1; // y
		$b = 2;
</pre></p>

<p> Luego de ejecutar su código los valores quedarán como: 
<pre data-code data-hidePhp data-disableAlerts>&lt;?php
		$a = 2; // y
		$b = 1;
</pre></p>
<p> Coloque su código aqui y presione "Ejecutar Código" para verificar su respuesta:</p>
<div>
<div class="passedFront"></div>	
@if(isset($exercise) && $exercise && $exercise->code)

<pre id="exercise" style="height:240px;" 
	data-code 
	data-hidePhp
	data-exercise 
	data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else

<pre id="exercise" style="height:240px;" 
	data-code 
	data-exercise
	data-hidePHp>&lt;?php
	$c;
	$a;
	$b;

</pre>
@endif
@include('code.execute_panel', [ 'nextUrl' => route('first_learn', ['page' => 0]),
                                'executeUrl' => route('c2_0')])
	</div>






@stop