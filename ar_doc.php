<?php
	
	header("Location: actualiza_doc.php");
	
	echo '<p><a href="recep_docs.php">REGRESAR</a></p>';
	
	$n_reg = $_POST["n_reg"];
	//$fecha_recep = $_POST["fecha_recep"];
	//$tipo_doc = $_POST["lista1"];
	//$nombre_rem = $_POST["nombre_rem"];
	//$n_folios = $_POST["n_folios"];
	//$asunto = $_POST["asunto"];
	$decreto = $_POST["decreto"];
	$p_resp_at = $_POST["p_resp_at"];
	$obs = $_POST["obs"];
	//$firma = $_POST["firma"];
	//$anho = $_POST["anho"];
		

	$mysqli = new mysqli ('localhost','root','','docu_drpuno');
	$acentos = $mysqli->query("SET NAMES 'utf8'");
	
	if ($mysqli->connect_errno){
	echo 'la pagina tiene problemas';
	echo 'error no: '.$mysqli->connect_errno.'</br>';
	echo 'error: '.$mysqli->connect_error.'</br>';
	exit;
	}
	
	// INICIA - CREAR TABLA
	$sql = "UPDATE reg_recep SET decreto, p_resp_at, obs 
	WHERE n_reg=" . $n_reg;
	if (!$result = $mysqli->query($sql)){
			// no se pudo insertar en la tabla
	}
	

	
	exit;

?>