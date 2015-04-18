
@section('content')

	<h2>Ejericio intermedio</h2>
	<p> Por medio de este ejercicio pondra en practica los aprendido, complete las siguientes instrucciones:</p>
	<ol>
		<li> Inicialice $arr con los valores 3,$a,4,$b con sus respectivos indices 5,4,$c,$d. </li>
		<li> Inicialice $m con el valor de $arr con índice 4. </li>
		<li> Inicialice $n con true si existe el numero 5 en el arreglo $arr con in_array o false, si no existe ese valor.</li>
		<li> Inicialice $o con el indice que tiene el valor 7 en el arreglo $arr por medio de array_search.</li>
		<li> Inicialice $keys con los indices que tiene el array $arr usando array_keys.</li>
		<li> Inicialice $p con 'Sí existe!' si existe la llave 3 en el arreglo $arr con array_key_exists o 'No existe!'. </li>
	</ol>
			
			

<pre id="exercise" style="height:240px;" data-restrictedEdit data-code data-exercise>
&lt;?php
$a = algunValor();
$b = algunValor();
$c = algunValor();
$d = algunValor();
//[inicio] su código va despues de esta linea

$arr = [5 => 3, 4 => $a, $c => 4, $d => $b]; //bien
$m = $arr[4]; //bien
$n = in_array(5, $arr); //bien
$o = array_search(5, $arr); //bien
$keys = array_keys($arr); //bien
$p = array_key_exists(3, $arr); //bien
{{--
// 1.- $arr on valores 3,$a,7,$b e indices 5,4,$c,$d.
$arr = [5 => 3, 4 => $a, $c => 4, $d => $b];

// 2.- El valor con indice 4 de $arr.
$m = $respuesta;

// 3.- Verificar si existe el valor 5 en el arreglo $arr.
$n = 'Sí existe!';

// 4.- $o = indice que tiene el valor 5 en $arr.
$o = array_search();

// 5.- coloque los indices de $arr.
$keys = $respuesta;

// 6.- Verificar si existe el índice 3 en el arreglo $arr.
// if(...){
//	$p = ...
// } else{
//	$p = ...	
// }
--}}
//[fin] su código termina en esta linea
if(  pasarTests()  ){
    echo('OK, puedes pasar a la siguiente página.');
}else{
    error_log('Ha fallado algún test, intentalo de nuevo.');
}
</pre>
@include('code.execute_panel', [ 'nextUrl' => route('learn_1', ['page' => 0]),
                                'executeUrl' => route('a221')])






@stop