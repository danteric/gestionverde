<script>
//+++++++++++++++++ AUTOGENERADO PRORROGAS++++++++++++++++++++++++++++//
agregarProrroga = function() {
        var id = 'auto_generado_'+ Math.floor((Math.random()*10000)+1);
        $(".tablaProrrogas").append('<tr class="trFilas"><td>'+
                            '<input type="hidden" name="prorrogas['+id+'][id]" value="'+id+'" id="'+id+'" />' +
                            '<input type="text" class="datepicker input-small" name="prorrogas['+id+'][venci]" /></td>' +
                            '<td><input type="text"  class="input-large" name="prorrogas['+id+'][otorga]" /></td>' +
                            '<td style="text-align: center;"><a class="btn btn-mini btn-danger" title="Eliminar" onclick=\'eliminarItem("'+id+'", "", "", "")\' ><i class="icon-trash"></i></a></td>' +
                        '</tr>');
}
//+++++++++++++++++ AUTOGENERADO FIRMANTES++++++++++++++++++++++++++++//
agregarFirmantes = function() {
        var id = 'auto_generado_'+ Math.floor((Math.random()*10000)+1);
        $(".tablaFirmantes").append('<tr class="trFilas"><td>'+
                            '<input type="hidden" name="firmantes['+id+'][id]" value="'+id+'" id="'+id+'" />' +
                            '<input type="text" class="input-large" name="firmantes['+id+'][apellido]" /></td>' +
                            '<td><input type="text" class="input-large" name="firmantes['+id+'][nombre]" /></td>' +
                            '<td><input type="text" class="input-large" name="firmantes['+id+'][cargo]" /></td>' +
                            '<td style="text-align: center;"><a class="btn btn-mini btn-danger" title="Eliminar" onclick=\'eliminarItem("'+id+'", "", "", "")\' ><i class="icon-trash"></i></a></td>' +
                        '</tr>');
}
//+++++++++++++++++ AUTOGENERADO PEDIDO DE INFORMES++++++++++++++++++++++++++++//
agregarPedido_informes = function() {
        var id = 'auto_generado_'+ Math.floor((Math.random()*10000)+1);
        $(".tablaPedido_informes").append('<tr class="trFilas"><td>'+
                            '<input type="hidden" name="pedidoinfo['+id+'][id]" value="'+id+'" id="'+id+'" />' +
                            '<fieldset disabled><input type="text" class="input-mini" style="background-color: #EEE" name="pedidoinfo['+id+'][item]" /></fieldset></td>' +
                            '<td class="esconderCargando"><?php $optionsSelect = $sf_data->getRaw('tipo_informes'); ?><select name="pedidoinfo['+id+'][tipo_informe]" class="required input-medium tipo_informe" ><?php foreach ($optionsSelect as $arraySelect) { ?><option <?php if($row["REQI_TIPO_INFOR"] == $arraySelect["RQIT_REQI_TIPO_INFOR"]){ echo "selected"; } ?> value="<?php echo $arraySelect["RQIT_REQI_TIPO_INFOR"] ?>"><?php echo $arraySelect["RQIT_DESCRIPCION"] ?></option><?php } ?></select></td>'+
                            
                            '<td><div id="cargando_iconPedido_informesAuto" style="display: none" class=""><i class="icon-spinner icon-spin icon-large text-error"></i></div><input type="text" class="input-small cliente" name="pedidoinfo['+id+'][cliente]"  />' +
                            
                            '<input type="text" class="input-large apellido" name="pedidoinfo['+id+'][apellido]" />' +
                            
                            '<input type="text" class="input-small periodo_desde" name="pedidoinfo['+id+'][periodo_desde]" style="display:none;"/>' +
                            
                            '<input type="text" class="input-small periodo_hasta" name="pedidoinfo['+id+'][periodo_hasta]" style="display:none;"/>' +
                            
                            '<input type="text" class="input-xlarge soli_info" name="pedidoinfo['+id+'][soli_info]" style="display:none;"/></td>' +
                            
                            '<td><?php $optionsSelect = $sf_data->getRaw('tipo_asignados');  ?><select  name="pedidoinfo['+id+'][asignados]" class="required input-medium" ><?php foreach ($optionsSelect as $arraySelect) { ?><option <?php if($row['REQI_USR_ASIGNADO'] == $arraySelect["USUA_NOMBRE"]){ echo "selected"; } ?> value="<?php echo $arraySelect["USUA_NOMBRE"] ?>"><?php echo $arraySelect["DESCRIPCION"] ?></option><?php } ?></select></td>' +
                            
                            '<td><fieldset disabled><input type="text" name="pedidoinfo['+id+'][estado]"  value="<?php echo $row['ESTADO'] ?>"  class="input-small " style="background-color: <?php echo $row['ESTADO_COLOR'] ?>"/></fieldset></td>' +
                            '<td><fieldset disabled><input type="text"  class="input-small" name="pedidoinfo['+id+'][ultimo_mov]" value="<?php echo date("d/m/Y",strtotime(date("H.i.s"))) ?>" style="background-color: #EEE"></fieldset></td>' +
                            '<td style="text-align: center;"><a class="btn btn-mini btn-danger" title="Eliminar" onclick=\'eliminarItem("'+id+'", "", "", "")\' ><i class="icon-trash"></i></a></td>' +
                        '</tr>');
        
        //aqui muestro el cliente/periodos cuando cambio tipo de informe               
      	$(".tipo_informe").change(function()
	    {
	    $('#cargando_iconPedido_informesAuto').show();
		if( $(this).val() == "C" ){
		    
			 $(".cliente,.apellido").show();
			 $(".periodo_desde,.periodo_hasta,.soli_info").hide();	
			return false;
		}	
		if( $(this).val() == "P" ){
			$(".periodo_desde,.periodo_hasta").show();
			$(".cliente,.apellido,.soli_info").hide();	
			return false;  
		}	
	    if( $(this).val() == "I" ){
			$(".soli_info").show();
			$(".cliente,.apellido,.periodo_desde,.periodo_hasta").hide();
			return false; 
		}
		return false;
			
});  
            // cuando salgo de esta clase css escondo el cargando
            $(".esconderCargando").mouseleave(function(){
            $('#cargando_iconPedido_informesAuto').hide();
            return false;
            });
                
}

