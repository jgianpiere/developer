var msg_result;
  
(function(){

	var err_result = false;

	this.validation = function(){
		validate = function(control,rules,label){ var cad = $(control).val();
			for (i=0;i<rules.length;i++) {
				if(_trim(cad,rules_list[0].rules[rules[i]][0])){
					msg_result += '<li>'+String(rules_list[0].rules[rules[i]][1]).replace('%s',label)+"</li>";
					err_result = true;
					$('[message-resume]').html($.HTML_error_msg((msg_result||''),'msg-loginerror'));
	      				$.open_easing();
				}else{
					// ..
				}
			};
			

			return !err_result;
		}

		function _trim(cadena,reg){
			var regex = new RegExp(cadena);
			return regex.test(cadena) ? true : false;
		}

		this.start = function($form,$elems){
			$($form).on('submit',function(e){
				e.preventDefault();
				$this = $(this);
				// msg_result = ''; err_result = false; // reset
				var $$ = $($form+' '+$elems);
				$($$).each(function(i,obj){ $this = $(obj);
					var rules 	= $(obj).attr('validation').split('|');
					var label 	= obj.name;
					validate($this,rules,label);
					
					if(msg_result){
	      				$('[message-resume]').html($.HTML_error_msg((msg_result||''),'msg-loginerror'));
	      				$.open_easing();
					}
				});

				if(!err_result){
					$('[message-resume]').html('');
					$.ajax({
						type 	: 'POST',
						data 	: $this.serialize(),
						url	 	: $this.attr('action'),
						success : function(data){
							try{
								$data = $.parseJSON(data);
								console.log(data);
							}catch(e){
								window.location.href="#login_error";
								window.location.reload();
							}
						},
						error 	: function(){

						}
					})
				}else if(msg_result){
      				$('[message-resume]').html($('[message-resume]').html($.HTML_error_msg(msg_result,'msg-loginerror')));
      				$.open_easing();
				}else{
					$('[message-resume]').html('');
				}
			})

		}
	}

	var _init = new validation();
	var elems = '[validation]';
	var conts = '#miform';
	_init.start(conts,elems);

	var rules_list = [{
			rules : {
				required 	: [
					'/^\s*$/',
					'el campo %s es requerido'
				],
				number 		: [
					'/[0-9]$/',
					'el campo %s debe ser un numero'
				],
				alpha 		: [
					'^[a-zA-Z_áéíóúñ\s]*$',
					'el campo %s debe contener palabras'
				],
				alpha_number: [
					'/^([a-z]|[0-9])+$/i',
					'el campo %s debe contener palabras y/o numeros'
				],
				email 		: [
					'/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/',
					'el campo %s debe ser un E-mail valido'
				],
				trim 		: [
					'call Rfunction',
					'el campo %s debe ser un E-mail valido'
				],
				xss_clean 	: [
					'/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/',
					'el campo %s debe ser un E-mail valido'
				],
				float 		: [
					'/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/',
					'el campo %s debe ser un E-mail valido'
				]
			}
		}];



// Functions validations
	
$.validarNombre=function(valor,mensaje){
	v=valor.val();
	if(v.length > 2){
	return true;
	}else{
	console.log(mensaje);
	valor.focus();
	return false;
	}
}

$.validarNumeros=function(valor,mensaje){
	v=valor.val();
	if(/^([0-9]{2})*\.([0-9]{2})$/.test(v)){
		return true;
	}else{
		console.log(mensaje);
		valor.focus();
		return false;		
	}
}
$.validarDigitos=function(valor,mensaje,numero){
	v=valor.val();
	
	if(v.length == numero){
		if(/^[0-9]+$/.test(v)){
			return true;
		}else{
			console.log("Ingrese solo Números");
			valor.focus();
			return false;		
		}
	}else{ 
		console.log(mensaje);
		valor.focus();
		return false;
	}
}

$.validarTelefono=function(valor){
	v=valor.val();
	c=v.charAt(0);
	if (/^[0-9]+$/.test(v) & v.length >= 9 & v.length <10  & (c==6 || c==8 || c==9) ){
	return true;
	}else{
	console.log("Ingrese número correcto");
	valor.focus();
	return false;
	}
}

$.validarEmail=function(valor){
	if (/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/.test(valor.val())){
	return true;
	} else {
	console.log("Ingrese email correcto");
	valor.focus();
	return false;
	}
}


$.validarCombo=function(valor,mensaje){
	if (valor.val() != "0"){
	return true;
	}else{
	console.log(mensaje);
	valor.focus();
	return false;
	}
}

	
$.validarPolitica=function(valor){
	if(!valor.is(':checked')){
	console.log("Acepte la politica de privacidad");
	valor.focus();
	return false;
	}else{
	return true
	}
}

})(jQuery);

// tipes inputs ..
(function(){
	// validacion de inputs numericos
	var special_keys = [13,8,9,39,37];
	var special_char = [46] 
	$('input[type="number"]').on('keypress',function(e){ $$ = $(this); 
		return parseInt(e.key) ? true : ($.inArray(e.keyCode,special_keys) > -1 ? true : ($.inArray(e.charCode,special_char) > -1 && $$.val().length > 0 && $$.val().indexOf('.') == -1  ) ? true : false);
	});
})(jQuery);





