
	<h2>Declaración</h2>
	<p>Los arreglos son mapeos ordenados, un tipo básico que mapea valores a llaves.</p>
	<p>Por ejemplo, en la siguiente imagen, se puede ver un arreglo de valores vacios con las llaves <span class="phpVariable">0,1,2,3 ...</span> y asi sucesivamente.</p>
	<p style="text-align:center;">
		<a href="https://commons.wikimedia.org/wiki/File:Array1.svg" 
			title="Representación de un arreglo obtenida de Wikimedia Commons." target="_blank">
				<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Array1.svg/300px-Array1.svg.png" 
					style="display:inline;" alt="Representación de un arreglo obtenida de Wikimedia Commons."></a> 
	</p>
	<p>	Los arreglos se pueden instanciar utilizando 
			<pre data-code data-disableAlerts data-hidePhp>&lt;?php
			$arr = array( ); 
			</pre> 
		y desde php 5.4  por medio de corchetes
			<pre data-code data-disableAlerts data-hidePhp>&lt;?php
			$arr = [];
			</pre></p>
	<p>Se puede imprimir los valores de los arreglos por medio de 
		<pre data-code data-disableAlerts data-hidePhp>&lt;?php	
			print_r($arr);
		</pre></p>
	<p>Para imprimir cadenas de texto se puede usar
		<pre data-code data-disableAlerts data-hidePhp>&lt;?php	
			echo "cadena"	
		</pre></p>
	<p>Con un Punto (<span class="phpVariable">.</span>) se pueden concatenar las cadenas de texto y <span class="phpVariable">PHP_EOL</span> es una constante predefinida que contiene el salto de linea.
		<pre data-code data-disableAlerts data-hidePhp>&lt;?php	
			"una " . "cadena " . "concatenada " . PHP_EOL;
		</pre></p> </p>
<p>A continuación puedes ver un ejemplo de como se utiliza <span class="phpVariable">print_r</span>, <span class="phpVariable">echo</span> y <span class="phpVariable">PHP_EOL</span>, encontraras ejemplos como este en todo el curso.</p>
<pre data-code data-hidePhp>&lt;?php
		$arr  = [];
		$arr2 = array();
		echo 'el contenido impreso de $arr es:'.PHP_EOL;
		print_r($arr);
		echo 'el contenido impreso de $arr2 es:'.PHP_EOL;
		print_r($arr2);
</pre>
@include('code.execute_panel', ['nextUrl' => null])




<p>&nbsp;</p>
@if($currentUser->a22)
<h2>Ejercicio</h2>
<p>Declara la variable $arr como un arreglo.</p>
<div>
	<div style="width:100px;height:100px; " class="passedFront"></div>
@if(isset($exercise) && $exercise && $exercise->code)
<pre data-code data-exercise data-hidePhp data-passed="{{$exercise->passed}}">{{{$exercise->code}}}</pre>
@else
<pre data-code data-exercise data-hidePhp>&lt;?php
		$arr = null;
</pre>
@endif
@include('code.execute_panel', ['nextUrl' => $nextUrl, 'executeUrl' => URL::current()])
</div>
@endif





