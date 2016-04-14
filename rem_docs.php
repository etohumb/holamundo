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
	$sql = "CREATE TABLE IF NOT EXISTS reg_emi (id INT AUTO_INCREMENT, n_reg TEXT, fecha_emi DATETIME NOT NULL DEFAULT NOW(), 
	n_folios TEXT, tipo_doc TEXT, nombre_dest TEXT, asunto TEXT, distrib TEXT, obs TEXT, 
	firma TEXT, anho TEXT, PRIMARY KEY (id))";
	if (!$result = $mysqli->query($sql)){
			// no se pudo crear la tabla
	}
	// FIN - CREAR TABLA
				
	echo '<html><head><title>REGISTRO DE DOCUMENTOS DR PUNO</title>
	<link href="misestilos.css" rel="stylesheet" type="text/css"></head>	
	<body bgcolor="#0055aa">';
	//<body background="low_logo.png">';

	echo '<table><tr><td>';
	
	//<img src=low_logo.png alt=Senamhi height=65 width=150>
	
	echo '<form action="e_doc.php" method="POST" enctype="multipart/form-data">';
	
	echo '<fieldset><legend>DOCUMENTOS REMITIDOS</legend>';
	
	echo 'Num REGISTRO : <input type="text" name="n_reg" size="10"/>&nbsp &nbsp &nbsp
	 FECHA EMISION : <input type="text" name="fecha_emi" size="10"/></br>
	 TIPO DOCUMENTO : &nbsp &nbsp &nbsp
	 <select name="lista2">
		<optgroup label="Remitido">
			<option></option>
			<option>oficio</option>
			<option>oficio_mult</option>
			<option>memorando</option>
			<option>memorando_mult</option>
	 </select></br>
	 DESTINATARIO : <input type="text" name="nombre_dest" size="50"/></br>
	 Num FOLIOS : <input type="text" name="n_folios" size="6"/></br>
	 ASUNTO : </br><textarea name="asunto" rows="2" cols="30"/></textarea></br>
	 DISTRIBUCION : <input type="text" name="distrib" size="50"/></br>
	 OBSERVACIONES : </br><textarea name="obs" rows="2" cols="30"/></textarea></br>';
	
	echo '<p><input type="submit" name="enviar" value="REMITIR..." /></p>';
	
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