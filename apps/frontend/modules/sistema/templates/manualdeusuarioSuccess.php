<script>
        $(document).ready(function(){
        ////help con procedimientos manual de usuario gral/// 
        $('#spinner').show();
        $.post("<?php echo url_for('ayuda/manual_sistemaGral') ?>",
        {    
            valor: $("#ayuda").val(), 
            valor2: $("#ayudaformulario").val(),   
        },
            function(data){
                //alert(data);
                $('#verayuda').html(data);
                $('#spinner').hide();
            });
        });

$(document).ready(function() {    
    //Al escribr dentro del input con id="service"
    $('#valor').keyup(function(){
        //Obtenemos el value del input
        var valor = $(this).val();     
        var dataString = 'valor='+valor;
        console.log(valor);
        $("#fotocargando").show();
        //Le pasamos el valor del input al ajax
        $.ajax({
            type: "POST",
            url: "<?php echo url_for('ayuda/manual_sistemaGral') ?>",
            //url: "<?php //echo url_for('ayuda/traeAyuda') ?>",
            data: dataString,
            success: function(data) {
                $('#muestroayudabuscado').fadeIn(({width:250,height:250,left:-25,top:-25})).html(data);
                 $("#fotocargando").hide(); 
                /*$('.activocombo').click(function(){
                    
                    var id = $(this).attr('id');
                    $('#valor').val($('#'+id).attr('data'));
                    $('#muestroayudabuscado').fadeOut(({width:200,height:200,left:0,top:0}),1000);
                });  */            
            }
        });
    }); 
          
}); 

$("body").delegate(".limpiar", "click", function() {
        $("#valor").val('');
        $(".limpiar").hide({width:250,height:250,left:-25,top:-25});
        $(".modal2").hide({width:250,height:250,left:-25,top:-25});
        //location.reload(); 
});    
</script>
<?php 
    $cabecera = new Cabecera();
    $cabecera->titulo(__("Manual de Usuario"));
    $cabecera->ruta('Catalogos')->
    ruta(link_to(__("Manual de Usuario"), 'sistema/manualdeusuario'))   ;
    $cabecera->ruta(__("Manual de Usuario"));
    $cabecera->boton('filtrar');
    $cabecera->accion(sprintf('<a href="%s"><i class="icon-plus text-info"></i> Descargar</a>', url_for("/../../upload/SMOG-Manual del usuario.docx")));
    ?>
    <?php $cabecera->ini_filtro(__("Buscar").' <i class="icon-group alert-info"></i>') ?>
            <input type="text" id="valor" name="valor" class="input-xlarge"/>
    <?php $cabecera->fin_filtro(__("Buscar").' <i class="icon-group alert-info"></i>') ?>
   
    <?php echo $cabecera ?>

    <div class="wrapper">
     <br>
      <div class="centrarayuda wrapperimg "> 
       <div class="panel-body">
           <div id="muestroayudabuscado">
               <!-- aqui muestro la ayuda gral cuando busco algo-->
           </div>
           <div class="" id="verayuda">
           <!-- aqui muestro la ayuda gral por defecto-->  
           </div> 
        </div> 
        <div class="modal-footer wrapperimg">
            <ul>
                <li style="list-style:none;">                       
                        <div class="text-left" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; color: #333; font-size: 8px">
                        <h>Guia operativa <strong>Sistema <?php echo $_SESSION["usuario"]["version"];?></strong> &nbsp;<i class="icon-align-justify"></i>&nbsp;Departamento de Tecnolog&iacute;as de la Informaci&oacute;n Area de Apoyo &nbsp;<i class="icon-align-justify"></i>&nbsp; Ayuda de navegaci&oacute;n
                        </div>
                    <a href="#" data-dismiss="modal"> <img src="/img/star_off.png" title="Ir arriba" class="zoom"  width="40px" onclick="ocultar()"></a>
                </li>
             
            </ul>
           </div> 
         </div>
        <br>   
     </div>     