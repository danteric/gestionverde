<?php $encabezado = Empresa::getEncabezado(); ?>
<table class="table" style="border:0; width: 100%; " border="0">
  <tr valign="top">
      <td>
        <img width="50%" src="data:image/png;base64, <?php echo base64_encode($encabezado['EMPR_LOGO']) ?>">
      </td>
      <td style="text-align:center">
        <b><?php echo $encabezado['EMPR_ENCABE_LISTADOS_DEPTO'] ?></b>
        <p>
          <b> <?php echo $titulo ?></b> - 
          <?php echo $subtitulo ?> - 
          Pág  <span id="pdf_page_current"></span>/<span id="pdf_page_count"></span> </p>
        <small>
<?php echo $encabezado['EMPR_RAZON_SOCIAL'] ?> / <?php echo date('d-m-Y') ?> / <?php echo Usuario::logueado() ?></small>
    </td>
  </tr>
</table>