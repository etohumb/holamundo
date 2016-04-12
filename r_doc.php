<?php
	
	header("Location: recep_docs.php");
	
	echo '<p><a href="recep_docs.php">REGRESAR</a></p>';
	
	$n_reg = $_POST["n_reg"];
	$fecha_recep = $_POST["fecha_recep"];
	$tipo_doc = $_POST["lista1"];
	$nombre_rem = $_POST["nombre_rem"];
	$n_folios = $_POST["n_folios"];
	$asunto = $_POST["asunto"];
	$decreto = $_POST["decreto"];
	$p_resp_at = $_POST["p_resp_at"];
	$obs = $_POST["obs"];
	$firma = $_POST["firma"];
	$estado = $_POST["estado"];
		

	$mysqli = new mysqli ('localhost','root','','docu_drpuno');
	$acentos = $mysqli->query("SET NAMES 'utf8'");
	
	if ($mysqli->connect_errno){
	echo 'la pagina tiene problemas';
	echo 'error no: '.$mysqli->connect_errno.'</br>';
	echo 'error: '.$mysqli->connect_error.'</br>';
	exit;
	}
	
	// INICIA - CREAR TABLA
	$sql = "INSERT INTO reg_recep (n_reg, fecha_recep, 
	tipo_doc, nombre_rem, n_folios, asunto, decreto, p_resp_at, obs, 
	firma, anho) VALUES ('$n_reg', '$fecha_recep', '$tipo_doc', '$nombre_rem', '$n_folios', '$asunto', 
	'$decreto', '$p_resp_at', '$obs', '$firma', '$anho')";
	if (!$result = $mysqli->query($sql)){
			// no se pudo insertar en la tabla
	}
	

	
	exit;

?>