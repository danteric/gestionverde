<style>
#tabs
{
  overflow: auto;
  width: 100%;
  list-style: none;
  margin: 0;
  padding: 0;
}

#tabs li
{
    margin: 0;
    padding: 0;
    float: left;
}

#tabs a
{
    -moz-box-shadow: -4px 0 0 rgba(0, 0, 0, .2);
    -webkit-box-shadow: -4px 0 0 rgba(0, 0, 0, .2);
    box-shadow: -4px 0 0 rgba(0, 0, 0, .2);
    background: #ad1c1c;
    background:    -moz-linear-gradient(220deg, transparent 10px, #787777 10px);
    background:    -webkit-linear-gradient(220deg, transparent 10px, #787777 10px);     
    background:     -ms-linear-gradient(220deg, transparent 10px, r#787777 10px); 
    background:      -o-linear-gradient(220deg, transparent 10px, #787777 10px); 
    background:         linear-gradient(220deg, transparent 10px, #787777 10px);
    text-shadow: 0 1px 0 rgba(0,0,0,.5);
    color: #fff;
    float: left;
    font: bold 12px/35px 'Lucida sans', Arial, Helvetica;
    height: 35px;
    padding: 0 30px;
    text-decoration: none;
}

#tabs a:hover
{
    background: #c93434;
    background:    -moz-linear-gradient(220deg, transparent 10px, #c93434 10px);
    background:    -webkit-linear-gradient(220deg, transparent 10px, #c93434 10px);     
    background:     -ms-linear-gradient(220deg, transparent 10px, #c93434 10px); 
    background:      -o-linear-gradient(220deg, transparent 10px, #c93434 10px); 
    background:         linear-gradient(220deg, transparent 10px, #c93434 10px);     
}

#tabs a:focus
{
    outline: 0;
}

#tabs #current a
{
    background: #fff;
    background:    -moz-linear-gradient(220deg, transparent 10px, #fff 10px);
    background:    -webkit-linear-gradient(220deg, transparent 10px, #fff 10px);     
    background:     -ms-linear-gradient(220deg, transparent 10px, #fff 10px); 
    background:      -o-linear-gradient(220deg, transparent 10px, #fff 10px); 
    background:         linear-gradient(220deg, transparent 10px, #fff 10px);
    text-shadow: none;    
    color: #333;
    border-collapse: inherit;
}

#contiene
{
    background-color: #fff;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#fff));
    background-image: -webkit-linear-gradient(top, #fff, #fff); 
    background-image:    -moz-linear-gradient(top, #fff, #fff); 
    background-image:     -ms-linear-gradient(top, #fff, #fff); 
    background-image:      -o-linear-gradient(top, #fff, #fff); 
    background-image:         linear-gradient(top, #fff, #fff);
    -moz-border-radius: 0 2px 2px 2px;
    -webkit-border-radius: 0 2px 2px 2px;
    border-radius: 0 2px 2px 2px;
    -moz-box-shadow: 0 2px 2px #000, 0 -1px 0 #fff inset;
    -webkit-box-shadow: 0 2px 2px #000, 0 -1px 0 #fff inset;
    box-shadow: 0 2px 2px #B4C519, 0 -1px 0 #fff inset;
    padding: 30px;
}

/* Remove the rule below if you want the content to be "organic" */
#contiene div
{
    height: 190px;
}

</style>
<script type="text/javascript" src="/js/jquery.mjs.nestedSortable.js"></script>
<script>
		var id = 0;

function accesoRol() 
{
var i = 0;
$('#tablaMenu input[type=checkbox]').each(function () {
		i++;
        if (this.checked) {
		$("#menu\\["+$(this).attr('name')+"\\]\\[item_hab\\]").val('S');
		}
			else {
		$("#menu\\["+$(this).attr('name')+"\\]\\[item_hab\\]").val('N');
		}

		if ($("#menu\\["+$(this).attr('name')+"\\]\\[usma_padre_id\\]").val() != $("#menu\\["+$(this).parent().parent().parent().prev().children('input[name=item]').val()+"\\]\\[usma_id\\]").val()) {		
		$("#menu\\["+$(this).attr('name')+"\\]\\[usma_padre_id\\]").val($("#menu\\["+$(this).parent().parent().parent().prev().children('input[name=item]').val()+"\\]\\[usma_id\\]").val());
		$("#menu\\["+$(this).attr('name')+"\\]\\[sector\\]").attr("modifica", "si");
		}
		if ($("#menu\\["+$(this).attr('name')+"\\]\\[usma_orden\\]").val() != i) {
		$("#menu\\["+$(this).attr('name')+"\\]\\[usma_orden\\]").val(i);
		$("#menu\\["+$(this).attr('name')+"\\]\\[sector\\]").attr("modifica", "si");
		}

});

	//if(elem.checked == true){
	//$("#menurol\\["+item+"\\]\\[item_hab\\]").val('S');
	//}else{
	//$("#menurol\\["+item+"\\]\\[item_hab\\]").val('N');
	//}
};

		CargarItem = function(){
					$('#spinner').show();
					var solapa = $('li[id=current]').children().attr("data-original-title");
					accesoRol();
					var menu = $('.over[modifica=si]').find( 'input[name^=menu]' ).serialize();
					//console.log(menu);
					$.post("<?php echo url_for('menu/CargarMenu') ?>",
					{ 
					 menu:menu,
					 solapa:solapa
					}, 
						function(data){
						$('#container').html(data);
						if (id==0){
						id = $('#max').val();
						}
						$('#spinner').hide();
					});
		};

		cargarMenu = 	function(valor){
			var menu = /*$('form').find( 'input[name^=menu]' ).serialize()*/'';
			console.log(valor);
			$('#spinner').show();	
			$.post("<?php echo url_for('menu/CargarMenu') ?>",
			{ 
			 menu:menu,
			 solapa:valor
			}, 
				function(data){
				$('#container').html(data);

				$('#spinner').hide();
			});
		};

$(document).ready(function () {
		cargarMenu('Habilita');

		$( "#Grabar, #Actualizar" ).click(function() {
		CargarItem();
		});

		$('#editar').keyup(function(){

		$("#menu\\["+$(this).find('input[type=hidden]').val()+"\\]\\[item\\]").val($(this).find('input[id=Item]').val());
		$("#menu\\["+$(this).find('input[type=hidden]').val()+"\\]\\[texto\\]").text($(this).find('input[id=Descripcion]').val());
		$("#menu\\["+$(this).find('input[type=hidden]').val()+"\\]\\[usma_des_item\\]").val($(this).find('input[id=Descripcion]').val());
		$("#menu\\["+$(this).find('input[type=hidden]').val()+"\\]\\[usma_enlace\\]").val($(this).find('input[id=Enlace]').val());
		$("#menu\\["+$(this).find('input[type=hidden]').val()+"\\]\\[sector\\]").attr("modifica", "si");
		});

	
		$(document).on('click','texto[class=editar]',function() {
		console.log($(this).next().next().val());
		$("#editar").find('input[type=hidden]').val($(this).next().next().val());
		$("#editar").find('input[id=Id]').val($("#menu\\["+$(this).next().next().val()+"\\]\\[usma_id\\]").val());
		$("#editar").find('input[id=Item]').val($("#menu\\["+$(this).next().next().val()+"\\]\\[item\\]").val());
		$("#editar").find('input[id=Descripcion]').val($("#menu\\["+$(this).next().next().val()+"\\]\\[usma_des_item\\]").val());
		$("#editar").find('input[id=Enlace]').val($("#menu\\["+$(this).next().next().val()+"\\]\\[usma_enlace\\]").val());

		});

		$(document).on('click','texto[id=agregar]',function() {
		id=Math.floor($.datepicker.formatDate( "@", new Date( ))/(Math.random() * 100) + 1);
		var apend;
		apend = '<div class="over" id="menu[Item'+id+'][sector]" "modifica"="si"><input type="checkbox" id="Item'+id+'" name="Item'+id+'" "><texto id="menu[Item'+id+'][texto]" class="editar">Item</texto><texto id="agregar"></texto>';
		apend = apend +'<input type="hidden" id="item" name="item" value="Item'+id+'" />';
		apend = apend +'<input type="hidden" id="menu[Item'+id+'][item_original]" name="menu[Item'+id+'][item_original]" value="Item'+id+'" />';
		apend = apend +'<input type="hidden" id="menu[Item'+id+'][item]" name="menu[Item'+id+'][item]" value="Item'+id+'" />';
		apend = apend +'<input type="hidden" id="menu[Item'+id+'][item_hab]" name="menu[Item'+id+'][item_hab]" value="N" />';
		apend = apend +'<input type="hidden" id="menu[Item'+id+'][usma_usap_apli]" name="menu[Item'+id+'][usma_usap_apli]" value="SMOG" />';
		apend = apend +'<input type="hidden" id="menu[Item'+id+'][usma_id]" name="menu[Item'+id+'][usma_id]" value="" />';
		apend = apend +'<input type="hidden" id="menu[Item'+id+'][usma_padre_id]" name="menu[Item'+id+'][usma_padre_id]" value="" />';
		apend = apend +'<input type="hidden" id="menu[Item'+id+'][usma_des_item]" name="menu[Item'+id+'][usma_des_item]" value="Item" />';
		apend = apend +'<input type="hidden" id="menu[Item'+id+'][usma_enlace]" name="menu[Item'+id+'][usma_enlace]" value="" />';
		apend = apend +'<input type="hidden" id="menu[Item'+id+'][usma_orden]" name="menu[Item'+id+'][usma_orden]" value="" /></div>';
		if ( $(this).closest('li').children('ol').length > 0) {
		$(this).closest('li').children('ol').prepend('<li>'+apend+'</li>');
		}
		else {
		$(this).closest('li').append('<ol><li>'+apend+'</li></ol>');
		}
		CargarItem('#menu\\[Item'+id+'\\]\\[sector\\]');
		});
		
		var total_items = 0;
		var count_items = 0;
	$(document).on('change','#tablaMenu :checkbox:not([readonly])',function() {
	count_items++;
		console.log('2do' + total_items + ' - ' + count_items);
	//$("#tablaMenu :checkbox").change(function() {
		$("#menu\\["+$(this).attr('id')+"\\]\\[sector\\]").attr("modifica", "si");
		//accesoRol($(this).attr('class'));
	if (total_items+1 == count_items) {
	CargarItem();
	total_items = 0;
	count_items = 0;
	}
	});
		
	$(document).on('click','#tablaMenu :checkbox:not([readonly])',function() {

		total_items = $(this).parent().parent().children('ol').children('li').length;
//		if(total_items == 0) {
		$("#menu\\["+$(this).attr('id')+"\\]\\[sector\\]").attr("modifica", "si");
		CargarItem();
//		}
		console.log('1ro' + total_items + ' - ' + count_items);

	});

	$(document).on('mousedown','.noMove', function(e) {
	  e.preventDefault();
	});	

	$(document).on('mouseenter','.over',function() {	
    $(this).find('texto[id=agregar]').html(' +');
	}).on('mouseleave','.over',function(){
    $('texto[id=agregar]').html('');
	});

	$(document).on('mouseenter','texto[class=editar]',function() {	
    $(this).css('cursor','move');
	}).on('mouseleave','texto[class=editar]',function(){
    $('texto[class=editar]').css('cursor','auto');
	});

	$(document).on('mouseenter','texto[id=agregar]',function() {	
    $(this).css('cursor','cell');
	}).on('mouseleave','texto[id=agregar]',function(){
    $('texto[class=editar]').css('cursor','auto');
	});	

    $('#tabs a').click(function(e) {
        e.preventDefault();        
        $("#tabs li").attr("id",""); 
        $(this).parent().attr("id","current"); 
		console.log($(this).attr("data-original-title"));
		cargarMenu($(this).attr("data-original-title"));

    });	
	
});
</script>
<form id="datosRolesForm" class="formularioValidado datosRolesForm" name="datosRolesForm" method="POST" action="<?php echo url_for("menu/menu") ?>">
	<?php $cabecera = new Cabecera();
	$cabecera->ruta('Sistema')-> ruta(__("Definición de Menú"));
	//ruta(link_to(__("Definición de Menu"), 'menu/menu'))	;

	$cabecera->accion(sprintf('<div id="editar"><input type="hidden" /><table><tr><td>ID <input readonly type="text" value="" id="Id" /></td><td> Item <input id="Item" type="text" /></td><td> Descripción <input id="Descripcion" type="text" /></td><td> Enlace <input id="Enlace" type="text" /></td></tr></table></div>'));	
	if($_SESSION["usuario"]["modi"] == "S"):
			$cabecera->accion('<button type="button" id="Grabar" class="btn btn-success">Grabar</button>');
		    //$cabecera->accion('<button type="button" onclick="cancelar()" class="btn btn-warning"><i class="icon-chevron-left"></i> Volver</button>');
	endif;
	if($alta!='1'):
	$cabecera->accion(sprintf('<button type="button" id="trigger-overlay" class="btn btn-danger"><i class="icon-search"></i> Ayuda</button>'));

	
	endif;
	if(empty($nombre)):
		$cabecera->titulo(__("Definición de Menú"));
		
	else:
		$cabecera->titulo(__("Editando usuario #".$nombre))->ruta(__("Editando usuario #".$nombre));
	endif;
	echo $cabecera;
?>
	<br/>
	<div class="wrapper">
	<div class="panel-body">
	<h2><?php echo __("Administrar") ?> <span class="paso">  <?php echo __("menú") ?></span></h2>
	<ul id="tabs">
		<li id="current"><a href="#" title="Habilita">Check Habilita</a></li>
		<li><a href="#" title="SuperAdmin">Check SuperAdmin</a></li>
	</ul>
	<div id="container">
	<div>

	</div></div>
</form>

<!-- ayuda -->
<?php require __DIR__. '/../../ayuda/templates/_datos_top.php' ?>
<!-- /ayuda -->