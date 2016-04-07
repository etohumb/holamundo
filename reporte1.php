<?php
	echo '<html><head><title>REGISTRO DE DOCUMENTOS DR PUNO</title></head>	
	<body> ';
	
	
	$mysqli = new mysqli ('localhost','root','','docu_drpuno');
	$acentos = $mysqli->query("SET NAMES 'utf8'");
	
	if ($mysqli->connect_errno){
	echo 'la pagina tiene problemas';
	echo 'error no: '.$mysqli->connect_errno.'</br>';
	echo 'error: '.$mysqli->connect_error.'</br>';
	exit;
	}
	
	
	// INICIA - CONSULTA DOC RECIBIDOS
	$sql = "SELECT * FROM reg_recep ORDER BY id ASC LIMIT 10,20";
	if (!$result = $mysqli->query($sql)){
			// no se pudo insertar en la tabla
	}
	
	echo '<p align=center>RELACION DE DOCUMENTOS RECIBIDOS DEL MES</p>';
	echo '<table border=1><tr><td>
	Num Reg.</td><td>Fecha Recep.</td><td>Tipo Docum</td><td>Remitente</td><td>Num Folios</td><td>Asunto</td><td>Decreto</td><td>Resp Atencion</td><td>Observacion</td><td>Firma</td><td>H. Atencion
	</td></tr>';	
	
	while ($resultados = $result->fetch_assoc()) {
	
	//$n_reg2 = $resultados['n_reg'];
	//$fecha_emi2 = $resultados['fecha_recep'];
	//$tipo_doc2 = $resultados['tipo_doc'];
	//$nombre_dest2 = $resultados['nombre_rem'];


	
		echo '<tr><td>' . $resultados['n_reg'] . '</td><td>' . $resultados['fecha_recep'] . '</td><td>Tipo Docum</td><td>Remitente</td><td>Num Folios</td><td>Asunto</td><td>Decreto</td><td>Resp Atencion</td><td>Observacion</td><td>Firma</td><td>H. Atencion
	</td></tr>';
	
	}
	
	
	echo '</table>';
	
	echo '</body></html>';


?>