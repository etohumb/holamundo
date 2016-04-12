<?php

	$mysqli = new mysqli ('localhost','root','','docu_drpuno');
	$acentos = $mysqli->query("SET NAMES 'utf8'");
	
	if ($mysqli->connect_errno){
	echo 'la pagina tiene problemas';
	echo 'error no: '.$mysqli->connect_errno.'</br>';
	echo 'error: '.$mysqli->connect_error.'</br>';
	exit;
	}
	
	// INICIA - CREAR TABLA
	$sql = "CREATE TABLE IF NOT EXISTS reg_recep (id INT AUTO_INCREMENT, n_reg TEXT, fecha_recep TEXT, 
	tipo_doc TEXT, nombre_rem TEXT, n_folios TEXT, asunto TEXT, decreto TEXT, p_resp_at TEXT, obs TEXT, 
	firma TEXT, estado TEXT, PRIMARY KEY (id))";
	if (!$result = $mysqli->query($sql)){
		// no se pudo crear la tabla
	}
	// FIN - CREAR TABLA
				
	echo '<html><head><title>REGISTRO DE DOCUMENTOS DR PUNO</title>
	<link href="misestilos.css" rel="stylesheet" type="text/css"></head>	
	<body bgcolor="#0055aa">';

	echo '<table><tr><td>';
	
	echo '<form action="r_doc.php" method="POST" enctype="multipart/form-data">';
	
	echo '<fieldset><legend>DOCUMENTOS RECEPCIONADOS</legend>';
	
	echo 'Num REGISTRO : <input type="text" name="n_reg" size="10"/> &nbsp &nbsp
	 FECHA RECEPCION : <input type="text" name="fecha_recep" size="10"/></br>
	 TIPO DOCUMENTO : 
	 <select name="lista1">
		<optgroup label="Recibido">
			<option> </option>
			<option>comp_pago</option>
			<option>guia_rem</option>
			<option>pecosa</option>
			<option>planilla</option>
	 </select></br>
	 REMITENTE : <input type="text" name="nombre_rem" size="50"/></br>
	 Num FOLIOS : <input type="text" name="n_folios" size="6"/></br>
	 ASUNTO : </br><textarea name="asunto" rows="2" cols="30"/></textarea></br>
	 DECRETO : </br><textarea name="decreto" rows="2" cols="30"/></textarea></br>
	 PERSONAL RESP ATENCION : <input type="text" name="p_resp_at" size="50"/></br>
	 OBSERVACIONES : <input type="text" name="obs" size="50"/></br>
	 FIRMA : <input type="text" name="firma" size="40"/>&nbsp &nbsp &nbsp
	 ESTADO : <input type="text" name="estado" size="16" value="RECIBIDO"/></br>';
	
	echo '<input type="submit" name="enviar" value="RECIBIR..."/>';
	
	echo '</fieldset>';
	
	echo '</form>';

	echo '
	<script>
		window.onload = function mifun() {
			window.open("reporte.php", "up_right", 
			"toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=400, height=400")
		}
	</script>';
	
	echo '</td></tr></table></body></html>';

?>