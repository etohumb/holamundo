<?php
	
	//header("Location: recep_docs.php");
	

	$hola = $_POST["hola"];
	$chau = $_POST["chau"];
	
	echo 'lo que escribiste es : ' . $hola . ' y ' . $chau;
	
	
	
	/*
	$mysqli = new mysqli ('localhost','etofirei_13','drpunosenamhi','etofirei_j25');
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
	firma, estado) VALUES ('$n_reg', '$fecha_recep', '$tipo_doc', '$nombre_rem', '$n_folios', '$asunto', 
	'$decreto', '$p_resp_at', '$obs', '$firma', '$estado')";
	if (!$result = $mysqli->query($sql)){
			// no se pudo insertar en la tabla
	}
	

	
	exit;
*/
?>