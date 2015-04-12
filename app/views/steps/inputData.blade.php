@section('content')


	<h2>Ingresa tus datos</h2>
	<div>
		<form action="#" method="post" id="inputData">

			<p> Todos los campos son requeridos <p>
			<p> Si estas ingresando por segunda vez, solamente coloca tu email y fecha de nacimiento </p>
			<p>
				<input type="text" name="email" id="email" value="" size="22" />
				<label for="email"><small>Email</small></label>
			</p>
			<p>
				<input type="text" name="name" id="name" value="" size="22" />
				<label for="name"><small>Nombre</small></label>
			</p>
			<p>
				<input type="text" name="born_date_visible" id="born_date_visible" value="" size="22" />
				<input type="hidden" name="born_date" id="born_date"/>
				<label for="born_date"><small>Fecha de nacimiento</small></label>
			</p>
			<p>
				<a href="{{route('inputData_0')}}" title="Siguiente" style="float:right;" id="submit">Siguiente »</a>
			</p>
		</form>
	</div>


@stop