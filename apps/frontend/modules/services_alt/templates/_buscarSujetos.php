<input id="<?php echo $nombre;?>" type="text" class="input-xxlarge" onkeydown="EntradaSujeto(event,'<?php echo $nombre;?>','<?php echo $etiqueta_sujeto;?>','<?php echo $ENRA_SUJETO;?>');" />
<input id="<?php echo $etiqueta_sujeto;?>" name="<?php echo $etiqueta_sujeto;?>" value="<?php echo $ENRA_SUJETO;?>" type="hidden" />
							<td>
								<a title="Borrar Tipo" onclick="limpiarCombo('<?php echo $nombre;?>', '<?php echo $etiqueta_sujeto;?>')" ><i class="icon-pencil text-error"></i></a>
							</td>
<i id="cargando_icon" style="display:none" class="icon-spinner icon-spin icon-large"></i> 

<script type="text/javascript">
    $(document).ready(function(){
		var nombre_sujeto = '<?php echo $nombre;?>';
		var etiqueta_sujeto = '<?php echo $etiqueta_sujeto;?>';
		var enra_sujeto = '<?php echo $ENRA_SUJETO?>';

		$(document.getElementById(etiqueta_sujeto)).val(enra_sujeto);
		
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
      var seleccionar_sujeto = function(num_sujeto)
      {
        return $.get('/services/sujetos', { sujeto: num_sujeto }, function (data) 
        {
          var texto = formato_sujeto(data, 0);
          $(document.getElementById(nombre_sujeto)).val(texto);
        })
      }
    <?php if (isset($ENRA_SUJETO) && !empty($ENRA_SUJETO)): ?>
      seleccionar_sujeto(<?php echo $ENRA_SUJETO ?>);
     <?php endif ?>      
      }
      );
function limpiarCombo(nombre, etiqueta){
var x=document.getElementById(nombre);
document.getElementById(nombre).value = "";
document.getElementById(etiqueta).value = "";
alert("Llego"+prueba);}
</script>