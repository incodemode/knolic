
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
			altField: "#born_date, #born_date_reload_session",
			altFormat: "yy-mm-dd"
		};
	$( "#born_date_visible" ).datepicker(dateOptions);
	$( "#born_date_visible" ).keydown(function(evt){evt.preventDefault()});
	$( "#born_date_visible" ).keypress(function(evt){evt.preventDefault()});

	$( "#born_date_visible_reload_session" ).datepicker(dateOptions);
	$( "#born_date_visible_reload_session" ).keydown(function(evt){evt.preventDefault()});
	$( "#born_date_visible_reload_session" ).keypress(function(evt){evt.preventDefault()});
	var submitEvt = function(evt){
		evt.preventDefault();
		$('#inputData').validate({
			ignore: "",
			rules: {
				name : { 	required:true },
				email: { 	required:true ,
							email:true },
				born_date: {required : true,
							date:true},
				'g-recaptcha-response':{required:true}
			},
			messages: {
				name: 'Este campo es requerido',
				email: 'Debe ingresar un mail valido',
				born_date: 'Debe ingresar una fecha',
				'g-recaptcha-response': 'Por favor demuestre que no es un robot'
			}
		});

		var valid = $('#inputData').valid();
		
		if(valid){
			$('#inputData').submit();
		}
	};

	$(document).on('click', '#startSession', submitEvt);

	var reloadEvt = function(evt){
		evt.preventDefault();
		$('#reinputData').validate({
			ignore: "",
			rules: {
				email_reload_session: { 	required:true ,
							email:true },
				born_date_reload_session: {required : true,
							date:true}
			},
			messages: {
				email_reload_session: 'Debe ingresar un mail valido',
				born_date_reload_session: 'Debe ingresar una fecha'
			}
		});

		var valid = $('#reinputData').valid();
		
		if(valid){
			$('#reinputData').submit();
		}
	};

	$(document).on('click', '#reloadSession', reloadEvt);

	function checkEmailEvt(evt){
		console.log("checkEmailEvt");
		var $email = $(this);
		var $name = $('#name');
		var checkEmailUrl = $email.attr('data-checkEmailUrl');
		console.log(checkEmailUrl);
		$.post(checkEmailUrl, {'email' : $email.val()}, function(data){
			console.log('checkEmailUrl post received');
			if(data.userName!==''){
				$name.val(data.userName);
				$name.attr('disabled', 'disabled');
			}else{
				$name.removeProp('disabled');
			}
		});

	}
	$(document).on('change', '#email', checkEmailEvt);

	if($('#email').val() != ''){
		$('#email').trigger('change');
	}
});