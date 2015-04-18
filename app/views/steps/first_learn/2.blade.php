
	<h2>Inicialización</h2>
	
	<p>A los arreglos se les pueden ingresar datos de muchas formas, la más sencilla es inicializar la variable con los valores y sin llaves:</p>

	<pre class="code" style="height: 75px;" data-code>
&lt;?php
$arr  =      ['valor 1', 'valor 2', 'valor n'];
$arr2 = array('valor 1', 'valor 2', 'valor n');
//ambos arreglos son equivalentes.
print_r($arr);
print_r($arr2);
</pre>
@include('code.execute_panel')
<p>Tambien se pueden inicializar con todo y llaves: </p>
	<pre class="code" style="height: 165px;" data-code>
&lt;?php
$arr = [
	'llave' => 'valor',
	'llave_n' => 'valor n',
	'0' => 'otro valor',
	1 => 'el ultimo valor',
];
//Este array tiene 4 valores indexados por cuatro llaves.
//Los cuatro valores son: 'valor', 'valor n', 'otro valor' y 'el ultimo valor'.
//Sus llaves son: 'llave', 'llave_n', '0' y 1 respectivamente.
print_r($arr);
</pre>
@include('code.execute_panel')
<p>Otra forma de ingresar data en los arreglos es utilizando el operador de asignación $variable[] = 'valor' o $variable['llave'] = 'valor'.
	<pre class="code" style="height: 165px;" data-code>
&lt;?php
$arr = []; //inicialización, en PHP no es necesario 
           //pero lo hacemos para que el código sea más entendible

//la primer llave será generada automaticamente.
$arr[] = 'Primer valor del array'; 
//la llave para accesar este valor será 'llave'.
$arr['llave'] = 'Segundo valor'; 
// la ultima llave será 2
$arr[2] = 'Tercer valor'; 
	
//Este array tiene 3 valores indexados por tres llaves.
//Los cuatro valores son: 'Primer valor', 'Segundo valor' y 'Valor n'.
//Sus llaves son: 0 que fue asignada por el sistema, 'llave' y 2 respectivamente.
print_r($arr);
</pre>
@include('code.execute_panel')
	