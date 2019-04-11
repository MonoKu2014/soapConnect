$(document).ready(function(){


	var required = $('.required');
	var form = $('.form');
	var error = 0;
	var message = $('#message');
	var save = $('.save');

	save.on('click', function(e){

		error = 0;

		e.preventDefault();

		required.each(function(){

			$(this).parent().removeClass('has-error').removeClass('has-success');

		  	if($(this).val().trim() == ''){

		  		error = 1;
		  		$(this).parent('div').addClass('has-error');

		  	} else {
		  		//if(validate_data_type($(this).data('validate'), $(this).val()) === true){

		  			$(this).parent('div').addClass('has-success');

		  		/*} else {
		  			error = 1;
		  			$(this).parent('div').addClass('has-error');

		  		}*/

		  	}

		});

		if(error == 1){
			message.fadeIn()
				.addClass('alert alert-danger')
				.html('<i class="fa fa-exclamation-triangle"></i> Corrige los errores que hay en el formulario');
			setTimeout(function(){
				message.fadeOut()
					.removeClass('alert alert-danger')
					.html('');
			}, 5000);
		} else {
			save.attr('disabled', true).text('guardando...');
			form.submit();
		}

	});


	/*function validate_data_type(data_type, value)
	{
		if(data_type == 'string'){

			return validate_string(value);

		} else if(data_type == 'email'){

			return validate_email(value);

		} else if(data_type == 'number'){

			return validate_number(value);

		} else {

		}
	}


	function validate_string(string)
	{
		return /^[a-zA-Z()]+$/.test(string);
	}

	function validate_email(email)
	{
    	return /\S+@\S+\.\S+/.test(email);
	}

	function validate_number(number)
	{
		return isNaN(number);
	}*/

});




function checkRut(rut) {
	// Despejar Puntos
	var valor = rut.value.replace('.','');
	// Despejar Guión
	valor = valor.replace('-','');

	// Aislar Cuerpo y Dígito Verificador
	cuerpo = valor.slice(0,-1);
	dv = valor.slice(-1).toUpperCase();

	// Formatear RUN
	rut.value = cuerpo + '-'+ dv

	// Si no cumple con el mínimo ej. (n.nnn.nnn)
	if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

	// Calcular Dígito Verificador
	suma = 0;
	multiplo = 2;

	// Para cada dígito del Cuerpo
	for(i=1;i<=cuerpo.length;i++) {

		// Obtener su Producto con el Múltiplo Correspondiente
		index = multiplo * valor.charAt(cuerpo.length - i);

		// Sumar al Contador General
		suma = suma + index;

		// Consolidar Múltiplo dentro del rango [2,7]
		if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }

	}

	// Calcular Dígito Verificador en base al Módulo 11
	dvEsperado = 11 - (suma % 11);

	// Casos Especiales (0 y K)
	dv = (dv == 'K')?10:dv;
	dv = (dv == 0)?11:dv;

	// Validar que el Cuerpo coincide con su Dígito Verificador
	if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

	// Si todo sale bien, eliminar errores (decretar que es válido)
	rut.setCustomValidity('');
}
