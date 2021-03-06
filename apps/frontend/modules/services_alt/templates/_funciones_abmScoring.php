<script>
//+++++++++++++++++ AUTOCOMPLETE LOCALIDADES Y PROVINCIAS AUTOGENERADO++++++++++++++++++++++++++++//
//+++++++++++++++++ AUTOCOMPLETE LOCALIDADES Y PROVINCIAS AUTOGENERADO++++++++++++++++++++++++++++//
  agregarTelefono = function() {
        var id = 'auto_generado_'+ Math.floor((Math.random()*10000)+1);
        $(".tablaTelefonos").append('<tr class="filaTelefonoDato"><td>'+
                            '<input type="hidden" name="telefonos['+id+'][item]" class="telefonoLista" value="" id="item_'+id+'" />' +
                            '<input type="hidden" name="telefonos['+id+'][id]" class="telefonoLista" value="'+id+'" id="'+id+'" />' +
                            '<select name="telefonos['+id+'][tipo]" ><?php echo $sf_data->getRaw('optionsTiposTelefonos') ?></select></td>' +
                            '<td><select name="telefonos['+id+'][area]" ><?php echo $sf_data->getRaw('optionsCodigosArea') ?></select>' +
                            '<td><input type="text" name="telefonos['+id+'][numero]" /></td>' +
                            '<td><a class="btn" title="Eliminar" onclick=\'eliminarItem("'+id+'", "", "", "")\' ><i class="icon-remove text-error"></i></a></td>' +
                        '</tr>');
}
   agregarDomicilio = function() {
        var id = 'auto_generado_'+ Math.floor((Math.random()*10000)+1);
        $(".tablaDomicilios").append('<tr class="filaDomicilioDato colorfondo3"><td>' +
                            '<input type="hidden" name="domicilios['+id+'][item]" class="domiciliosLista" value="" id="item_'+id+'" />' +
                            '<input type="hidden" name="domicilios['+id+'][id]" class="domiciliosLista" value="'+id+'" id="'+id+'" />' +
                            '<select name="domicilios['+id+'][tipo]" ><?php echo $sf_data->getRaw('optionsTiposDomicilios') ?></select></td>' +
                            '<td><input type="text" name="domicilios['+id+'][calle]" class="domicilio_calle required"/></td>' +
                            '<td><input type="text" name="domicilios['+id+'][numero]" class="input-mini" /></td>' +
                            '<td><input type="text" name="domicilios['+id+'][cuerpo]" class="input-mini" /></td>' +
                            '<td><input type="text" name="domicilios['+id+'][piso]" class="input-mini" /></td>' +
                            '<td><input type="text" name="domicilios['+id+'][depto]" class="input-mini" /></td>' +
                            '<td><input type="text" name="domicilios['+id+'][nota]" class="domicilio_nota" /></td>' +
                           
                            '<td><a class="btn botonNew trcolor zoom" title="Limpiar campo" style="cursor: pointer" onclick="limpiarCampos(\'real\',\'datosinfo_'+id+'\',\'domicilio_real_pais_'+id+'\',\'domicilio_real_provincia_'+id+'\',\'domicilio_real_localidad_'+id+'\',\'domicilio_real_cp_'+id+'\')" ><i class="icon-trash text-info"></i></a></td>'+
                           
                            '<td><div class=""><input type="text" id="datosinfo_'+id+'" name="datosinfo['+id+'][datosinfo]" placeholder="Esciba la localidad o provincia" class="input-xxlarge datosinfo_'+id+' limpiarcampo" >'+
                            '<i id="cargando_usuarios_'+id+'" style="display:none" class="icon-spinner icon-spin icon-large"></i><div id="muestroayudabuscado_'+id+'"></div><b class="focusMensajes" id="focusMensajes" ></b></div></td>'+
                            '<input type="hidden" name="domicilios['+id+'][pais]" id="domicilio_real_pais_'+id+'"/>' +
                            '<input type="hidden" name="domicilios['+id+'][provincia]" id="domicilio_real_provincia_'+id+'"/>' +
                            '<input type="hidden" name="domicilios['+id+'][localidad]" id="domicilio_real_localidad_'+id+'"/>' +
                            '<td><select name="domicilios['+id+'][cp]" id="domicilio_real_cp_'+id+'" class="combopaginado2"></select></td>' +

                            '<td><a class="btn" title="Eliminar" onclick=\'eliminarItem("'+id+'","", "", "")\' ><i class="icon-remove text-error"></i></a></td>' +
                        '</tr>');
                    
//+++++++++++++++++ AUTOCOMPLETE LOCALIDADES Y PROVINCIAS AUTOGENERADO++++++++++++++++++++++++++++//
//+++++++++++++++++ AUTOCOMPLETE LOCALIDADES Y PROVINCIAS AUTOGENERADO++++++++++++++++++++++++++++//
$(document).ready(function(){
	    $('#datosinfo_'+id+'').keyup(function(){
        var valor_auto = $(this).val();  
        var dataString = 'valor='+valor_auto;
        console.log(valor_auto);
        $("#cargando_usuarios"+id).show();
        $.ajax({
            type: "POST",
            url: "<?php echo url_for('/services/getLocaDomi') ?>",
            data: dataString,
            success: function(data) {
                $("#muestroayudabuscado_"+id).fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
                 $("#datosinfo_"+id).addClass("trcolor");
                 $("#cargando_usuarios"+id).hide(); 
                 
                 $('.activocombo').click(function()
                 {
                    var id_auto = $(this).attr('id');
                    console.log(id_auto);
                    $("#datosinfo_"+id).val($('#'+id_auto).attr('data'));
                    $("#domicilio_real_pais_"+id).val($('#'+id_auto).attr('pais'));
					$("#domicilio_real_provincia_"+id).val($('#'+id_auto).attr('prov'));
					$("#domicilio_real_localidad_"+id).val($('#'+id_auto).attr('loc'));
                    $("#muestroayudabuscado_"+id).fadeOut(({width:200,height:200,left:0,top:0}),1000);
                    //debug//
					/*
					var verTrafico = '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>';
				    var new_alert = verTrafico+$('#'+id).attr('data')+'<div>';
				    $('.focusMensajes').prepend(new_alert);
					*/
				    //debug//
				   
				    
                     datosdetalle_auto = $("#domicilio_real_localidad_"+id).val();
					        if (datosdetalle_auto)
					        {
					        
					            //al encontrar un codigo de localidad ejecuto la function de busqueda para cod postal
					                    llenarComboCpostal_auto('<?php echo url_for('services/traeCpPorLocalidadGenerico') ?>',
											$("#domicilio_real_localidad_"+id),
											'domicilio_real_pais_'+id, 
											'domicilio_real_provincia_'+id, 
											'domicilio_real_cp_'+id
											);
					        }
                });   
          
         } });     
       
    }); 

// con esta funcion optengo el referido del punto anterior // 
    function buscarLocalidades_auto(pais_id, provincia_id,localidad_id)
      {
      	//alert(pais_id+ '->'+ provincia_id + '->'+ localidad_id);
				     	$.get("<?php echo url_for('services/getMostrarlocalidades') ?>", 
								{ 
								   domicilio_pais: pais_id, 
								   domicilio_provincia: provincia_id,
								   domicilio_localidad: localidad_id
								},
				      	function(data)
					      		{
							       info = JSON.parse(data);
							       console.log(info);
							       //por ultimo pongo la columna que quiero para mostrar en la caja typeahead
							        $("#datosinfo_"+id).val(info);						       
								   return false;
					      		});	      		
      } 
      
  llenarComboCpostal_auto = function(url, element, pais_id, provincia_id, input_cp_id, cp_predefinido)
     {
	//alert(url+ '->'+ element + '->'+ pais_id+ '->'+ provincia_id+ '->'+ input_cp_id+ '->'+ cp_predefinido);
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
				$('#'+input_cp_id).addClass("colorfondo3");
				$('#'+input_cp_id).html(data);
				if(cp_predefinido) {
					//$("#"+input_cp_id+" option[value='"+cp_predefinido+"']").attr("selected", "selected");
				}
				return true;
			},
		});
} 
});                                
}


