<?php
if (isset($_REQUEST['ac']) && !empty($_REQUEST['ac']) && $_REQUEST['ac'] == 'sub'):
  null;
else:
  echo "No puedes acceder a este archivo";
  exit;
endif;
?>
<head>
    <title>Explora</title>
    <meta http-equiv="X-UA-Compatible" content="IE=8" />
  <link rel="stylesheet" type="text/css" media="screen" href="/css/bootstrap.min.css" /> 
</head> 
<div class="modal-backdrop fade in"></div>
  <div class=" modal " style=""> 
  <div class="panel-body">
    <div class="" style="padding: 55px 55px">
        <form name="frmUpload" action="com.php" method="post" enctype="multipart/form-data">


    <div class="form-group">
               <div class="col-sm-7">
                <label class="control-label">Ruta del archivo:</label>
               <input type="text" name="rutazip" class="input-xlarge" style="height: 28px;" value="<?php echo $_SERVER['DOCUMENT_ROOT'];?>/"  />  
               <input type="file"  name="txtFile" id="txtFile" />
         </div>
        </div>
        <div class="form-group">
               <div class="col-sm-7">
                <label class="control-label">Ruta Destino:</label>
                <input type="text" name="ruta" class="input-xlarge" style="height: 28px;" id="ruta" value="./temp/"/>
                <div>La ruta debe terminar con '\' o '/'</div>
         </div>
        </div>

   
   <div class="text-right">
    <input type="submit" name="btnSubmit" class="btn btn-info" value="Enviar" />
   </div>
   </form>
   <div class="text-right">
   <input type="submit" class="btn btn-warning" value="Cerrar" onclick="javascript:history.back(1)()"/>
   </div>
    </div>
   </div>
   </div>