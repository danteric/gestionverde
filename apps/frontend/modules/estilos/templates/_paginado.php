<div>
  <ul class="pager">
    <li class="<?php if ($pagina==1) echo ' disabled';  ?>">
      <a href="#"<?php if ($pagina!=1): ?>onclick="primeraPagina();"<?php endif; ?>>&laquo; Primera</a>
    </li> 
    <li class="<?php if ($pagina==1) echo ' disabled';  ?>">
      <a href="#" <?php if ($pagina!=1): ?>onclick="prevPagina();"<?php endif; ?>>&larr; Anterior</a>
    </li>
    <li style="width: 65%;"><a>
           <span class="badge badge-info">Pág(<?php echo $pagina ?>)</span>
           <span class="badge">Páginas(<?php echo $total_paginas ?>)</span> 
           <span class="badge badge-success">Items(<?php echo $total_registros ?>)</span> 
		</a>
    </li>
    <li class="<?php if ($pagina==$total_paginas || $total_paginas==0) echo ' disabled';  ?>">
      <a href="#" <?php if ($pagina!=$total_paginas && $total_paginas!=0): ?>onclick="ultimaPagina();"<?php endif; ?>>Ultima &rarr;</a>
    </li>
    <li class="<?php if ($pagina==$total_paginas || $total_paginas==0) echo ' disabled';  ?>">
      <a href="#" <?php if ($pagina!=$total_paginas  && $total_paginas!=0): ?>onclick="nextPagina();"<?php endif; ?> >Siguiente &raquo;</a>
    </li>       
  </ul>
</div>