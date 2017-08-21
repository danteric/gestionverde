<script language="JavaScript" type="text/javascript" src="/js/configvarios.js"></script>




<table id="frelacionadas" border="0" class="tablesorter responsiveWidth table table-hover table-bordered table-condensed">
        <thead  class="alert-success wrapper" >
             <tr>
                <th style="text-align: center;width: 10%"><?php echo __("ID") ?></th>
                <th style="text-align: center;width: 60%"><?php echo __("Ficha") ?></th> 
                <th style="text-align: center;width: 30%"><?php echo __("Acciones") ?></th>
             </tr>
         </thead>
                         
        <tbody>
          <?php foreach($cursor as $row): ?>
                <tr>
                    <td style="text-align:center; vertical-align: middle;"><?php echo $row['fich_id'] ?></td>
                    <td style="vertical-align: middle;"><?php echo $row['fich_deno'] ?></td>
                    <td style="vertical-align: middle; width: 80px"></td>
                </tr>
          <?php endforeach; ?>
        </tbody>

</table>



