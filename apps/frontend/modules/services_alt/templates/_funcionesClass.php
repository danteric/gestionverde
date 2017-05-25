<script>
//+++++++++++++++++ AUTOCOMPLETE LOCALIDADES Y PROVINCIAS++++++++++++++++++++++++++++//
//+++++++++++++++++ AUTOCOMPLETE LOCALIDADES Y PROVINCIAS++++++++++++++++++++++++++++//
$(document).ready(function(){

	    $('#datosinforeal').keyup(function(){
        var valor = $(this).val();   
        var dataString = 'valor='+valor;
        console.log(valor);
        $("#cargando_usuarios").show();
        $.ajax({
            type: "POST",
            url: "<?php echo url_for('/services/getLocaDomi') ?>",
            data: dataString,
            success: function(data) {
                $('#muestroayudabuscado').fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
                 $("#datosinforeal").addClass("trcolor");
                 $("#cargando_usuarios").hide(); 
                 
                 $('.activocombo').click(function()
                 {
                    var id = $(this).attr('id');
                    console.log(id);

                    $('#muestroayudabuscado').fadeOut(({width:200,height:200,left:0,top:0}),1000);
                    //debug//
					/*
					var verTrafico = '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>';
				    var new_alert = verTrafico+$('#'+id).attr('data')+'<div>';
				    $('.focusMensajes').prepend(new_alert);
					*/
				    //debug//
                    
				     idReal = 'real';
				     
								$('#datosinforeal').val($('#'+id).attr('data'));
			                    $('#domicilio_real_pais').val($('#'+id).attr('pais'));
								$('#domicilio_real_provincia').val($('#'+id).attr('prov'));
								$('#domicilio_real_localidad').val($('#'+id).attr('loc'));
								datosdetalle = $("#domicilio_real_localidad").val();

					        if (datosdetalle)
					        {
					            //al encontrar un codigo de localidad ejecuto la function de busqueda para cod postal
					              mostrarCpPorLocalidadGenerico(idReal);
					        }
					        //return false;
                });   
         } });     

    }); 
	    $('#datosinfolegal').keyup(function(){
        var valor = $(this).val();   
        var dataString = 'valor='+valor;
        console.log(valor);
        $("#cargando_usuarios").show();
        $.ajax({
            type: "POST",
            url: "<?php echo url_for('/services/getLocaDomi') ?>",
            data: dataString,
            success: function(data) {
                $('#muestroayudabuscado').fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
                 $("#datosinfolegal").addClass("trcolor");
                 $("#cargando_usuarios").hide(); 
                 
                 $('.activocombo').click(function()
                 {
                    var id = $(this).attr('id');
                    console.log(id);

                    $('#muestroayudabuscado').fadeOut(({width:200,height:200,left:0,top:0}),1000);
                    //debug//
					/*
					var verTrafico = '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>';
				    var new_alert = verTrafico+$('#'+id).attr('data')+'<div>';
				    $('.focusMensajes').prepend(new_alert);
					*/
				    //debug//
                    
				     idLegal = 'legal';
				     
								$('#datosinfolegal').val($('#'+id).attr('data'));
			                    $('#domicilio_legal_pais').val($('#'+id).attr('pais'));
								$('#domicilio_legal_provincia').val($('#'+id).attr('prov'));
								$('#domicilio_legal_localidad').val($('#'+id).attr('loc'));
								datosdetalle = $("#domicilio_legal_localidad").val();

					        if (datosdetalle)
					        {
					            //al encontrar un codigo de localidad ejecuto la function de busqueda para cod postal
					              mostrarCpPorLocalidadGenerico(idLegal);
					        }
					        r//eturn false;
                });   
         } });     

    });    

	    $('#datosinfocomer').keyup(function(){
        var valor = $(this).val();   
        var dataString = 'valor='+valor;
        console.log(valor);
        $("#cargando_usuarios").show();
        $.ajax({
            type: "POST",
            url: "<?php echo url_for('/services/getLocaDomi') ?>",
            data: dataString,
            success: function(data) {
                $('#muestroayudabuscado').fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
                 $("#datosinfocomer").addClass("trcolor");
                 $("#cargando_usuarios").hide(); 
                 
                 $('.activocombo').click(function()
                 {
                    var id = $(this).attr('id');
                    console.log(id);
                    $('#muestroayudabuscado').fadeOut(({width:200,height:200,left:0,top:0}),1000);
                    //debug//
					/*
					var verTrafico = '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>';
				    var new_alert = verTrafico+$('#'+id).attr('data')+'<div>';
				    $('.focusMensajes').prepend(new_alert);
					*/
				    //debug//
                    
				     idComer = 'comer';
				     
								$('#datosinfocomer').val($('#'+id).attr('data'));
			                    $('#domicilio_comer_pais').val($('#'+id).attr('pais'));
								$('#domicilio_comer_provincia').val($('#'+id).attr('prov'));
								$('#domicilio_comer_localidad').val($('#'+id).attr('loc'));
								datosdetalle = $("#domicilio_comer_localidad").val();

					        if (datosdetalle)
					        {
					            //al encontrar un codigo de localidad ejecuto la function de busqueda para cod postal
					              mostrarCpPorLocalidadGenerico(idComer);
					        }
					       // return false;
                });   
         } });     

    });
			        
// si viene edicion se ejecuta este llamado
<?php if (isset($domicilio_real_localidad) && !empty($domicilio_real_localidad) || isset($domicilio_legal_localidad) && !empty($domicilio_legal_localidad)|| isset($domicilio_comer_localidad) && !empty($domicilio_comer_localidad) ): ?>
         buscarLocalidades(1,2,3);		
        
<?php endif ?>  
// con esta funcion optengo el referido del punto anterior  
    function buscarLocalidades(keyreal,keylegal,keycomer)
      {
      	//alert(keyreal+ '->'+ keylegal+ '->'+ keycomer);
      	if (keyreal)
			      	{ 
				     	$.get("<?php echo url_for('services/getMostrarlocalidades') ?>", 
								{ 
								   domicilio_pais: $("#domicilio_real_pais").val(), 
								   domicilio_provincia: $('#domicilio_real_provincia').val(),
								   domicilio_localidad: $('#domicilio_real_localidad').val()
								},
				      	function(data)
					      		{
							       info = JSON.parse(data);
							       console.log(info);
							       //por ultimo pongo la columna que quiero para mostrar en la caja typeahead
							       $('#datosinforeal').val(info);
							       $('.focusMensajes').val(info);							       
							       //$('#mostrarAlerta2').show();
								  // return false;
					      		});
				    }
	    if (keylegal)
			      	{
				     	$.get("<?php echo url_for('services/getMostrarlocalidades') ?>", 
								{ 
								   domicilio_pais: $('#domicilio_legal_pais').val(),
								   domicilio_provincia: $('#domicilio_legal_provincia').val(),
								   domicilio_localidad: $('#domicilio_legal_localidad').val()
								},
				      	function(data)
					      		{
							       info = JSON.parse(data);
							       //console.log(data);
							       //por ultimo pongo la columna que quiero para mostrar en la caja typeahead
							       $('#datosinfolegal').val(info);
							       $('.focusMensajes').val(info);
							       //$('#mostrarAlerta2').show();
								  // return false;
					      		});
				    }
	    if (keycomer)
			      	{ 
				     	$.get("<?php echo url_for('services/getMostrarlocalidades') ?>", 
								{ 
								   domicilio_pais: $('#domicilio_comer_pais').val(),
								   domicilio_provincia: $('#domicilio_comer_provincia').val(),
								   domicilio_localidad: $('#domicilio_comer_localidad').val()
								},
				      	function(data)
					      		{
							       info = JSON.parse(data);
							       //console.log(data);
							       //por ultimo pongo la columna que quiero para mostrar en la caja typeahead
							       $('#datosinfocomer').val(info);
							       $('.focusMensajes').val(info);
							       //$('#mostrarAlerta2').show();
								   //return false;
					      		});
				    }
				    return false;
      } 
	 //UNICA FUNCION PARA MOSTRAR CODIGO POSTAL CUANDO ES CLIKEADO EN ALGUNA LOCALIDAD
      function mostrarCpPorLocalidadGenerico(idvalor)
      {
      
			      		 					$("#domicilio_"+idvalor+"_cp").addClass("colorfondo3");
											llenarComboCpostal('<?php echo url_for('services/traeCpPorLocalidadGenerico') ?>',
											$("#domicilio_"+idvalor+"_localidad"),
											'domicilio_'+idvalor+'_pais', 
											'domicilio_'+idvalor+'_provincia', 
											'domicilio_'+idvalor+'_cp');

      } 
       
});

