

/* Inicialización en español para la extensión 'UI date picker' para jQuery. */
/* Traducido por Vester (xvester@gmail.com). */
jQuery(function($){
        $.datepicker.regional['es'] = {
                closeText: 'Cerrar',
                prevText: '&#x3c;Ant',
                nextText: 'Sig&#x3e;',
                currentText: 'Hoy',
                monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
                'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
                'Jul','Ago','Sep','Oct','Nov','Dic'],
                dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
                dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''};
        $.datepicker.setDefaults($.datepicker.regional['es']);
});



jQuery.validator.messages.required = "Debe Ingresar un Valor";
jQuery.validator.messages.digits = "Solo se aceptaran números";
jQuery.validator.messages.maxlength = "Cantidad superior a la aceptada";
jQuery.validator.messages.email = "Email Inválido";


$(document).ready(function(){
// por defecto marco este para que este activado uno
$(".a4").attr('checked', true);
$('#hojaTipo').val('A4');

	//$( ".datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	//$( ".datepicker" ).datepicker( "option", "altFormat", "yy-mm-dd" );
	jQuery.validator.addMethod("sololetras", function(value, element) {
		return this.optional(element) || /^[a-zA-Z_áéíóúñüÑÜÁÉÍÓÚçÇ\'\s]*$/i.test(value);
	  }, "Solo se aceptaran letras");
	  jQuery.validator.addMethod("telefonoResp1", function(value, element) {
		if(!$("#telefono_particular_1").val() && !$("#celular_1").val()) {
			return false;
		} else {
			return true;
		}
	  }, "Ingresar teléfono particular o celular");

	  jQuery.validator.addMethod("telefonoResp2", function(value, element) {
		if(!$("#telefono_particular_2").val() && !$("#celular_2").val()) {
			return false;
		} else {
			return true;
		}
	  }, "Ingresar teléfono particular o celular");
	  jQuery.validator.addMethod("solonums", function(value, element, param) {
		return value.match(new RegExp("." + param + "$"));
	  }, "Solo se aceptaran números");
	 jQuery.validator.addMethod("fechaArg",
    function(value, element) {
        // put your own logic here, this is just a (crappy) example
        return value.match(/^\d\d?\-\d\d?\-\d\d\d\d$/);
    },
    "Ingrese un formato correcto dd-mm-yyyy."
);
	jQuery.validator.addMethod("docAlumno", function(value, element) {
		if($("#tipo_documento option:selected").text().indexOf("DNI") != -1) {
			if($('#numero_documento').val().length > 8 || $('#numero_documento').val().length < 6) {
				return false;
			} else {
				return true;
			}
		}
		return true;
	  }, "El DNI deberá contener entre 6 y 8 digitos");
	  jQuery.validator.addMethod("docResp1", function(value, element) {
		if($("#tipo_documento_1 option:selected").text().indexOf("DNI") != -1) {
			if($('#nro_documento_1').val().length > 8 || $('#nro_documento_1').val().length < 6) {
				return false;
			} else {
				return true;
			}
		}
		return true;
	  }, "El DNI deberá contener entre 6 y 8 digitos");
	  jQuery.validator.addMethod("docResp2", function(value, element) {
		if($("#tipo_documento_2 option:selected").text().indexOf("DNI") != -1) {
			if($('#nro_documento_2').val().length > 8 || $('#nro_documento_2').val().length < 6) {
				return false;
			} else {
				return true;
			}
		}
		return true;
	  }, "El DNI deberá contener entre 6 y 8 digitos");
	$(".formularioValidado").validate({
			onfocusout: function(element) { $(element).valid(); } ,
			ignore: "input[type='text']:hidden",
			invalidHandler: function(e, validator) {
			},
			rules: {
				apellido: { sololetras: true },
				nombre: { sololetras: true },
				//numero_documento: { digits: true, required: false, maxlength: 12 },
				apellido_1: { sololetras: true },
				nombre_1: { sololetras: true },
				nro_documento_1: { digits: true, required: true, maxlength: 12 },
				apellido_2: { sololetras: true },
				nombre_2: { sololetras: true },
				nro_documento_2: { digits: true, required: true, maxlength: 12 },
				telefono_laboral_1: { digits: true },
				telefono_laboral_2: { digits: true },
				celular_2: { digits: true },
				celular_1: { digits: true },
				telefono_particular_1: { digits: true, telefonoResp1: true},
				telefono_particular_2: { digits: true, telefonoResp2: true}
			},
			onkeyup: false,
			messages: {
				no_nacio_fecha: {
					required: "Debe ingresar la fecha del no nacido"
				},
				selecciono_calle: {
					required: "Debe ingresar la calle"
				},
				coordenadaX: {
					required: "Debe ingresar una calle con altura o intersección"
				},
				selecciono_calle_1: {
					required: "Debe ingresar la calle"
				},
				coordenadaX_1: {
					required: "Debe ingresar una calle con altura o intersección"
				},
				selecciono_calle_2: {
					required: "Debe ingresar la calle"
				},
				coordenadaX_2: {
					required: "Debe ingresar una calle con altura o intersección"
				}
			},
			submitHandler: function(form){
				if ( $('#urlValidar').length > 0 ) {
					//alert($(".formularioValidado").serialize());
					//valido el form
					$('#spinner').show();
					$.post( $('#urlValidar').val(), $(".formularioValidado").serialize(), function( data ) {
						if(data == 1) {
							form.submit();
						} else {
							$("#flashMessages").html(data);
							$('html, body').animate({scrollTop:0}, 'slow');
							$('#flashMessages').addClass('modal modalValidar  trcolor');
						}
						$('#spinner').hide();
					});
				} else {
					form.submit();
				}
			},
			debug:true
		});


		startTableSorter();
		startTableOnlySorter();
		$(".chzn-select").chosen({no_results_text: "Sin resultados"});
		$(".datepicker").datepicker();
		
/**************PAGINADO NUEVO************************************/
	$("#paginando").on("click", function(){
		//$('#spinner').show();
		var pagina=$(this).attr("data");
		var cadena="pagina="+pagina;
		$('#pagina').val(pagina);
        cargarGrilla();
        return false;
    });
/**************PAGINADO NUEVO************************************/  

/*************NUEVA FUNCION PARA IMPRIMIR CARATULAS**************/



$("#marco").on("click", function(){
	var seleccionado = $(this).attr("value");
	$('#hojaTipo').val(seleccionado);
    //return false;
});

$("#imprimirFinal").on("click", function(){
	var URL = $("#rutacompleta").val();
	var tipoPap = $("#hojaTipo").val();
	if(tipoPap == ''){
	var mensaje = 'Marque una opcion';	
	var alert     = '<div class="alert alert-error alertar"><button type="button" class="close" data-dismiss="alert">&times;</button>';
	var new_alert = alert+mensaje+'<div>';
    $('#verificarseleccion').prepend(new_alert);
	return false;
	}
	// cierro la ventana modal
	$("#mostrarTamanohoja,.lb_overlay,.js_lb_overlay").hide();
	//alert(URL+ '->'+tipoPap);
	var URL_ARMA = URL+"/tipopapel/"+tipoPap
	console.log(URL_ARMA);
    window.open(URL_ARMA);  
    return false;
    });
   /**************ALERTA DIV ULTIMO MODIFICADO************************************/    
    $("#ultimodato").mouseenter(function(){
            var dato=$(this).attr("data");
            $("#mostrarOpcion").show({width:250,height:250,left:-25,top:-25});
            $("#mensaje").html(dato);
        });
            $("#ultimodato").mouseleave(function(){
            $("#mostrarOpcion").hide({width:200,height:200,left:0,top:0});
     });
            $("#mostrarOpcion").hide();
   /**************ALERTA DIV ULTIMO MODIFICADO************************************/   
});

function imprimirLista(datos,codigo,razon)
{
	var armarURL = datos;
	var codCliente = codigo;
	var raZon = razon;
		//alert('Seleccione el tamaño del papel a imprimir');
		$("#rutacompleta").val(armarURL);
		//$("#razonsocial").focus().after("<span>"+raZon+'('+ codCliente+')'+"</span>");

			$("#mostrarTamanohoja").lightbox_me({centered: true, onLoad: function() {
				startNewTableSorter('pagerAuditoria');
			}});
		//return false;
} 

 
/*************NUEVA FUNCION PARA IMPRIMIR CARATULAS**************/

startTableSorter = function() {
	$('table.tablesorter').each(function (i, e) {
		var myHeaders = {}
		$(this).find('th.nosort').each(function (i, e) {
			myHeaders[$(this).index()] = { sorter: false };
		});

		$(this).tablesorter({ widgets: ['zebra'], headers: myHeaders }).tablesorterPager({container: $("#pager")});
	});
}

startTableOnlySorter = function() {
	$('.onlytablesorter').each(function (i, e) {
		var myHeaders = {}
		$(this).find('th.nosort').each(function (i, e) {
			myHeaders[$(this).index()] = { sorter: false };
		});

		$(this).tablesorter({ widgets: ['zebra'], headers: myHeaders });
	});
}

startNewTableSorter = function(pager_id) {
	$('table.newtTablesorter').each(function (i, e) {
		var myHeaders = {}
		$(this).find('th.nosort').each(function (i, e) {
			myHeaders[$(this).index()] = { sorter: false };
		});

		$(this).tablesorter({ widgets: ['zebra'], headers: myHeaders }).tablesorterPager({container: $("#"+pager_id)});
	});
}

loadDatePicker = function() {
	$(".datepicker").datepicker();
}

eliminarEntidad = function(url) {
	var r=confirm("Está seguro de eliminar?")
	if (r==true) {
		location.href = url;
	}
	return false;

}
callUrl = function(url) {
	//var r=confirm("Está seguro de eliminar?")
	//if (r==true) {
		location.href = url;
	//}
	return false;

}
eliminarValor = function(url) {
	var r=confirm("Está seguro de eliminar?");
	
	if (r==true) 
	{
	

	
	 location.href = url;
    
		
	}
	
	return false;

}

updateValor = function(url) 
{
		
	 location.href = url;	
	 return false;

}


eliminarCargo = function(tipo_sociedad, codigo) {
	var r=confirm("Está seguro de eliminar?")
	if (r==true) {
		$('#tipo_sociedad').val(tipo_sociedad);
		$('#codigo').val(codigo);
		$('#listaCargos').submit();
	}
	return false;

}

function stopRKey(evt) {
	var evt = (evt) ? evt : ((event) ? event : null);
	var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
	//alert(node.name);
	if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
}

llenarComboProvinciaGenerico = function(url, element, input_provincia_id, prov_predefinida) {
	$('#spinner').show();
	$.ajax({
			url: url,
			type: "GET",
			data: { pais: element.val() },
			async: false,
			cache: false,
			timeout: 30000,
			success: function(data) {
				$('#'+input_provincia_id).html(data);
				if(prov_predefinida) {
					$("#"+input_provincia_id+" option[value='"+prov_predefinida+"']").attr("selected", "selected");
				}
				$('#spinner').hide();
				return true;

			},
			error: function(data) {
				$('#spinner').hide();
				return false;
			}
		});

}

llenarComboLocalidadGenerico = function(url, element, pais_id, input_localidad_id, loc_predefinida) {
	$('#spinner').show();
	$.ajax({
			url: url,
			type: "GET",
			data: {
				pais: $("#"+pais_id).val(),
				provincia: element.val()
			},
			async: false,
			cache: false,
			timeout: 30000,
			success: function(data) {
				$('#'+input_localidad_id).html(data);
				if(loc_predefinida) {
					$("#"+input_localidad_id+" option[value='"+loc_predefinida+"']").attr("selected", "selected");
				}
				$('#spinner').hide();
				return true;

			},
			error: function(data) {
				$('#spinner').hide();
				return false;
			}
		});
}

llenarComboCpGenerico = function(url, element, pais_id, provincia_id, input_cp_id, cp_predefinido) {
	$('#spinner').show();
	$.ajax({
			url: url,
			type: "GET",
			data: {
				pais: $("#"+pais_id).val(),
				localidad: element.val(),
				provincia: $("#"+provincia_id).val()
			},
			async: false,
			cache: false,
			timeout: 30000,
			success: function(data) {
				$('#'+input_cp_id).html(data);
				if(cp_predefinido) {
					$("#"+input_cp_id+" option[value='"+cp_predefinido+"']").attr("selected", "selected");
				}
				$('#spinner').hide();
				return true;

			},
			error: function(data) {
				$('#spinner').hide();
				return false;
			}
		});
}

eliminarItem = function(id, codigo_entidad, item, url_delete) {
	var r=confirm("Está seguro de eliminar?")
	if (r==false) {
		return true;
	}

	if(id.indexOf("auto_generado") == -1) {
		$.ajax({
			url: url_delete,
			type: "POST",
			data: { codigo_entidad : codigo_entidad, item: item },
			success: function(data) {
				if(data == "OK") {
					$("#"+id).parent().parent().remove();
				} else {
					alert("Ocurrió un error");
				}

			},
			error: function(data) {
				alert("Ocurrió un error");
			}
		});
	} else {
		$("#"+id).parent().parent().remove();
	}
}

EliminarItemActividad = function(codigo_cliente,item,url_delete){
	console.log(url_delete);
	var r=confirm("Está seguro de eliminar?")
	if (r==false) {
		return true;
	}

	$.ajax({
		url: url_delete,
		type: "POST",
		data: { codigo_cliente : codigo_cliente, item: item },
		success: function(data) {
			if(data == "OK") {
				$("#tr_"+item).remove();
			} else {
				alert("Ocurrió un error");
			}
		},
		error: function(data) {
			alert("Ocurrió un error");
		}
	});
}

eliminarItemDomicilio = function(id, codigo_entidad, item, url_delete) {
	console.log(url_delete);
	var r=confirm("Está seguro de eliminar?")
	if (r==false) {
		return true;
	}

	if(id.indexOf("auto_generado") == -1) {
		$.ajax({
			url: url_delete,
			type: "POST",
			data: { codigo_entidad : codigo_entidad, item: item },
			success: function(data) {
				if(data == "OK") {
					$("#"+id).parent().parent().remove();
				} else {
					alert("Ocurrió un error");
				}

			},
			error: function(data) {
				alert("Ocurrió un error");
			}
		});
	} else {
		$("#"+id).parent().parent().remove();
	}
}

eliminarItemTelefono = function(id, codigo_entidad, item, url_delete) {
	var r=confirm("Está seguro de eliminar?")
	if (r==false) {
		return true;
	}

	if(id.indexOf("auto_generado") == -1) {
		$.ajax({
			url: url_delete,
			type: "POST",
			data: { codigo_entidad : codigo_entidad, item: item },
			success: function(data) {
				if(data == "OK") {
					$("#"+id).parent().parent().remove();
				} else {
					alert("Ocurrió un error");
				}

			},
			error: function(data) {
				alert("Ocurrió un error");
			}
		});
	} else {
		$("#"+id).parent().parent().remove();
	}
}

eliminarItemDocumento = function(id, codigo_entidad, codigo_tipo_tel, pais, numero_tel, url_delete) {
	var r=confirm("Está seguro de eliminar?")
	if (r==false) {
		return true;
	}
	if(id.indexOf("auto_generado") == -1) {
		$.ajax({
			url: url_delete,
			type: "POST",
			data: { codigo_entidad : codigo_entidad,
					codigo_tipo_tel: codigo_tipo_tel,
					pais: pais,
					numero_tel: numero_tel
				},
			success: function(data) {
				if(data == "OK") {
					$("#"+id).parent().parent().remove();
				} else {
					alert("Ocurrió un error");
				}

			},
			error: function(data) {
				alert("Ocurrió un error");
			}
		});
	} else {
		$("#"+id).parent().parent().remove();
	}

}

eliminarItemPoder = function(id, codigo_entidad, item, codigo_tipo_poder, url_delete) {
	var r=confirm("Está seguro de eliminar?")
	if (r==false) {
		return true;
	}
	if(id.indexOf("auto_generado") == -1) {
		$.ajax({
			url: url_delete,
			type: "POST",
			data: { codigo_entidad : codigo_entidad,
					codigo_tipo_poder: codigo_tipo_poder,
					item: item
				},
			success: function(data) {
				if(data == "OK") {
					$("#"+id).parent().parent().remove();
				} else {
					alert("Ocurrió un error");
				}

			},
			error: function(data) {
				alert("Ocurrió un error");
			}
		});
	} else {
		$("#"+id).parent().parent().remove();
	}

}

eliminarRelacion = function(id, cliente, id_banco, url_delete) {
	var r=confirm("Está seguro de eliminar?")
	if (r==false) {
		return true;
	}
//	alert(cliente);
	if(id.indexOf("auto_generado") == -1) {
		$.ajax({
			url: url_delete,
			type: "POST",
			data: { cliente : cliente,
					id_banco: id_banco
				},
			success: function(data) {
				if(data == "OK") {
					$("#"+id).parent().parent().remove();
				} else {
					alert("Ocurrió un error");
				}

			},
			error: function(data) {
				alert("Ocurrió un error");
			}
		});
	} else {
		$("#"+id).parent().parent().remove();
	}

}

eliminarBanco = function(id, cliente, id_banco, url_delete) {
	var r=confirm("Está seguro de eliminar?")
	if (r==false) {
		return true;
	}
//	alert(cliente);
	if(id.indexOf("auto_generado") == -1) {
		$.ajax({
			url: url_delete,
			type: "POST",
			data: { cliente : cliente,
					id_banco: id_banco
				},
			success: function(data) {
				if(data == "OK") {
					$("#"+id).parent().parent().remove();
				} else {
					alert("Ocurrió un error");
				}

			},
			error: function(data) {
				alert("Ocurrió un error");
			}
		});
	} else {
		$("#"+id).parent().parent().remove();
	}

}


traeCuitInternacional = function(url, pais, formName, inputId) {
	$.ajax({
			url: url,
			type: "GET",
			data: {
				pais: pais
			},
			async: false,
			cache: false,
			timeout: 30000,
			success: function(data) {
				var response = JSON.parse( data );
				oStringMask = new Mask(response['mascara']);
				oStringMask.attach(document.getElementById(inputId));
				$(".mascaraCuitLabel").html(response['label'])
				return true;

			},
			error: function(data) {

				return false;
			}
		});
}


nextB = function() {
	$('#pagina').val(parseInt($('#pagina').val())+parseInt(1));
	llamadoOperaciones();
}

prevB = function() {
	$('#pagina').val(parseInt($('#pagina').val())-parseInt(1));
	llamadoOperaciones();
}

firstB = function() {
	$('#pagina').val(1);
	llamadoOperaciones();
}

lastB = function() {
	$('#pagina').val($('#total_paginas').val());
	llamadoOperaciones();
}

nextA = function() {
	$('#pagina').val(parseInt($('#pagina').val())+parseInt(1));
	llamadoAlertas();
}

prevA = function() {
	$('#pagina').val(parseInt($('#pagina').val())-parseInt(1));
	llamadoAlertas();
}

firstA = function() {
	$('#pagina').val(1);
	llamadoAlertas();
}

lastA = function() {
	$('#pagina').val($('#total_paginas').val());
	llamadoAlertas();
}


/*Nuevas*/

primeraPagina = function() {
	$('#pagina').val(1);
	cargarGrilla();
}

ultimaPagina = function() {
	$('#pagina').val($('#total_paginas').val());
	cargarGrilla();
}

prevPagina = function() {
	if($('#pagina').val() != 1) {
		$('#pagina').val(parseInt($('#pagina').val())-parseInt(1));
	}
	cargarGrilla();
}

nextPagina = function() {


	if($('#total_paginas').length > 0) {
		if($('#pagina').val() == $('#total_paginas').val()) {
			$('#pagina').val(parseInt($('#total_paginas').val()));
		} else {
			$('#pagina').val(parseInt($('#pagina').val())+parseInt(1));
		}
	} else {
		$('#pagina').val(parseInt($('#pagina').val())+parseInt(1));
	}
	cargarGrilla();
}

var keyStr = "ABCDEFGHIJKLMNOP" +
               "QRSTUVWXYZabcdef" +
               "ghijklmnopqrstuv" +
               "wxyz0123456789+/" +
               "=";

encode64 = function(input) {
     input = escape(input);
     var output = "";
     var chr1, chr2, chr3 = "";
     var enc1, enc2, enc3, enc4 = "";
     var i = 0;

     do {
        chr1 = input.charCodeAt(i++);
        chr2 = input.charCodeAt(i++);
        chr3 = input.charCodeAt(i++);

        enc1 = chr1 >> 2;
        enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
        enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
        enc4 = chr3 & 63;

        if (isNaN(chr2)) {
           enc3 = enc4 = 64;
        } else if (isNaN(chr3)) {
           enc4 = 64;
        }

        output = output +
           keyStr.charAt(enc1) +
           keyStr.charAt(enc2) +
           keyStr.charAt(enc3) +
           keyStr.charAt(enc4);
        chr1 = chr2 = chr3 = "";
        enc1 = enc2 = enc3 = enc4 = "";
     } while (i < input.length);

     return output;
  }

  function decode64(input) {
     var output = "";
     var chr1, chr2, chr3 = "";
     var enc1, enc2, enc3, enc4 = "";
     var i = 0;

     // remove all characters that are not A-Z, a-z, 0-9, +, /, or =
     var base64test = /[^A-Za-z0-9\+\/\=]/g;
     if (base64test.exec(input)) {
        alert("There were invalid base64 characters in the input text.\n" +
              "Valid base64 characters are A-Z, a-z, 0-9, '+', '/',and '='\n" +
              "Expect errors in decoding.");
     }
     input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

     do {
        enc1 = keyStr.indexOf(input.charAt(i++));
        enc2 = keyStr.indexOf(input.charAt(i++));
        enc3 = keyStr.indexOf(input.charAt(i++));
        enc4 = keyStr.indexOf(input.charAt(i++));

        chr1 = (enc1 << 2) | (enc2 >> 4);
        chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
        chr3 = ((enc3 & 3) << 6) | enc4;

        output = output + String.fromCharCode(chr1);

        if (enc3 != 64) {
           output = output + String.fromCharCode(chr2);
        }
        if (enc4 != 64) {
           output = output + String.fromCharCode(chr3);
        }

        chr1 = chr2 = chr3 = "";
        enc1 = enc2 = enc3 = enc4 = "";

     } while (i < input.length);

     return unescape(output);
  }


function alertar(mensaje)
  {
	var alert     = '<div class="alert alert-error alertar"><button type="button" class="close" data-dismiss="alert">&times;</button>';
	var new_alert = alert+mensaje+'<div>';
    $('#alertados').prepend(new_alert);
	$('#alertados .alert').alert();
}
function informar(mensaje)
  {
	var alert     = '<div class="alert alert-success alertar"><button type="button" class="close" data-dismiss="alert">&times;</button>';
	var new_alert = alert+mensaje+'<div>';
    $('#alertados').prepend(new_alert);
	$('#alertados .alert').alert();
}
function cancelar(url) {
	 location.href = url;	
	 return false;
}
function alertaDiv(mensaje){
	var alert     = '<div class="alertaDiv trcolor"><button type="button" class="close" data-dismiss="alert">&times;</button>';
	var new_alert = alert+mensaje+'</div>';
    $('#alertados').prepend(new_alert);
	$('#alertados .alert').alert();

}
   	function mostrarNombreGenerico(codigo,origen,id){

		$.ajax({
			url: '/services/traeDescripcionVarios/',
			type: "POST",
			data: { 
				    codigo : codigo,
				    parametroOrigen: origen 
				  },
			success: function(data) {
			$("#"+id).val(data);
			}
		});
    }
    /*****nueva funccion para validar formularios complicados**/
      validarForms = function (url,id_form) {
          $('#spinner').show();
          $.post(url, $("#"+id_form).serialize(), function( data ) {

            if(data == 1) {
              $("#"+id_form).submit();
            } 
            else 
            {
                    var alert     = '<div class=" text-center"><div class="panel-body"><fieldset class="tasks-list text-left"><b id="respuesta"></b></fieldset><a href="#" title="Cerrar" class="close sprited" id="close_xx"> <img src="/img/cross.png" class="zoom "  width="40px" ></a></div></div>';
                    var new_alert = alert+'<div>';
                    $('#verAlerta').html(new_alert);
                    $("#respuesta").html(data); 
                    $(".alert, .alert-error").addClass('zoom');   
                    $('html, body').animate({scrollTop:10}, 'slow');
                    $('#verAlerta').show(100);

             }
             $('#spinner').hide();
             }); 
             $("#close_xx").on("click", function()
             {
             $("#verAlerta").hide(1000);
             });      
}