/***************************PRORROGAS****************************************/
eliminarItemProrroga = function(codigo, vencimiento, url_delete,id_borrar) {
	console.log(id_borrar);
	$('#alertBoxesFirmantes').hide(300);
	$('#alertBoxesProrrogas').show(300);
	var timeSlide = 1000;
	$('#timer').fadeIn(300);
	var r=confirm("Estas seguro de eliminar?")
	if (r==false) {
		return true;
	}

	if(id_borrar.indexOf("auto_generado") == -1) {
		$.ajax({
			url: url_delete,
			type: "POST",
			data: { codigo : codigo, venci: vencimiento },
			success: function(data) {
				if(data == "OK") {
					            //informar('Eliminado correctamente');
					            $(".borrarFila_"+id_borrar).hide({width:200,height:200,left:0,top:0});
						    	$('#alertBoxesProrrogas').html('<div class="box-success"></div>');
								$('.box-success').hide(0).html('Espera un momento&#133;');
								$('.box-success').slideDown(timeSlide);
								setTimeout(function(){
									$('#alertBoxesProrrogas').html('<div class="box-success"></div>');
									$('.box-success').show(0).html('Eliminado correctamente: ' + data);
									$('.prorro').removeClass("trcolor");
								},(timeSlide + 500));
				} else {
					            //alert("Ocurrió un error");
					  	    	$('#alertBoxesProrrogas').html('<div class="box-error"></div>');
								$('.box-error').hide(0).html('Ocurrió un error');
								$('.prorro').addClass("trcolor");
								$('.box-error').slideDown(timeSlide);
				}
			},
			error: function(data) {
				                //alert("Ocurrió un error");
								$('#alertBoxesProrrogas').html('<div class="box-error"></div>');
								$('.box-error').hide(0).html('Ocurrió un error');
								$('.prorro').addClass("trcolor");
								$('.box-error').slideDown(timeSlide);
			}
		});
	} else {
		$("#"+id_borrar).parent().parent().remove();
	}
}  
/***************************FIRMANTES****************************************/
eliminarItemFirmante = function(codigo, item, url_delete,id_borrar) {
	console.log(id_borrar);
	
	$('#alertBoxesProrrogas').fadeOut(300);
	$('#alertBoxesFirmantes').show(300);
	var timeSlide = 1000;
	$('#timer').fadeIn(300);
	$('.box-success,.box-error').slideUp(timeSlide);
	
	var r=confirm("Está seguro de eliminar?")
	if (r==false) {
		return true;
	}

	if(id_borrar.indexOf("auto_generado") == -1) {
		$.ajax({
			url: url_delete,
			type: "POST",
			data: { codigo : codigo, item: item },
			success: function(data) {
				//alert(data);
				if(data == "OK") {
						            //informar('Eliminado correctamente');
		    						$('#alertBoxesFirmantes').html('<div class="box-success"></div>');
									$('.box-success').hide(0).html('Espera un momento&#133;');
									$('.box-success').slideDown(timeSlide);
									setTimeout(function(){
										$('#alertBoxesFirmantes').html('<div class="box-success"></div>');
										$('.box-success').show(0).html('Eliminado correctamente: ' + data);
										$('.firma').removeClass("trcolor");
									},(timeSlide + 500));
						            $(".borrarFila_"+id_borrar).hide({width:200,height:200,left:0,top:0});
								} 
								else 
								{
									//alert("Ocurrió un error");
									$('#alertBoxesFirmantes').html('<div class="box-error"></div>');
									$('.box-error').hide(0).html('Ocurrió un error');
									$('.firma').addClass("trcolor");
									$('.box-error').slideDown(timeSlide);
								}
			},
			error: function(data) {
								//alert("Ocurrió un error");
					    		$('#alertBoxesFirmantes').html('<div class="box-error"></div>');
								$('.box-error').hide(0).html('Ocurrió un error');
								$('.firma').addClass("trcolor");
								$('.box-error').slideDown(timeSlide);
			}
		});
	} else {
		$("#"+id_borrar).parent().parent().remove();
	}
}  
/***************************PRORROGAS****************************************/
guardarProrrogas = function () {
	$('#cargando_iconProrrogas').show();
	$('#alertBoxesFirmantes').hide(300);
	$('#alertBoxesProrrogas').show(300);
	var timeSlide = 1000;
	$('#timer').fadeIn(300);
	$('.box-success,.box-error').slideUp(timeSlide);
     var form = $("#valoresProrrogas").serialize();
    	$.post('<?php echo url_for('adminRequerimientos/amRequer') ?>',form,function(data){
    		if(data != "OK") {
	    						$('#alertBoxesProrrogas').html('<div class="box-error"></div>');
								$('.box-error').hide(0).html('Error: ' + data);
								$('.prorro').addClass("trcolor");
								$('.box-error').slideDown(timeSlide);
    						 }else{
	    						$('#alertBoxesProrrogas').html('<div class="box-success"></div>');
								$('.box-success').hide(0).html('Espera un momento&#133;');
								$('.box-success').slideDown(timeSlide);
								setTimeout(function(){
									$('#alertBoxesProrrogas').html('<div class="box-success"></div>');
									$('.box-success').show(0).html('Resultado: ' + data);
									$('.prorro').removeClass("trcolor");
								},(timeSlide + 500));
    						 }
    						 $('#cargando_iconProrrogas').hide();
    						 return false;
    	});
    	
    	$('#timer').fadeOut(300);
    	$('#timer').css('display','none');
    	
    	$('.trFilas').click(function(){
		$('.box-error').fadeOut(300);
		$('.box-error').slideUp(timeSlide);
    	
    	});
    	return false;
}
/***************************FIRMANTES****************************************/
guardarFirmantes = function () {
	$('#cargando_iconFirmantes').show(1000);
	$('#alertBoxesProrrogas').fadeOut(300);
	$('#alertBoxesFirmantes').show(300);
	var timeSlide = 1000;
	$('#timer').fadeIn(300);
	$('.box-success,.box-error').slideUp(timeSlide);
     var form = $("#valoresFirmantes").serialize();
    	$.post('<?php echo url_for('adminRequerimientos/amRequer') ?>',form,function(data){
    		if(data != "OK") {
	    						$('#alertBoxesFirmantes').html('<div class="box-error"></div>');
								$('.box-error').hide(0).html('Error: ' + data);
								$('.firma').addClass("trcolor");
								$('.box-error').slideDown(timeSlide);
    						 }else{
	    						$('#alertBoxesFirmantes').html('<div class="box-success"></div>');
								$('.box-success').hide(0).html('Espera un momento&#133;');
								$('.box-success').slideDown(timeSlide);
								setTimeout(function(){
									$('#alertBoxesFirmantes').html('<div class="box-success"></div>');
									$('.box-success').show(0).html('Resultado: ' + data);
									$('.firma').removeClass("trcolor");
								},(timeSlide + 500));
    						 }
    						 $('#cargando_iconFirmantes').hide(1000);
    						 return false;
    	});
    	
    	$('#timer').fadeOut(300);
    	$('#timer').css('display','none');
    	
    	$('.trFilas').click(function(){
		$('.box-error').fadeOut(300);
		$('.box-error').slideUp(timeSlide);
    	
    	});
    	return false;
}

