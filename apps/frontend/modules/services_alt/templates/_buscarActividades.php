<!------------ACTIVIDADES---------------------->
<td>
<input id="<?php echo $nombre;?>" type="text" class="input-xxlarge" onkeydown="EntradaActividad(event,'<?php echo $nombre;?>','<?php echo $etiqueta_actividad;?>','<?php echo $ENRA_ACTIVIDAD;?>','<?php echo $etiqueta_entidad;?>');" />
<input id="<?php echo $etiqueta_actividad;?>" name="<?php echo $etiqueta_actividad;?>" value="<?php echo $ENRA_ACTIVIDAD;?>" type="hidden" />
<input id="<?php echo $etiqueta_entidad;?>" name="<?php echo $etiqueta_entidad;?>" value="<?php echo $valor_entidad;?>" type="hidden" />

</td>
<td>
     <a class="btn" title="Limpiar campo Actividad" style="cursor: pointer" onclick="limpiarComboAct('<?php echo $nombre;?>', '<?php echo $etiqueta_actividad;?>')" ><i class="icon-trash text-info"></i></a>
</td>
<!------------FIN ACTIVIDADES----------------->   
<!------------SUJETO-------------------------->
<td>
    <input id="<?php echo $nombresujeto;?>" type="text"  class="input-xxlarge" onkeydown="EntradaSujeto(event,'<?php echo $nombresujeto;?>','<?php echo $etiqueta_sujeto;?>','<?php echo $ENRA_SUJETO;?>');" />
    <input id="<?php echo $etiqueta_sujeto;?>" name="<?php echo $etiqueta_sujeto;?>" value="<?php echo $ENRA_SUJETO;?>" type="hidden" />
</td> 
<td>
        <a class="btn" title="Limpiar campo Sujeto" style="cursor: pointer" onclick="limpiarComboSuj('<?php echo $nombresujeto;?>', '<?php echo $etiqueta_sujeto;?>')" ><i class="icon-trash text-info"></i></a>
</td>
<!------------FIN SUJETO--------------------->     
<i id="cargando_icon" style="display:none" class="icon-spinner icon-spin icon-large"></i> 