//desaparezco el mensaje rojo cuando vuelvo a escribir en el campo codigo legajo  
$(document).ready(function () {
	$(".limpiarcampo").keyup(function(){
		if( $(this).val() != "" ){
			$(".error").fadeOut();			
			return false;
		}		
});

$("#datosinforeal").keyup(function(){
		if($(this).val() != "" ){
			$('#datosinfo').addClass('real');
			$('#datosinfolegal').removeClass('legal');
			$('#datosinfocomer').removeClass('comer');
			return false;
		}		
});
$("#datosinfolegal").keyup(function(){
		if($(this).val() != "" ){
			$('#datosinfolegal').addClass('legal');
			$('#datosinfo').removeClass('comer');
			$('#datosinfo').removeClass('real');
			return false;
		}		
});
$("#datosinfocomer").keyup(function(){
		if($(this).val() != "" ){
			$('#datosinfocomer').addClass('comer');
			$('#datosinfo').removeClass('legal');
			$('#datosinfo').removeClass('real');
			return false;
		}		
});
})

function limpiarCampos(accion){
if(accion == 'real'){
$('#datosinforeal').val('');
$('#domicilio_real_pais').val('');
$('#domicilio_real_provincia').val('');
$('#domicilio_real_localidad').val('');
$('#domicilio_real_cp').empty();
$(".error").fadeOut();
$('#datosinforeal').focus();
}
if(accion == 'legal'){
$('#datosinfolegal').val('');
$('#domicilio_legal_pais').val('');
$('#domicilio_legal_provincia').val('');
$('#domicilio_legal_localidad').val('');
$('#domicilio_legal_cp').empty();
$(".error").fadeOut();
$('#datosinfolegal').focus();	
}	
if(accion == 'comer'){
$('#datosinfocomer').val('');
$('#domicilio_comer_pais').val('');
$('#domicilio_comer_provincia').val('');
$('#domicilio_comer_localidad').val('');
$('#domicilio_comer_cp').empty();
$(".error").fadeOut();
$('#datosinfocomer').focus();	
}	
}


llenarComboCpostal = function(url, element, pais_id, provincia_id, input_cp_id, cp_predefinido) {
	//alert(url+ element+ pais_id+ provincia_id+ input_cp_id+ cp_predefinido)
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
				//return false;
			},
		});
}

</script>
