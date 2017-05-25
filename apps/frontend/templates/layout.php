<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <link rel="shortcut icon" href="/favicon.ico"/>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <script type="text/javascript">
            if(!String.prototype.format){
              String.prototype.format = function() {
                var args = arguments;
                return this.replace(/{(\d+)}/g, function(match, number) { 
                  return typeof args[number] != 'undefined'
                    ? args[number]
                    : match
                  ;
                });
              };
            } 
            
            function mostrarLoad(form){
                $('#spinner').css('display', 'block');
            }
           
           /*
            function export_excel(tabla){
                 url = '<?php echo url_for('exportacion/excel/?pro=SEL_ENTIDAD_DOCUM_REGIS_RP&tabla='); ?>'+encodeURIComponent(tabla);
                 window.open(url,'mywindow','width=800,height=400,toolbar=yes, location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,copyhistory=yes, resizable=yes');
            }*/
         
        </script>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
        <script>
            $(document).ready(function(){
               $(".botonExcel").click(function(event){
                       if($("table").length){
                           $("#datos_a_enviar").val($("table").html());
                           $("#exportarExcel").submit();
                       }else{
                           alert("no hay datos que exportar.");
                       }
               });
               $(".botonPdf").click(function(event){
                       if($("table").length){
                           $("#datos_a_enviar_pdf").val($("table").html());
                           $("#exportarPdf").submit();
                       }else{
                           alert("no hay datos que exportar.");
                       }
               });
            });
        </script>
        <style>
            #btngrabar{
                margin-right:15px;
            }
        </style>
    </head>
    <body>
        <noscript>
            <h1 align="center" style="color:red;font-size: 40px;">
                         Javascript Desactivado <br/>
                         -- NO UTILIZAR EL SISTEMA --
            </h1>
        </noscript>
        <?php if(isset($_SESSION["usuario"])): ?>

            <nav class="navbar navbar-default navbar-fixed-top" style="border-bottom: 7px solid #071689;">
              <div class="container-fluid" >
              <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="border: 1px solid #071689;">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar" style="border: 1px solid #071689;"></span>
                    <span class="icon-bar" style="border: 1px solid #071689;"></span>
                    <span class="icon-bar" style="border: 1px solid #071689;"></span>
                  </button>
                  <a class="navbar-brand" href="#"><img src="/img/icono.png" style="margin-top: -8px;" alt="Universidad Favaloro"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right" style="border-bottom: 7px solid #f6303f; margin-bottom: -7px;">
                     <?php if(isset($_SESSION["usuario"])): ?>
                        <?php require '_menu.php' ?>
                     <?php endif; ?>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid style="border-bottom: 5px solid #071689;"-->
            </nav>
        <?php endif; ?>
                
        <div class="container-fluid">            
            <div  class="row-fluid" id="flashMessages" >
              <?php include_partial('services/flashes') ?>
            </div>
            <div class="row-fluid" id="content" >
              <?php require '_load.php' ?>
            <div>
               <?php echo $sf_content ?>
                <br/>
                <br/>
            <div class="navbar navbar-fixed-bottom" id="footer">
              <div class="container-fluid">
                <?php if(isset($_SESSION["usuario"])): ?>
                
                    <!--<ul class="nav navbar-nav">
                        <li><strong>Sistema <?php //echo $_SESSION["usuario"]["version"];?></strong></li> 
                        <li><span class="divider"> - </span></li> 
                        <li><?php //if(isset($_SESSION["usuario"]["username"])): ?> <?php //echo $_SESSION["usuario"]["username"]; ?><span class="divider"> - </span> <?php //endif; ?></li> 
                        <li><?php //if(isset($_SESSION["usuario"]["username"])): ?> <?php //echo $_SESSION["hoy"];?><?php //endif; ?></li>
                    </ul> -->
                    <b><?php echo $_SESSION["usuario"]["version"];?></b><?php echo ' ',$_SESSION["hoy"];?>
                    <a class="btn btn-xs btn-danger pull-right" href="<?php echo url_for("sfGuardAuth/signout") ?>">Cerrar Sesión</a>
                
                <?php endif; ?>
              </div>
            </div>
        <?php require '_script.php'; ?>
        <form id="exportarExcel" name="exportarExcel" method="POST"  action="<?php echo url_for('exportacion/excel'); ?>">
           <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
        </form>
        <form id="exportarPdf" name="exportarPdf" method="POST"  action="<?php echo url_for('exportacion/pdf'); ?>">
           <input type="hidden" id="datos_a_enviar_pdf" name="datos_a_enviar_pdf" />
        </form>
    </body>
</html>
