<?php

	echo '<html><head>
	
	</head>
	
	<link href="rpc_css.css" rel="stylesheet" type="text/css">
	<title>DATOS ADELANTADOS - SISTEMA DE VOZ Y DATOS RPC</title><body>';
	echo '<font face="Arial" color=506499>
	<table><tr><td><img src=low_logo.png alt=Senamhi height=65 width=150></td>';
	echo '<td><font face="Arial" color=506499>';
	echo '<b>DATOS ADELANTADOS</br>
	SISTEMA DE VOZ Y DATOS RPC- DR PUNO </b></font></td></tr></table>';
	
	
	

 			$mysqli = new mysqli ('localhost','root','','rpc_a');
			$acentos = $mysqli->query("SET NAMES 'utf8'");

			if ($mysqli->connect_errno){
			echo 'la pagina tiene problemas';
			echo 'error no: '.$mysqli->connect_errno.'</br>';
			echo 'error: '.$mysqli->connect_error.'</br>';
			exit;
			}

		$sql = "SELECT Date_format(fecha, '%d-%m-%y') FROM rpc_adl GROUP BY Date_format(fecha, '%d-%m-%y') ORDER BY fecha";
		if (!$result = $mysqli->query($sql)){
				// no se pudo ejecutar
		}
		
		$dia=$result->fetch_row();
			$ayer = $dia[0];
		$dia=$result->fetch_row();
			$hoy = $dia[0];
		
		echo '</br>
		<table border=1><tr>';
			echo 'M&aacutexima del: '.$ayer;
			echo ' M&iacutenima del: '.$hoy;
		echo '</tr><tr>
		<td>Estacion</td><td>T.MAXIMA</td><td>T.MINIMA</td><td>PRECIPI</br>TACION</td><td>TIEMPO</td></tr>';
		
		$estaciones = array(
			"00114043", // Tambopata
			"00114039", // macusani
			"00114058", // crucero
			"00114050", // ananea
			"00114042", // muñani
			"00114093", // putina
			"00114041", // azangaro
			"00114047", // santa rosa
			"00114035", // chuquibambilla
			"00114034", // llally
			"00114038", // ayaviri
			"00115035", // arapa
			"00115037", // huancane
			"00115038", // moho
			"00100021", // capachica
			"00100081", // lampa
			"00115051", // mañaso
			"00100110", // puno
			"00100088", // los uros
			"00116033", // laraqueri
			"00116061", // juli
			"00116029",	// pisacoma
			
			"00210301", // r ilave
			"00210102", // r azangaro
			"00210502", // r callacame
			"00210407", // r coata
			"00210201", // r huancane
			"00210101", // r ramis
			"00270503", // r zapatilla
			"00270700" // r desaguadero
		);
		
		$nomb_estaciones = array(
			"Tambopata", // Tambopata
			"Macusani", // macusani
			"Crucero", // crucero
			"Ananea", // ananea
			"Mu&ntildeani", // muñani
			"Putina", // putina
			"Azangaro", // azangaro
			"Santa Rosa", // santa rosa
			"Chuquibambilla", // chuquibambilla
			"Llalli", // llally
			"Ayaviri", // ayaviri
			"Arapa", // arapa
			"Huancane", // huancane
			"Moho", // moho
			"Capachica", // capachica
			"Lampa", // lampa
			"Ma&ntildeazo", // mañazo
			"Puno", // puno
			"Los Uros", // los uros
			"Laraqueri", // laraqueri
			"Juli", // juli
			"Pisacoma",	// pisacoma
			
			"Rio Ilave", // r ilave
			"Rio Azangaro", // r azangaro
			"Rio Callacam", // r callacame
			"Rio Coata", // r coata
			"Rio Huancane", // r huancane
			"Rio Ramis", // r ramis
			"Rio Zapatilla", // r zapatilla
			"Rio Desaguadero" // r desaguadero
			
		);
		
		
		for ($j=0;$j<=21;$j++){
			//++++++++++++++++++++++++ESTACIONES MWTEOROLOGICAS+++++++++++++++++++++++++++++++++++++++
			echo '<tr>';		
		
			// MAXIMA
			$sql = "select datov, Date_format(fecha, '%d-%m-%y') from rpc_adl where cod_est='" . $estaciones[$j] . "' and codpar='TM' and codcorr='102' order by fecha";
			if (!$result = $mysqli->query($sql)){
					// no se pudo ejecutar
			}
			$resultados = $result->fetch_assoc();
		
			echo '<td>'. $nomb_estaciones[$j] .'</td>';
			
			if ($resultados["Date_format(fecha, '%d-%m-%y')"]===$ayer){
				echo '<td>'.$resultados['datov'].'</td>';
			} else {
				echo '<td></td>';
			}
			
			// MINIMA
			$sql = "select datov, Date_format(fecha, '%d-%m-%y') from rpc_adl where cod_est='". $estaciones[$j] ."' and codpar='TM' and codcorr='103' order by fecha desc";
			if (!$result = $mysqli->query($sql)){
					// no se pudo ejecutar
			}
			$resultados = $result->fetch_assoc();
			
			if ($resultados["Date_format(fecha, '%d-%m-%y')"]===$hoy){
				echo '<td>'.$resultados['datov'].'</td>';
			} else {
				echo '<td></td>';
			}
			
			// PRECIPITACION
			$sql = "select datov, Date_format(fecha, '%d-%m-%y') from rpc_adl where cod_est='". $estaciones[$j] ."' and codpar='PT' and codcorr='103' order by fecha";
			if (!$result = $mysqli->query($sql)){
					// no se pudo ejecutar
			}

			$resultados = $result->fetch_assoc();

			$ia = 0;
			$ib = 0;
			
			if ($result->num_rows === 0) {
				$ia = '';
			} else {
				if ($resultados["Date_format(fecha, '%d-%m-%y')"]===$ayer){
					$ia = $resultados['datov'];
				} else {
					$ia = '';
				}
			}
			
			$result->free();
			
			$sql = "select datov, Date_format(fecha, '%d-%m-%y') from rpc_adl where cod_est='". $estaciones[$j] . "' and codpar='PT' and codcorr='102' order by fecha desc";
			if (!$result = $mysqli->query($sql)){
					// no se pudo ejecutar
			}
			
			$resultados = $result->fetch_assoc();
			
			if ($result->num_rows === 0) {
				$ib = '';
			} else {
			if ($resultados["Date_format(fecha, '%d-%m-%y')"]===$hoy){
					$ib = $resultados['datov'];
				} else {
					$ib = '';
				}
			}
					
			echo '<td>';
			
			if ($ia<>'' and $ib<>''){
			
				echo $ia+$ib.'</td>';
			} else {
				echo '</td>';
			}
			
			// ESTADO TIEMPO
			$sql = "select datov, Date_format(fecha, '%d-%m-%y') from rpc_adl where cod_est='" . $estaciones[$j] . "' and codpar='NB' and codcorr='105' order by fecha desc";
			if (!$result = $mysqli->query($sql)){
					// no se pudo ejecutar
			}
			$i = 0;
			$resultados = $result->fetch_assoc();
			if ($result->num_rows === 0) {
				$i = $i-9;
			} else {
				if ($resultados['datov']=='-999'){}
				elseif ($resultados["Date_format(fecha, '%d-%m-%y')"]===$ayer) {
					$i = $i-9;
				} else {
					$i = $i + $resultados['datov'];}
			}
			
			$sql = "select datov, Date_format(fecha, '%d-%m-%y') from rpc_adl where cod_est='" . $estaciones[$j] . "' and codpar='NB' and codcorr='108' order by fecha desc";
			if (!$result = $mysqli->query($sql)){
					// no se pudo ejecutar
			}
			$resultados = $result->fetch_assoc();
			if ($result->num_rows === 0 and $resultados["Date_format(fecha, '%d-%m-%y')"]===$ayer) {
				$i = $i-9;
			} else {
				if ($resultados['datov']=='-999'){}
				elseif ($resultados["Date_format(fecha, '%d-%m-%y')"]===$ayer) {
					$i = $i-9;
				} else {
					$i = $i + $resultados['datov'];}
			}
			
			$sql = "select datov, Date_format(fecha, '%d-%m-%y') from rpc_adl where cod_est='" . $estaciones[$j] . "' and codpar='NB' and codcorr='110' order by fecha desc";
			if (!$result = $mysqli->query($sql)){
					// no se pudo ejecutar
			}
			$resultados = $result->fetch_assoc();
			if ($result->num_rows === 0 and $resultados["Date_format(fecha, '%d-%m-%y')"]===$ayer) {
				$i = $i-9;
			} else {
				if ($resultados['datov']=='-999'){}
				elseif ($resultados["Date_format(fecha, '%d-%m-%y')"]===$ayer) {
					$i = $i-9;
				} else {
					$i = $i + $resultados['datov'];}
			}
			
			echo '<td>';
			if ($i==0){
			$ii = 'D';}
			 elseif ($i==1 or $i==2){ //1-2
			 $ii = 'Nd';}
			 elseif ($i==3 or $i==4){ //3-4
			 $ii = 'Np';}
			 elseif ($i==5 or $i==6){ //5-6
			 $ii = 'N';}
			 elseif ($i==7 or $i==8){ //7-8
			 $ii = 'Cub';}
			 else{
			 $ii = ' ';}
			
			echo $ii.'</td>';
			
			echo '</tr>';
			//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		
		}
		
		echo '<tr><td>ESTACIONES </br>HIDROLOGICAS</td></tr>';
		echo '<tr><td>Estacion</td><td>NIVEL DEL </br>' . $ayer .'</td><td>NIVEL DEL </br>' . $hoy .'</td></tr>';
		
		//  SE IMPRIME PARTE HIDROLOGICA
		
		for ($j=22;$j<=29;$j++){
			//++++++++++++++++++++++++ESTACIONES HIDROLOGICAS+++++++++++++++++++++++++++++++++++++++
			echo '<tr>';		
		
			// NIVEL DIA ANTERIOR
			$sql = "select datov, Date_format(fecha, '%d-%m-%y') from rpc_adl where cod_est='" . $estaciones[$j] . "' and codpar='NI' and codcorr='101' order by fecha";
			if (!$result = $mysqli->query($sql)){
					// no se pudo ejecutar
			}
			$resultados = $result->fetch_assoc();
		
			echo '<td>'. $nomb_estaciones[$j] .'</td>';
			
			if ($resultados["Date_format(fecha, '%d-%m-%y')"]===$ayer){
				echo '<td>'.$resultados['datov'].'</td>';
			} else {
				echo '<td></td>';
			}
			
			// NIVEL DIA ACTUAL
			$sql = "select datov, Date_format(fecha, '%d-%m-%y') from rpc_adl where cod_est='". $estaciones[$j] ."' and codpar='NI' and codcorr='101' order by fecha desc";
			if (!$result = $mysqli->query($sql)){
					// no se pudo ejecutar
			}
			$resultados = $result->fetch_assoc();
			
			if ($resultados["Date_format(fecha, '%d-%m-%y')"]===$hoy){
				echo '<td>'.$resultados['datov'].'</td>';
			} else {
				echo '<td></td>';
			}
			
			
			
			echo '</tr>';
			//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		
		}
		
		
		echo '</table>';
		
		//}
	
	echo '</font>';

echo '</body></html>';
?>