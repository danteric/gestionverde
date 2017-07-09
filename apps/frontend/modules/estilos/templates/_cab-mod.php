

<?php $cabecera = $sf_data->getRaw('cabecera'); ?>
<?php include_partial('estilos/barra_modulo',array('fija'=>$cabecera->fija, 'rutas'=>$cabecera->rutas, 'acciones'=>$cabecera->acciones)); ?>  
<?php if (isset($cabecera->filtros) && is_array($cabecera->filtros)): ?>
	<?php include_partial('estilos/filtro',array('contenido'=>get_partial('estilos/lista-filtro', array('filtros'=>$cabecera->filtros)))); ?>
<?php endif ?>
<?php if (isset($cabecera->titulo)): ?>
	<?php include_partial('estilos/titulo',array('titulo'=>$cabecera->titulo)); ?>
<?php endif ?>