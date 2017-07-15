<div>
   
    <!-- ...............row de datos cabecera ...............................-->
    <div class="row" style="background-color:grey">
        
        <?php foreach ($fich as $row) {} ?> 
          <div class="col-xs-10 col-md-8 text-capitalize"> 
               <h2><?php echo $row['fich_deno'] ?></h2>    
          </div>

          <div class="col-xs-3 col-md-4">
              <h2><?php echo $row['cata_deno'] ?></h2>
          </div>
    </div>



    <!-- ...............row de datos de descripción........................ . -->
    <div class="row">
        <div class="col-xs-12 col-md-12" style="background-color:lightgrey">
              <h2><?php echo $row['fich_desc'] ?></h2>
        </div>
    </div>



    <!-- ............ row de descripción....................................  --> 
    <div class="row"> 
      <div class="col-xs-12 col-md-12 bg-primary">
          <h2>Esta buena práctica se recomienda:<h2>
      </div>
    <div>




    <!-- ............row de fases-medios-tipologías-tamaños..............     -->
    <div class="row">
        
          <div class="col-xs-3 col-md-3">
                    <p class="bg-primary">Para Fases:</p>
                   <?php foreach ($fase as $row) { ?>
                       <?php if ($row['si_no']=='S') { ?>
                            <p class="bg-success"><?php echo $row['fase_deno'] ?></p>
                       <?php } // del if ?>
                   <?php } // del ciclo ?>
          </div>

          <div class="col-xs-3 col-md-3">
                  <p class="bg-primary">Para Medios:</p>
              <?php foreach ($medi as $row) { ?>
                   <?php if ($row['si_no']=='S') { ?>
                         <p class="bg-success"><?php echo $row['medi_deno'] ?></p>
                   <?php } // del if ?>
              <?php } // del ciclo ?>
         </div>  

         <div class="col-xs-3 col-md-3">
                  <p class="bg-primary">Para Tamaños:</p>
              <?php foreach ($tama as $row) { ?>
                   <?php if ($row['si_no']=='S') { ?>
                         <p class="bg-success"><?php echo $row['tama_deno'] ?></p>
                   <?php } // del if ?>
              <?php } // del ciclo ?>
         </div>  

         <div class="col-xs-3 col-md-3">
                  <p class="bg-primary">Para Tipologías:</p>
              <?php foreach ($tipo as $row) { ?>
                   <?php if ($row['si_no']=='S') { ?>
                         <p class="bg-success"><?php echo $row['tipo_deno'] ?></p>
                   <?php } // del if ?>
              <?php } // del ciclo ?>
         </div>  

        
    </div>




    <!-- ........................row de procedimientos................................ --> 
    <div class="row"> 
            <div class="col-xs-12 col-md-12">
                    <h2 class="bg-primary">Procedimientos recomendados:</h2>
                <ul>
                <?php foreach ($proc as $row) { ?>
                        <li><p class="text-justify"><?php echo $row['fipr_texto'] ?></p></li>
                <?php } // del ciclo ?>
                </ul>
            </div>
    </div>




     <!-- .....................row de recursos y fuentes................................. --> 
    <div class="row bg-primary">
           
              <div class="col-xs-12 col-md-6">
                    <h2>Previsión de recursos recomendada:</h2>
              </div>

              <div class="col-xs-12 col-md-6">
                    <h2>Para más información sobre esta buena práctica recomendamos:</h2>
              </div>
    </div>


    <div class="row">
            
            <div class="col-xs-12 col-md-6">
                <ul>
                <?php foreach ($recu as $row) { ?>
                        <li><p class="text-justify"><?php echo $row['fire_texto'] ?></p></li>
                <?php } // del ciclo ?>
                </ul>
            </div>

            <div class="col-xs-12 col-md-6">
                <ul>
                <?php foreach ($fuen as $row) { ?>
                        <li><p class="text-justify"><?php echo $row['fifu_texto'] ?></p></li>
                <?php } // del ciclo ?>
                </ul>
            </div>

    </div>




</div>

