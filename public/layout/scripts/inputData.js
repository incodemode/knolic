
$(document).ready(function(){

	if($('#inputData').length!=1){
		return false;
	}

	var dateOptions = {
			closeText: 'Cerrar',
			prevText: 'Anterior',
			nextText: 'Siguiente',
			currentText: 'Hoy',
			monthNames: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
			monthNamesShort: ['ene.', 'feb.', 'mar.', 'abr.', 'may.', 'jun.', 'jul.', 'ago', 'sep.', 'oct.', 'nov.', 'dic.'],
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
			yearRange: '1950:' + (new Date().getFullYear()),
			altField: "#born_date",
			altFormat: "yy-mm-dd"
		};
	$( "#born_date_visible" ).datepicker(dateOptions);
	$( "#born_date_visible" ).keydown(function(evt){evt.preventDefault()});
	$( "#born_date_visible" ).keypress(function(evt){evt.preventDefault()});
	var submitEvt = function(evt){
		evt.preventDefault();
		$('#inputData').validate({
			rules: {
				name : { 	required:true },
				email: { 	required:true ,
							email:true },
				born_date: {required : true,
							date:true}
			},
			messages: {
				name: 'Este campo es requerido',
				email: 'Debe ingresar un mail valido',
				born_date: 'Debe ingresar una fecha'
			}
		});

		var valid = $('#inputData').valid();
		
		if(valid){
			$('#inputData').submit();
		}
	};

	$(document).on('click', '#submit', submitEvt);

});