<?php
	echo '<html><head><title>REGISTRO DE DOCUMENTOS DR PUNO</title>
	<link href="misestilos.css" rel="stylesheet" type="text/css"></head>	
	<body> ';
	
	
	$mysqli = new mysqli ('localhost','root','','docu_drpuno');
	$acentos = $mysqli->query("SET NAMES 'utf8'");
	
	if ($mysqli->connect_errno){
	echo 'la pagina tiene problemas';
	echo 'error no: '.$mysqli->connect_errno.'</br>';
	echo 'error: '.$mysqli->connect_error.'</br>';
	exit;
	}
	
	// INICIA - CREAR TABLA
	$sql = "SELECT * FROM reg_emi ORDER BY id DESC";
	if (!$result = $mysqli->query($sql)){
			// no se pudo insertar en la tabla
	}
	
	$resultados = $result->fetch_assoc();
	
	$n_reg1 = $resultados['n_reg'];
	$fecha_emi1 = $resultados['fecha_emi'];
	$tipo_doc1 = $resultados['tipo_doc'];
	$nombre_dest1 = $resultados['nombre_dest'];
	
	
	// INICIA - CREAR TABLA
	$sql = "SELECT * FROM reg_recep ORDER BY id DESC";
	if (!$result = $mysqli->query($sql)){
			// no se pudo insertar en la tabla
	}
	
	$resultados = $result->fetch_assoc();
	
	$n_reg2 = $resultados['n_reg'];
	$fecha_emi2 = $resultados['fecha_recep'];
	$tipo_doc2 = $resultados['tipo_doc'];
	$nombre_dest2 = $resultados['nombre_rem'];

	echo '<p align=center>ULTIMOS DOCUMENTOS REGISTRADOS</p>';
	echo 'RECEPCIONADOS</br>';
	echo 'Ultimo N Registro: ' . $n_reg2 . ' &nbsp &nbsp &nbspfecha de recepcion: ' . $fecha_emi2 .
	' &nbsp &nbsp &nbspTipo docu.: ' . $tipo_doc2 . ' &nbsp &nbsp &nbspRemitente: ' . $nombre_dest2 . '</br>';
	echo '<hr>EMITIDOS</br>';
	echo 'Ultimo N Registro: ' . $n_reg1 . ' &nbsp &nbsp &nbspfecha de emision: ' . $fecha_emi1 .
	' &nbsp &nbsp &nbspTipo docu.: ' . $tipo_doc1 . ' &nbsp &nbsp &nbspDestinatario: ' . $nombre_dest1;
	

	echo '</body></html>';
?>