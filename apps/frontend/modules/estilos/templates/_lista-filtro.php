

<div class="row">
  <?php foreach ($filtros as $key => $value): ?>
  
  <!--<div class="form-group"> -->
    <div class="col-md-2">
    <h5 style="text-align:right;"><b><?php echo $key ?></b></h5>
    </div>

    <div class="col-md-2">
    <?php echo $value ?>
    </div>  
  

  <?php endforeach ?>
</div>