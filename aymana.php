<?php

	echo '<title>VISUALIZADOR DE DATOS</title>';
	echo '<font face="ARIAL">';
	echo 'VISUALIZAR DATOS DE ESTACIONES EMA UPINA Y EMA AYMANA<br><br>';

	// REGRESAR A LA PAGINA INICIAL
	echo '<a href=/tambos.php>NUEVA BUSQUEDA</a><br><br>';

	// DIRECTORIO A LISTAR
	$path="./pruebas/aymana";
	$directorio=dir($path);

	// PILA DE NOMBRES
	$pn= array();

	// BUCLE PARA RELLENAR LA PILA DE NOMBRES
	while ($archivo = $directorio->read()){
		//no mostrar ni "." ni ".." ni el propio "index.php"
		if(($archivo!="index.php")&&($archivo!=".")&&($archivo!="..")){
			array_push($pn, $archivo);
		}
	}

	$directorio->close();
	array_multisort($pn);
	
	// CARPETA DONDE SE ENCUENTRAN LOS ARCHIVOS
	$file = fopen($path."/".$pn[1], "r");
	$datos = explode(";", fgets($file),28);
	
	// SE DEFINE LA FECHA DE INICIO Y FINAL DE LA BUSQUEDA
	if(isset($_POST["finicio"]) && isset($_POST["ffinal"])){
		$inicio = $_POST["finicio"];
		$final = $_POST["ffinal"];
		$final = strtotime(date('Y-m-d H:i:s',$final) . '+24 seconds');
	}
	else{
		$inicio = 0;
		$final = 0;
	}
	
	//++++++++++++
	echo date('Y-m-d H:i:s',$inicio) . '---' . date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s',$final) . '+24 seconds'));
	echo '<p></p>' . $inicio . '---' . strtotime(date('Y-m-d H:i:s',$final) . '+24 seconds');
	//++++++++++++
	
	// SE DESCARGA LOS INDICES DE LAS VARIABLES A MOSTRAR
	$campos = $_POST["campo"];
  
	//mostrar los datos
	// TABLA DONDE SE PRESENTAN LOS DATOS
	echo '<table border=1> 
	<tr>
	<td>'.$datos[0].'</td>
	<td>'.$datos[1].'</td>';
	for($k = 2; $k < 28; $k++){
		// SI SE RECIBIO EL INDICE DE LA VARIABLE SE MUESTRA
		if (isset($campos[$k])){
			echo '<td>'.$datos[$k].'</td>';
		}
	}
	echo '</tr>';

	$cuenta = count($pn);
	for($i = $inicio; $i < $final; $i++){
		$file = fopen($path."/".$pn[$i], "r");  // CARPETA DONDE SE ENCUENTRAN LOS ARCHIVOS
		$datos = explode(";", fgets($file),28);
		$datos2 = explode(";", fgets($file),28);
		
		echo '<tr>
		<td>'.$datos2[0].'</td>
		<td>'.$datos2[1].'</td>';
		if ($datos2==2){
			echo '<td>'.$datos2[2].'</td>';
		}
	
		for($k = 2; $k < 28; $k++){
		// SI SE RECIBIO EL INDICE DE LA VARIABLE SE MUESTRA
			if (isset($campos[$k])){
				echo '<td>'.$datos2[$k].'</td>';
			}
		}
	}

	fclose($file);

	echo '</tr></table></font>';

?>