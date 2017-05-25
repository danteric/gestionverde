           
<?php if ($resultado == 'OK'){ ?>
                    <div class="text-center alert alert-info" id="cartelito">
                        <h6><?php echo $exito; ?></h6>
                    </div>     
            </div>

            <?php }else{ ?>
                    <div class="text-center alert alert-error" id="cartelito">
                        <h6><?php echo $resultado; ?></h6>
                     </div>
           <?php } ?>