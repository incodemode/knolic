@section('content')
<h2> Resultados </h2>
<p>Felicidades, ha terminado los tests necesarios para este experimento de aprendizaje. </p>
<p>Le agradezco mucho por su apoyo en esta investigación. </p>
<p>A continuación estan sus resultados y los resultados promediados del grupo hasta el momento: </p>
<table>
	<tr  style="text-align:center;">
		<th>Test</th>
		<th style="text-align:right;padding-right:7px;">Tema</th>
		<th  style="text-align:left;width:90px;padding-left:7px;">Intentos</th>
		<th style="text-align:right;padding-right:7px;">Promedio del grupo</th>
	</tr>

	@foreach($testResults as $exercise)
		<tr>
			<td  style="text-align:center;">{{$exercise->page}}</td>
			<td style="text-align:right;">{{$exercise->subject}}</td>
			<td style="text-align:right; padding-right:60px;">{{$exercise->tries}}</td>
			<td style="text-align:right;">{{number_format($exercise->averageTries, 1, '.', ',')}}</td>
		</tr>
	@endforeach
	<tr>
		<th colspan="2"  style="text-align:right;padding-right:7px;">Sumatoria:</th>
		<td style="text-align:right; padding-right:60px;">{{$user->test_tries_sum}}</td>
		<td style="text-align:right;">{{number_format($averageTriesSum, 1, '.', ',')}}</td>
	</tr>

</table>

<p>Para ir a la página de inicio haga click <a href="{{$introductionUrl}}">aquí</a>.</p>
<p>Para ir al area de aprendizaje haga click <a href="{{$learningAreaUrl}}">aquí</a>. </p>
<p>Para ir a los tests haga click <a href="{{$testsUrl}}">aquí</a>.</p>

@stop