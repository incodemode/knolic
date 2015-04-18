
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

