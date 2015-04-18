
	<h2>array_keys($arreglo, $valor_de_busqueda, $strict)</h2>
	<p>array_keys retorna un arreglo con las llaves que tiene $arr, por ejemplo:</p>
	<pre data-code>
&lt;?php
$arr = ['a' => 'casa', 'b' => 'perro', 'c' => 'agua', 'd' => 'perro']; 
$keys = array_keys($arr); //retornará ['a', 'b', 'c', 'd']
print_r($keys);
</pre>
@include('code.execute_panel')

<p>Cuando se utiliza con $valor_de_busqueda devolverá las llaves de los valores que sean encontrados.</p>
	<pre data-code>
&lt;?php
$arr = ['a' => 'casa', 'b' => 'perro', 'c' => 'agua', 'd' => 'perro']; 
$valor_de_busqueda = 'perro';
$keys = array_keys($arr, $valor_de_busqueda); //retornará ['b', 'd']
print_r($keys);
</pre>
@include('code.execute_panel')


<p>$strict se refiere a si valor de busqueda será evaluado con == o ===.</p>
	<pre data-code>
&lt;?php
$arr = ['a' => 1, 'b' => '1', 'c' => true]; 
$valor_de_busqueda = '1';
$keys = array_keys($arr, $valor_de_busqueda, false); //retornará ['a', 'b', 'c']
print_r( $keys );
$keysStrict = array_keys($arr, $valor_de_busqueda, true); //retornará ['c']
print_r( $keysStrict );
</pre>
@include('code.execute_panel')