//+++++++++++++++++ AUTOCOMPLETE LOCALIDADES Y PROVINCIAS SIN AUTOGENERADO++++++++++++++++++++++++++++//
//+++++++++++++++++ AUTOCOMPLETE LOCALIDADES Y PROVINCIAS SIN AUTOGENERADO++++++++++++++++++++++++++++//
$(document).ready(function(){    
    $('#datosinfo_<?php echo $id_unDom ?>').keyup(function(){
        var valor = $(this).val();   
        var dataString = 'valor='+valor;
        console.log(valor);
        $("#cargando_usuarios_<?php echo $id_unDom ?>").show();
        $.ajax({
            type: "POST",
            url: "<?php echo url_for('/services/getLocaDomi') ?>",
            data: dataString,
            success: function(data) {
                $('#muestroayudabuscado').fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
                 $("#datosinfo_<?php echo $id_unDom ?>").addClass("trcolor");
                 $("#cargando_usuarios_<?php echo $id_unDom ?>").hide(); 
                 
                 $('.activocombo').click(function()
                 {
                    var id = $(this).attr('id');
                    $('#datosinfo_<?php echo $id_unDom ?>').val($('#'+id).attr('data'));
                    $('#domicilio_real_pais_<?php echo $id_unDom ?>').val($('#'+id).attr('pais'));
					$('#domicilio_real_provincia_<?php echo $id_unDom ?>').val($('#'+id).attr('prov'));
					$('#domicilio_real_localidad_<?php echo $id_unDom ?>').val($('#'+id).attr('loc'));
                    $('#muestroayudabuscado').fadeOut(({width:200,height:200,left:0,top:0}),1000);
                    //debug//
					/*
					var verTrafico = '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>';
				    var new_alert = verTrafico+$('#'+id).attr('data')+'<div>';
				    $('.focusMensajes').prepend(new_alert);
					*/
				    //debug//
                     datosdetalle = $("#domicilio_real_localidad_<?php echo $id_unDom ?>").val();
					        if (datosdetalle)
					        {
					            //al encontrar un codigo de localidad ejecuto la function de busqueda para cod postal
					             mostrarCpPorLocalidadGenerico();
					        }
                });   
          
         } });     
       
    }); 
         
  function mostrarCpPorLocalidadGenerico()
      {
			      		 					$("#domicilio_real_cp_<?php echo $id_unDom ?>").addClass("colorfondo3");
											llenarComboCpostal('<?php echo url_for('services/traeCpPorLocalidadGenerico') ?>',
											$("#domicilio_real_localidad_<?php echo $id_unDom ?>"),
											'domicilio_real_pais_<?php echo $id_unDom ?>', 
											'domicilio_real_provincia_<?php echo $id_unDom ?>', 
											'domicilio_real_cp_<?php echo $id_unDom ?>');
										   return false;
      }      
           
// si viene edicion se ejecuta este llamado
<?php if (isset($unDom['ENDO_LOCA_CODIGO']) && !empty($unDom['ENDO_LOCA_CODIGO'])): ?>
buscarLocalidades
(
'<?php echo $unDom['ENDO_PAIS_CODIGO'] ?>',
'<?php echo $unDom['ENDO_PROV_CODIGO'] ?>',
'<?php echo $unDom['ENDO_LOCA_CODIGO'] ?>'
);		             
<?php endif ?>  

// con esta funcion optengo el referido del punto anterior  
    function buscarLocalidades(pais_id, provincia_id,localidad_id)
      {
      	//alert(pais_id+ '->'+ provincia_id + '->'+ localidad_id);
				     	$.get("<?php echo url_for('services/getMostrarlocalidades') ?>", 
								{ 
								   domicilio_pais: pais_id, 
								   domicilio_provincia: provincia_id,
								   domicilio_localidad: localidad_id
								},
				      	function(data)
					      		{
							       info = JSON.parse(data);
							       console.log(info);
							       //por ultimo pongo la columna que quiero para mostrar en la caja typeahead
							       $('#datosinfo_<?php echo $id_unDom ?>').val(info);
							       //$('.focusMensajes').val(info);							       
								   return false;
					      		});	      		
      } 
});

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
//cargo el codigo postal
llenarComboCpostal = function(url, element, pais_id, provincia_id, input_cp_id, cp_predefinido) 
	{
	//local = element.val();
	//alert(url+ '->'+ element + '->'+ pais_id+ '->'+ provincia_id+ '->'+ input_cp_id+ '->'+ cp_predefinido);
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
				//aqui al seleccionar un codigo postal pongo en el campo el valor seleccionado
				if(cp_predefinido) {
					$("#"+input_cp_id+" option[value='"+cp_predefinido+"']").attr("selected", "selected");
				}
				return true;
			},
		});
    }
//+++++++++++++++++ FIN AUTOCOMPLETE LOCALIDADES Y PROVINCIAS SIN AUTOGENERADO++++++++++++++++++++++++++++//
//+++++++++++++++++ FIN AUTOCOMPLETE LOCALIDADES Y PROVINCIAS SIN AUTOGENERADO++++++++++++++++++++++++++++//
</script>
