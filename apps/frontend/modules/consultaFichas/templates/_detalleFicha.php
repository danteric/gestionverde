<div>
    <div class="row"> <!-- row de datos cabecera -->
      <div class="col-xs-10 col-md-5">
          <?php foreach ($fich as $row) {} ?>
          <div class="form-group row">
           <h1><?php echo $row['fich_deno'] ?></h1>
          </div>
          <div class="form-group row">
            <h2>Catalogo <?php echo $row['cata_deno'] ?></h2>
          </div>
          <div class="form-group row">
            <h2>Ficha <?php echo $row['fich_id'] ?></h2>
          </div>
      </div>
      <div class="col-xs-10 col-md-5">
          <div>
            <textarea class="form-control" name="fich_desc" readonly><?php echo $row['fich_desc'] ?></textarea>
          </div>  
      </div>
    </div> <!-- cierre del row de datos cabecera -->

    <div class="row"> <!-- row de aplica a --> 
      <div class="col-xs-10 col-md-5">
          <div class="form-group row">
           <h2 class="bg-primary">Para Fases</h2>
          </div>
          <?php foreach ($fase as $row) { ?>
          <?php if ($row['si_no']=='S') { ?>
          <div class="form-group row">
            <p class="bg-success"><?php echo $row['fase_deno'] ?></p>
          </div>
          <?php } // del if ?>
          <?php } // del ciclo ?>
      </div>
      <div class="col-xs-10 col-md-5">
          <div class="form-group row">
           <h2 class="bg-primary">Para Medios</h2>
          </div>
          <?php foreach ($medi as $row) { ?>
          <?php if ($row['si_no']=='S') { ?>
          <div class="form-group row">
            <p class="bg-success"><?php echo $row['medi_deno'] ?></p>
          </div>
          <?php } // del if ?>
          <?php } // del ciclo ?>
      </div>  
      </div>
    </div> <!-- cierre del row de aplica a -->

       <div class="row"> <!-- row de procedimientos --> 
      <div class="col-xs-10 col-md-10">
          <div class="form-group row">
           <h2 class="bg-primary">Procedimientos</h2>
          </div>
          <?php foreach ($proc as $row) { ?>
          <div class="form-group row">
            <p><?php echo $row['fipr_texto'] ?></p>
          </div>
          <?php } // del ciclo ?>
      </div>
     
    </div> <!-- cierre del row de procedimientos  -->
</div>

