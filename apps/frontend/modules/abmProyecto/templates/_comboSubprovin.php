
        <?php $optionsSelect = $sf_data->getRaw('dd_provin'); ?>

        <select id="p_id_provincia" name="p_id_provincia" class="form-control" > 
            <?php foreach ($optionsSelect as $arraySelect) { ?>                   
                <option data="<?php echo $arraySelect["cprv_id_provincia"] ?>" <?php if($codigoProvincia== $arraySelect["cprv_id_provincia"]) { echo 'selected'; }; ?> value="<?php echo $arraySelect["cprv_id_provincia"] ?>"><?php echo $arraySelect["cprv_provincia"] ?></option> 
            <?php } ?>
        </select>
 
<script>
   $(document).ready(function(){
     $('.hideBoton').click(function(){
        $('.HideGrillaShow').hide(1000);
        $('.mensajito').hide();
        
     });
     });
</script>