<script type="text/javascript">
//------------------ viene de form_actividades del proce GET_ENTIDAD_ACTIVIDADES_RS----------------------//
//-------------------------------------------------------------------------------------------------------//
    $(document).ready(function(){
        //ACTIVIDAD
       var nombre_actividad = '<?php echo $nombre;?>';
        var etiqueta_actividad = '<?php echo $etiqueta_actividad;?>';
        var etiqueta_entidad = '<?php echo $etiqueta_entidad;?>';
        var enra_actividad = '<?php echo $ENRA_ACTIVIDAD?>';
        
        //SUJETO
        var nombre_sujeto = '<?php echo $nombresujeto;?>';
        var etiqueta_sujeto = '<?php echo $etiqueta_sujeto;?>';
        var enra_sujeto = '<?php echo $ENRA_SUJETO?>';

        $(document.getElementById(etiqueta_sujeto)).val(enra_sujeto);
        $(document.getElementById(etiqueta_actividad)).val(enra_actividad);
        $(document.getElementById(etiqueta_sujeto)).val(enra_sujeto);
      
//------------------- aqui trae del procedure SEL_ENTIDAD_ACTIVI_BUSCAR_RS---------------------------------//
//-----------------------------------------------------------------------------------------------------------//      

        var formato_actividad = function (data, i)		
        {
               if(data[i].ENRA_TSUO_CODIGO == null){
                   //console.log(data[i].ENRA_TSUO_CODIGO);
                   data[i].ENRA_TSUO_CODIGO = '';
                   data[i].TSUO_DESCRIPCION = 'Sin Sujeto';
               }
          return data[i].ENRA_DESCRIPCION + ' - #' + data[i].ENRA_ACTIVIDAD + ' - #' + data[i].ENRA_ENRE_CODIGO + ' - #' + data[i].ENRA_TSUO_CODIGO + ' - #' + data[i].TSUO_DESCRIPCION;
        };
		
        $(document.getElementById(nombre_actividad)).typeahead(
        {
          items: 10,
         source: function(texto, process) {
          $('#cargando_icon').show();
          return $.get('/services/actividades', { actividad: texto }, function (data) {
            $('#comercial_interv').val('');
              var opciones = [];
              for (var i = data.length - 1; i >= 0; i--) {
                   console.log(JSON.stringify(data, null, 4));
                opciones.push(formato_actividad(data, i));
              };
              $('#cargando_icon').hide();
              return process(opciones);
          });

        },
          updater: function (item)
          {
          	
            var actividad = item.split(' - #');
            var codigo_entidad    = actividad[2];
            var num_activ = actividad[1];
            var num_sujeto = actividad[3];
            var nombresujetoref = actividad[4];
            
            $(document.getElementById(etiqueta_actividad)).val(num_activ);
            $(document.getElementById(etiqueta_entidad)).val(codigo_entidad);
            $(document.getElementById(etiqueta_sujeto)).val(num_sujeto);
            $(document.getElementById(nombre_sujeto)).val(nombresujetoref);

//----------------- aqui activo el codigo sujeto y envio al action para optener algo referido----------------//
//-----------------------------------------------------------------------------------------------------------//      

            if (num_sujeto){
            //alert(num_sujeto);
            //minLength: 1
            seleccionar_sujetoreferido(num_sujeto);
            } 
            if (num_sujeto == 'null'){
               $(document.getElementById(nombre_sujeto)).val('No existe sujeto referido');
               $(document.getElementById(etiqueta_sujeto)).val('');
            } 
                  
            return item;
          }
        }); 
     /* var seleccionar_actividad = function(num_activ)
      {
        return $.get('/services/actividades', { actividad: num_activ }, function (data) 
        {
          var texto = formato_actividad(data, 0);
          //console.log(JSON.stringify(data, null, 4));
          $(document.getElementById(nombre_actividad)).val(texto);
        })
      }*/
//-----------------------Aqui muestro el nombre exacto de la actividad cuando me encuentro en edici�n--------//
//-----------------------------------------------------------------------------------------------------------//      
      var mostrar_actividad = function(num_activ2)
      {
      	$('#cargando_icon').show();
        return $.get('/services/traeDescripcionActi', { codigoactividad: num_activ2 }, function (data)
        {
          var texto = formato_actividadmostrar(data, 0);
          //console.log(JSON.stringify(data, null, 4));
          $(document.getElementById(nombre_actividad)).val(texto);
          $('#cargando_icon').hide();
        })
      }
      var formato_actividadmostrar = function (data, i)      
        {
          return data[i].ENRA_DESCRIPCION + ' - #' + data[i].ENRA_ACTIVIDAD + ' - #' + data[i].ENRA_ENRE_CODIGO;
        };
        
        <?php if (isset($ENRA_ACTIVIDAD) && !empty($ENRA_ACTIVIDAD)): ?>
          //seleccionar_actividad(<?php echo $ENRA_ACTIVIDAD ?>);
          mostrar_actividad($(document.getElementById(etiqueta_actividad)).val());
          //alert(<?php echo $ENRA_ACTIVIDAD ?>);
         <?php endif ?>

     
////------------------------------------desde aqui empieza los procesos para el sujeto----------///
//-----------------------------------------------------------------------------------------------------------//      

     var formato_sujeto = function (data, i)
        {
          return data[i].TSUO_DESCRIPCION + ' - #' + data[i].TSUO_CODIGO;
        };
        
        $(document.getElementById(nombre_sujeto)).typeahead({
            items: 10,
            source: function(texto, process) {
              $('#cargando_icon').show();
              return $.get('/services/sujetos', { sujeto: texto }, function (data) {
                $('#comercial_interv').val('');
                  var opciones = [];
                  for (var i = data.length - 1; i >= 0; i--) {
                      //console.log(JSON.stringify(data, null, 4));
                    opciones.push(formato_sujeto(data, i));
                  };
                  $('#cargando_icon').hide();
                  return process(opciones);
              });
            },
            updater: function (item)
            {
                var sujeto = item.split(' - #');
                var num_sujeto = sujeto[1];
                $(document.getElementById(etiqueta_sujeto)).val(num_sujeto);
                return item;
            }
        });
 
      // con esta funcion optengo el referido del punto anterior  
      var seleccionar_sujetoreferido = function(num_sujeto)
      {
        return $.get('/services/sujetos', { sujeto: num_sujeto }, function (data) 
        { 
          var texto = formato_sujeto(data, 0);
          //console.log(JSON.stringify(data, null, 4));
          //$(document.getElementById(nombre_sujeto)).val(texto);
            
        })
      }  
     /* var seleccionar_sujeto = function(num_sujeto)
      {
        return $.get('/services/sujetos', { sujeto: num_sujeto }, function (data) 
        {
          var texto = formato_sujeto(data, 0);
          $(document.getElementById(nombre_sujeto)).val(texto);
        })
      }*/
//-----------------------Aqui muestro el nombre exacto del sujeto cuando me encuentro en edici�n--------//
//-----------------------------------------------------------------------------------------------------------//      
      var mostrar_sujeto = function(num_sujeto)
      {
        //alert(num_activ);
        return $.get('/services/traeDescripcionSuj', { codigosujeto: num_sujeto }, function (data) 
        {
          var texto = formato_sujetomostrar(data, 0);
          //console.log(JSON.stringify(data, null, 4));
          $(document.getElementById(nombre_sujeto)).val(texto);
        })
      }
      var formato_sujetomostrar = function (data, i)      
        {
          return data[i].TSUO_DESCRIPCION + ' - #' + data[i].TSUO_CODIGO;
        };
    
     <?php if (isset($ENRA_SUJETO) && !empty($ENRA_SUJETO)): ?>
     //seleccionar_sujeto(<?php echo $ENRA_SUJETO ?>);
     mostrar_sujeto(<?php echo $ENRA_SUJETO ?>);
     //alert(<?php echo $ENRA_SUJETO ?>);
     <?php endif ?>      
});

//-----------------------------------------------------------------------------------------------------------//      
  
function limpiarComboSuj(nombresujeto, etiqueta_sujeto){
document.getElementById(nombresujeto).value = "";
document.getElementById(etiqueta_sujeto).value = "";
}
function limpiarComboAct(nombre, etiqueta_actividad){
document.getElementById(nombre).value = "";
document.getElementById(etiqueta_actividad).value = "";
}
</script>