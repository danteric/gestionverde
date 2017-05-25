        <?php  //echo "<pre>";print_r($_SESSION["usuario"]["acceso"]);die; ?>
        <?php foreach($_SESSION["usuario"]["acceso"] as $itemK => $itemV) { ?>
            <li class="dropdown">
                <?php $tit=substr($itemK,0,strpos($itemK, '|'))?>
                <?php $ico="\"". substr($itemK,strpos($itemK, '|')+1,strlen($itemK))."\""?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #071689;font-family: Trebuchet MS;font-size: 15px;"><i class="icon-play"></i>&nbsp;&nbsp;<?php echo utf8_encode($tit) ?></a>
                <ul class="dropdown-menu">
                    <?php foreach($itemV as $itemSubMenu) { ?>
                    <li><a href="<?php echo url_for($itemSubMenu[2]) ?>" style="color: #071689;"><?php echo utf8_encode($itemSubMenu[0]) ?></a></li>
                    <?php }?>
                </ul>
            </li>
        <?php } //die("--"); ?>
  

