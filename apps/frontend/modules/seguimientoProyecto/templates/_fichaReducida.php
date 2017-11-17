
<!-- ..................................Detalle de la ficha................................... -->

<style>
  #item-tabla-ficha  {}
  #item-tabla-ficha p {padding: 5px 0px 5px 8px; margin-top: -10px; border-bottom: 1px solid #ccc; background-color:#bdbdbd;}
</style>

<div  style="overflow-x: hidden;border-style: ridge">
  <div class="container-fluid">
     
      <!-- ...............row de datos cabecera ...............................-->
      <div class="row" >
          <?php foreach ($fich as $row) {} ?>  <!--declaro que voy a usar la info de fichas-->
            
             <div class="col-md-8 bg-primary" style=" background: #01579b; padding: 5px 0px 5px 5px;box-sizing: border-box; font-size: 12px;"> 
               <h2><?php echo $row['fich_deno'] ?></h2>    
            </div>
            <div class="col-md-4" style="background-color:#424242 ;color: white; padding: 8px 0px 8px 5px;box-sizing: border-box; font-size: 11px; ">
                <h2><?php echo $row['cata_deno'] ?></h2>
            </div>

      </div>

      <!-- ...............row de datos de descripción........................ . -->
      <div class="row">
          <div class="col-md-12" style=" margin-left: -5px; background-color: white ; color: blue; padding: 8px 0px 0px 10px; font-size: 14px">
                <p><?php echo $row['fich_desc'] ?></p>
          </div>
      </div>


      <!-- .......................fila en blanco................................. -->
      <div class="row">
        <div class="col-md-12"> <p> </p></div>

      </div>  

      <!-- ........................row de procedimientos................................ --> 

        <div class="row" style="background-color: #e0e0e0"> 
              <div class="col-md-12" style="background-color: #1976d2;color: white; padding: 5px 0px 5px 0px; font-size: 11px; font-weight: bold">
                      <h2 style="margin-left: 5px">Procedimientos recomendados:</h2>
              </div>

              <div class="row">
                  <div class="col-md-11" style="padding-top: 5px">
                    <ul>
                      <?php foreach ($proc as $row) { ?>
                              <li><p class="text-justify" style="padding-bottom: 5px; border-bottom: 2px solid white; color:black "><?php echo $row['fipr_texto'] ?></p></li>
                      <?php } // del ciclo ?>
                    </ul>
                  </div>
              </div>
        </div>

      <!-- .......................fila en blanco................................. -->
      <div class="row">
        <div class="col-md-12"> <p> </p></div>

      </div> 


       <!-- .....................row de recursos................................. --> 
      <div class="row" style="background-color: #e0e0e0">
             
                <div class="col-md-12" style="background-color: #1976d2; color: white; padding: 5px 0px 5px 0px; font-size: 11px; font-weight: bold;">
                      <h2 style="margin-left: 5px">Previsión de recursos recomendada:</h2>
                </div>

                <div class="row">
                  <div class="col-md-11" style= "padding-top: 5px">
                        
                           <ul>
                                <?php foreach ($recu as $row) { ?>
                                        <li><p class="text-justify" style="padding-bottom: 5px; border-bottom: 2px solid white; color:black "><?php echo $row['fire_texto'] ?></p></li>
                                <?php } // del ciclo ?>
                           </ul>
                        
                   </div>
                </div>

      </div>

      <!-- .....................row de fuentes................................. --> 
        <div class="row" style="background-color: #e0e0e0">
             
                <div class="col-md-12" style="background-color: #1976d2; color: white; padding: 5px 0px 5px 0px; font-size: 11px; font-weight: bold;">
                      <h2 style="margin-left: 5px">Fuente:</h2>
                </div>

                <div class="row">
                  <div class="col-md-11" style= "padding-top: 5px">
                        
                           <ul>
                                <?php foreach ($fuen as $row) { ?>
                                        <li><p class="text-justify" style="padding-bottom: 5px; border-bottom: 2px solid white; color:black "><?php echo $row['fifu_texto'] ?></p></li>
                                <?php } // del ciclo ?>
                           </ul>
                        
                   </div>
                </div>

      </div>

     
  </div> <!-- div container -->
</div>