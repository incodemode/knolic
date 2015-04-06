@section('content')


  	  	<div id="content">
			<h2>Ingresa tus datos</h2>
			<div id="inputData">
				<form action="#" method="post">

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
						<input type="text" name="born_date" id="born_date" value="" size="22" />
						<label for="born_date"><small>Fecha de nacimiento</small></label>
					</p>
					<p>
						<a href="{{route('inputData_0')}}" title="Siguiente" style="float:right;">Siguiente »</a>
					</p>
				</form>
			</div>
		</div>
		<div id="column">
	      <div class="subnav">
	        <h2>Secondary Navigation</h2>
	        <ul>
	          <li><a href="#">Navigation - Level 1</a></li>
	          <li><a href="#">Navigation - Level 1</a>
	            <ul>
	              <li><a href="#">Navigation - Level 2</a></li>
	              <li><a href="#">Navigation - Level 2</a></li>
	            </ul>
	          </li>
	          <li><a href="#">Navigation - Level 1</a>
	            <ul>
	              <li><a href="#">Navigation - Level 2</a></li>
	              <li><a href="#">Navigation - Level 2</a>
	                <ul>
	                  <li><a href="#">Navigation - Level 3</a></li>
	                  <li><a href="#">Navigation - Level 3</a></li>
	                </ul>
	              </li>
	            </ul>
	          </li>
	          <li><a href="#">Navigation - Level 1</a></li>
	        </ul>
	      </div>
	    </div>

		<script>
			$(function() {
				var regionalDate = {
					closeText: 'Cerrar',
					prevText: 'Anterior',
					nextText: 'Siguiente',
					currentText: 'Hoy',
					monthNames: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
						'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
					monthNamesShort: ['ene.', 'feb.', 'mar.', 'abr.', 'may.', 'jun.',
						'jul.', 'ago', 'sep.', 'oct.', 'nov.', 'dic.'],
					dayNames: ['domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado'],
					dayNamesShort: ['do.', 'lu.', 'ma.', 'mi.', 'ju.', 'vi.', 'sá.'],
					dayNamesMin: ['D','L','M','X','J','V','S'],
					weekHeader: 'Sem.',
					dateFormat: 'dd/mm/yy',
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: false,
					yearSuffix: '',
					changeYear: true,
					changeMonth: true,
					yearRange: '1950:' + (new Date().getFullYear())
					};
				$( "#born_date" ).datepicker(regionalDate);
			});
		</script>
@stop