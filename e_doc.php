<?php
	
	header("Location: rem_docs.php");
	
	echo '<p><a href="rem_docs.php">REGRESAR</a></p>';
	
	$n_reg = $_POST["n_reg"];
	$fecha_emi = $_POST["fecha_emi"];
	$tipo_doc = $_POST["lista2"];
	$nombre_dest = $_POST["nombre_dest"];
	$n_folios = $_POST["n_folios"];
	$asunto = $_POST["asunto"];
	$distrib = $_POST["distrib"];
	//$p_resp_at = $_POST["p_resp_at"];
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
	$sql = "INSERT INTO reg_emi (n_reg, fecha_emi, 
	tipo_doc, nombre_dest, n_folios, asunto, distrib, obs) 
	VALUES ('$n_reg', '$fecha_emi', '$tipo_doc', '$nombre_dest', '$n_folios', '$asunto', 
	'$distrib', '$obs')";
	if (!$result = $mysqli->query($sql)){
			// no se pudo insertar en la tabla
	}
	

	
	exit;

?>