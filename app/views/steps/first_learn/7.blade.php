
	<h2>array_key_exists ( $indice_a_buscar ,  $arreglo )</h2>
	<p>array_key_exists retorna un boleano true o false dependiendo de si el $indice_a_buscar existe en $arreglo. </p>
	<p>Esta función es muy util cuando necesitas verificar que cierto array tiene un indice para decidir si muestras o no un valor.</p>
	
	<pre data-code>
&lt;?php
$arr = ['a' => 'casa', 'b' => 'teco', 'c' => 'taco'];
$existeB = array_key_exists('b', $arr);
if($existeB){
	echo "Sí Existe b en el arreglo y su valor es '{$arr['b']}'".PHP_EOL;
}else{
	echo "No Existe b en el arreglo".PHP_EOL;
}

$existeD = array_key_exists('d', $arr);
if($existeD){
	echo "Sí Existe d en el arreglo y su valor es '{$arr['d']}'".PHP_EOL;
}else{
	echo "No Existe d en el arreglo".PHP_EOL;
}
</pre>
@include('code.execute_panel')