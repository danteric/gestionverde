
<!--
<div class="navbar navbar-default<?php //if (isset($fija) && $fija): ?>sticker<?php //endif ?> barra_color">
    <div class="navbar-inner">
    
      <ul class="breadcrumb pull-left">
        <li><a href="<?php //echo url_for('/') ?>">Inicio</a></li>
        <?php //$k=0; ?>
        <?php //foreach ($sf_data->getRaw('rutas') as $ruta): ?>
          <li class="active"><?php //echo $ruta ?>
            <?php //if ($k<count($rutas)-1): ?>
               <span class="divider">/</span>
            <?php //endif ?>
          </li>  
          <?php //$k++; ?>
        <?php //endforeach ?>
      </ul>
    
      <ul class="nav navbar-nav navbar-right">
        <?php //foreach ($sf_data->getRaw('acciones') as $accion): ?>
          <li class="divider-vertical"></li>          
          <li><?php //echo $accion ?></li>
        <?php //endforeach ?>
      </ul>

    </div>
</div>
-->


  <div class="btn-toolbar" role="toolbar" >
    <div class="container-fluid barra_color">
             
        <div class="row">
        <!-- primera seccion: contexto -->
        <div class="col-md-6">
            <a href="<?php echo url_for('/') ?>">Inicio</a>
            <?php foreach ($sf_data->getRaw('rutas') as $ruta): ?>
                <span class="divider">/ </span><?php echo $ruta ?>
            <?php endforeach ?>
        </div>
        <!-- primera seccion: exportar a... -->
        <div class="col-md-2">
          <div class="btn-group pull-right">
            <!--
              <button type="button" class="btn btn-default">Excel</button>
              <button type="button" class="btn btn-default">PDF</button>
            -->
          </div>
        </div>
        <!-- tercera seccion: aceptar/ cancelar -->
        <div class="col-md-4">
          <div class="btn-group pull-right">
              <?php foreach ($sf_data->getRaw('acciones') as $accion): ?>  
              <?php echo $accion ?>
              <?php endforeach ?>
          </div>
        </div>
    </div>
  </div>
</div>
 


    
     
    


              
           