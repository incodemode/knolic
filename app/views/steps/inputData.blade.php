@section('content')


	<h2>Ingresa tus datos</h2>
	<div>
		<div class="ui-widget" id="errorWidget" style="display:none;">
            <div style="padding: 0 .7em;" class="ui-state-error ui-corner-all">
                <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span>
                <strong id="errorTitle">Error:</strong> 
                <span id="errorContent">La fecha que ingresaste no corresponde con la fecha que ingresaste cuando 
                	utilizaste el correo por primera vez, por favor contacta al administrador.</span></p>
            </div>
        </div>
		<form action="#" method="post" id="inputData">

			<p> Todos los campos son requeridos <p>
			<p> Si estas ingresando por segunda vez, solamente coloca tu email y fecha de nacimiento </p>
			<p>
				<label for="email" style="display:block"><small>Email</small></label><input type="text" name="email" id="email" value="" size="22" />
				
			</p>
			<p>
				<label for="name" style="display:block"><small>Nombre</small></label><input type="text" name="name" id="name" value="" size="22" />
				
			</p>
			<p>
				<label for="born_date" style="display:block"><small>Fecha de nacimiento</small></label><input type="text" name="born_date_visible" id="born_date_visible" value="" size="22" />
				<input type="hidden" name="born_date" id="born_date"/>
				
			</p>
			<p>
				<a href="{{route('inputData_0')}}" title="Siguiente" style="float:right;" id="submit">Siguiente »</a>
			</p>
		</form>
	</div>


@stop