/***************************GENERALES****************************************/
guardarGenerales = function () {
	$('#cargando_iconGenerales').show(1000);
}

/***************************PEDIDO DE INFORMES********************************/
guardarPedido_informes = function () {

	$('#cargando_iconPedido_informes').show();
	$('#alertBoxesPedido_informes').hide(300);
	$('#alertBoxesPedido_informes').show(300);
	var timeSlide = 1000;
	$('#timer').fadeIn(300);
	$('.box-success,.box-error').slideUp(timeSlide);
     var form = $("#valoresPedido_informes").serialize();
     //alert(form);
    	$.post('<?php echo url_for('adminRequerimientos/amRequer') ?>',form,function(data){
    		if(data != "OK") {
	    						$('#alertBoxesPedido_informes').html('<div class="box-error"></div>');
								$('.box-error').hide(0).html('Error: ' + data);
								$('.pedido_inf').addClass("trcolor");
								$('.box-error').slideDown(timeSlide);
    						 }else{
	    						$('#alertBoxesPedido_informes').html('<div class="box-success"></div>');
								$('.box-success').hide(0).html('Espera un momento&#133;');
								$('.box-success').slideDown(timeSlide);
								setTimeout(function(){
									$('#alertBoxesPedido_informes').html('<div class="box-success"></div>');
									$('.box-success').show(0).html('Resultado: ' + data);
									$('.pedido_inf').removeClass("trcolor");
								},(timeSlide + 500));
    						 }
    						 $('#cargando_iconPedido_informes').hide();
    						 return false;
    	});
    	
    	$('#timer').fadeOut(300);
    	$('#timer').css('display','none');
    	
    	$('.trFilas').click(function(){
		$('.box-error').fadeOut(300);
		$('.box-error').slideUp(timeSlide);
    	
    	});
    	return false;
}  
/***************************PEDIDO DE INFORMES****************************************/
eliminarItemPedioInfo = function(codigo, item, url_delete,id_borrar) {
	console.log(id_borrar);

	$('#alertBoxesPedido_informes').show(300);
	var timeSlide = 1000;
	$('#timer').fadeIn(300);
	$('.box-success,.box-error').slideUp(timeSlide);
	
	var r=confirm("Está seguro de eliminar?")
	if (r==false) {
		return true;
	}

	if(id_borrar.indexOf("auto_generado") == -1) {
		$.ajax({
			url: url_delete,
			type: "POST",
			data: { codigo : codigo, item: item },
			success: function(data) {
				//alert(data);
				if(data == "OK") {
						            //informar('Eliminado correctamente');
		    						$('#alertBoxesPedido_informes').html('<div class="box-success"></div>');
									$('.box-success').hide(0).html('Espera un momento&#133;');
									$('.box-success').slideDown(timeSlide);
									setTimeout(function(){
										$('#alertBoxesPedido_informes').html('<div class="box-success"></div>');
										$('.box-success').show(0).html('Eliminado correctamente: ' + data);
										$('.pedido_inf').removeClass("trcolor");
									},(timeSlide + 500));
						            $(".borrarFila_"+id_borrar).hide({width:200,height:200,left:0,top:0});
								} 
								else 
								{
									//alert("Ocurrió un error");
									$('#alertBoxesPedido_informes').html('<div class="box-error"></div>');
									$('.box-error').hide(0).html('Ocurrió un error');
									$('.pedido_inf').addClass("trcolor");
									$('.box-error').slideDown(timeSlide);
								}
			},
			error: function(data) {
								//alert("Ocurrió un error");
					    		$('#alertBoxesPedido_informes').html('<div class="box-error"></div>');
								$('.box-error').hide(0).html('Ocurrió un error');
								$('.pedido_inf').addClass("trcolor");
								$('.box-error').slideDown(timeSlide);
			}
		});
	} else {
		$("#"+id_borrar).parent().parent().remove();
	}
}  

