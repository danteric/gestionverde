<?php 
    function tamano_archivo($peso , $decimales = 2 ) {
    $clase = array(" Bytes", " KB", " MB", " GB", " TB"); 
    return round($peso/pow(1024,($i = floor(log($peso, 1024)))),$decimales ).$clase[$i];
    }
?>
<style>
#tabs
{
  overflow: auto;
  width: 100%;
  list-style: none;
  margin: 0;
  padding: 0;
}

#tabs li
{
    margin: 0;
    padding: 0;
    float: left;
}

#tabs a
{
    -moz-box-shadow: -4px 0 0 rgba(0, 0, 0, .2);
    -webkit-box-shadow: -4px 0 0 rgba(0, 0, 0, .2);
    box-shadow: -4px 0 0 rgba(0, 0, 0, .2);
    background: #ad1c1c;
    background:    -moz-linear-gradient(220deg, transparent 10px, #787777 10px);
    background:    -webkit-linear-gradient(220deg, transparent 10px, #787777 10px);     
    background:     -ms-linear-gradient(220deg, transparent 10px, r#787777 10px); 
    background:      -o-linear-gradient(220deg, transparent 10px, #787777 10px); 
    background:         linear-gradient(220deg, transparent 10px, #787777 10px);
    text-shadow: 0 1px 0 rgba(0,0,0,.5);
    color: #fff;
    float: left;
    font: bold 12px/35px 'Lucida sans', Arial, Helvetica;
    height: 35px;
    padding: 0 30px;
    text-decoration: none;
}

#tabs a:hover
{
    background: #c93434;
    background:    -moz-linear-gradient(220deg, transparent 10px, #c93434 10px);
    background:    -webkit-linear-gradient(220deg, transparent 10px, #c93434 10px);     
    background:     -ms-linear-gradient(220deg, transparent 10px, #c93434 10px); 
    background:      -o-linear-gradient(220deg, transparent 10px, #c93434 10px); 
    background:         linear-gradient(220deg, transparent 10px, #c93434 10px);     
}

#tabs a:focus
{
    outline: 0;
}

#tabs #current a
{
    background: #fff;
    background:    -moz-linear-gradient(220deg, transparent 10px, #fff 10px);
    background:    -webkit-linear-gradient(220deg, transparent 10px, #fff 10px);     
    background:     -ms-linear-gradient(220deg, transparent 10px, #fff 10px); 
    background:      -o-linear-gradient(220deg, transparent 10px, #fff 10px); 
    background:         linear-gradient(220deg, transparent 10px, #fff 10px);
    text-shadow: none;    
    color: #333;
    border-collapse: inherit;
}

#content
{
    background-color: #fff;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#fff));
    background-image: -webkit-linear-gradient(top, #fff, #fff); 
    background-image:    -moz-linear-gradient(top, #fff, #fff); 
    background-image:     -ms-linear-gradient(top, #fff, #fff); 
    background-image:      -o-linear-gradient(top, #fff, #fff); 
    background-image:         linear-gradient(top, #fff, #fff);
    -moz-border-radius: 0 2px 2px 2px;
    -webkit-border-radius: 0 2px 2px 2px;
    border-radius: 0 2px 2px 2px;
    -moz-box-shadow: 0 2px 2px #000, 0 -1px 0 #fff inset;
    -webkit-box-shadow: 0 2px 2px #000, 0 -1px 0 #fff inset;
    box-shadow: 0 2px 2px #B4C519, 0 -1px 0 #fff inset;
    padding: 30px;
}

/* Remove the rule below if you want the content to be "organic" */
#content div
{
    height: 190px;
}

/* --- */
#about
{
    color: #999;
}

#about a
{
    color: #eee;
}
</style>
</head>



<ul id="tabs">
    <li><a href="#" title="tab1">Consultas</a></li>
    <li><a href="#" title="tab2">Conexiones</a></li>
    <li><a href="#" title="tab3">Ejemplos</a></li>   
    
</ul>
                       
<div id="content"> 
    <div id="tab1">
       <!-- <p>
        	<select  
			<?php
			    $cont = 1;									
				foreach ($Rows as $arraySelect) { 
				  ?>
					 <option  class="text-left text-info" value='<?php echo $arraySelect["OP_".$cont] ?>'><?php echo $arraySelect["OP_".$cont] ;?>  </option>
				   
			<?php $cont++;	} ?>
			</select>
			</p>
			-->
	<h6>El query tiene que ser sin ';' al final</h6> 
	<textarea name="queryconsulta" cols="41" rows="5" id="queryconsulta" class=" " style="width: 1015px; height: 112px; ">  </textarea>
	<div id="fotocargando" style="width: 100%; text-align: right; display:none" ><img src="img/ajax-loader.gif"><p> <div class="text-info">Su consulta esta en proceso</div></div>
	<br>

    <button class="combopaginado4 " title="Listar todos" style="color: red; text-decoration: bold" id="resumenStatus">Ejecutar Query</button>
    </div>
    <div id="tab2" class="">
        <h5>Seleccione una conexion</h5>
        <p> 
        	 
                            
                      <input type="hidden" id="conexelegida" name="conexelegida" value="" />    
                     <?php $num= 0;foreach($aDevices as $device) { ?>
                                    
                                        <label class="combopaginado4 " id="pinto_<?php echo $num; ?>" title="Conexiones">
                                            <input type="radio" value="<?=$device['code']?>" id="conex" Name="do_interest_11">
                                            <span><?=$device['name']?></span>
                                        </label>
                                    
                                <?php $num++; } ?>
       </p>
       
       			        <div class="button activo" style="display:none; height: 30px;"><?php echo "Parametros de conexion " ?>
		                      <input type="text" id="usuario" value="" placeholder="Usuario BD">
		                      <input type="password" id="pass" value="" placeholder="Pasword BD">
		                      <input type="text" id="host" class="input-xlarge" value="" placeholder="//localhost:1521/XE">
		                </div> 
          
    </div>
    <div id="tab3"   style="font-size: 8px">
		<h6>Ejemplos utiles</h6>
		<p>select * from USER_TABLES WHERE TABLESPACE_NAME = 'SMOGP'<br>
		SELECT * FROM ALL_OBJECTS WHERE OBJECT_TYPE IN ('FUNCTION','PROCEDURE','PACKAGE') and OWNER = 'SMOGAR'<br>
	    SELECT * FROM user_tab_columns WHERE table_name='xxxxxxxxx'<br>
		select distinct vs.sql_text, vs.sharable_mem,
		vs.persistent_mem, vs.runtime_mem, vs.sorts,
		vs.executions, vs.parse_calls, vs.module,
		vs.buffer_gets, vs.disk_reads, vs.version_count,
		vs.users_opening, vs.loads,
		to_char(to_date(vs.first_load_time,
		'YYYY-MM-DD/HH24:MI:SS'),'MM/DD HH24:MI:SS') first_load_time,
		rawtohex(vs.address) address, vs.hash_value hash_value ,
		rows_processed , vs.command_type, vs.parsing_user_id ,
		OPTIMIZER_MODE , au.USERNAME parseuser
		from v$sqlarea vs , all_users au
		where (parsing_user_id != 0) AND
		(au.user_id(+)=vs.parsing_user_id)
		and (executions >= 1) order by buffer_gets/executions desc<br>
		SELECT * from v$instance<br>
		SELECT * from v$system_parameter<br>
		SELECT osuser, username, machine, program from v$session order by osuser<br>
		SELECT program Aplicacion, count(program) Numero_Sesiones from v$session group by program order by Numero_Sesiones desc<br>
		SELECT username Usuario_Oracle, count(username) Numero_Sesiones from v$session group by username order by Numero_Sesiones desc<br>
		SELECT * from product_component_version<br>
		SELECT * from V$TABLESPACE</p>
	</div>
	
</div>



<script>
$(document).ready(function() {
	$("#content div").hide(); 
	$("#tabs li:first").attr("id","current");
	$("#content div:first").fadeIn(); 
    
    $('#tabs a').click(function(e) {
        e.preventDefault();        
        $("#content div").hide(); 
        $("#tabs li").attr("id",""); 
        $(this).parent().attr("id","current"); 
        $('#' + $(this).attr('title')).fadeIn(); 
    });
})();

</script>