/***************************PEDIDO DE INFORMACION********************************/

generarPedido_informacion = function(codigo,item,url) {
        //alert(codigo+item+url);
        $('#spinner').show();
        $('#pedido_informacion').fadeIn(1600);
        $.post(url,
        { 
         codigo: codigo,
         item  : item
        }, 
         function(data){
                $('#cargar_pedido_informacion').html(data);
                startTableOnlySorter();
                $('#spinner').hide();
         });
      
    }

/***************************PEDIDO DE INFORMACION********************************/
guardarPedido_informacion = function () {
    $('#cargando_iconPedido_informacion').show(1000);
}    


  
$(document).ready(function () 
{
	$(".limpiarcampo").keyup(function()
	    {
		if( $(this).val() != "" ){
			$(".error").fadeOut();			
			return false;
		}		
});

$("#datosinfo_<?php echo $id_unDom ?>").keyup(function()
	{
		if($(this).val() != "" ){
			$('#datosinfo_<?php echo $id_unDom ?>').addClass('real');
			$('#datosinfolegal').removeClass('legal');
			return false;
		}		
	});
	

})

function limpiarCampos(accion,datosinfo_id,pais_id,provincia_id,localidad_id,cp_id)
	{
	//alert(accion+ '->'+ datosinfo_id + '->'+ pais_id + '->'+ provincia_id + '->'+ localidad_id + '->'+ cp_id);
	//recibo los parametros del formulario para resetear
		if(accion == 'real'){
			$("#"+datosinfo_id).val('');
			$("#"+pais_id).val('');
			$("#"+provincia_id).val('');
			$("#"+localidad_id).val('');
			$("#"+cp_id).empty();
			$(".error").fadeOut();
			$("#"+datosinfo_id).focus();
		}	
	}


</script>
