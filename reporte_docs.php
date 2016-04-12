<?php
	echo '<html><head><title>REGISTRO DE DOCUMENTOS DR PUNO</title>
	<link href="misestilos.css" rel="stylesheet" type="text/css"></head>	
	<body bgcolor="#0055aa">';
	//<body background="low_logo.png">';
	
	echo '<table border=1 width=170>';
	echo '<tr><td><a href="recep_docs.php" target="up_left">RECEPCIONADOS</a></td></tr>';
	echo '<tr><td><a href="rem_docs.php" target="up_left">EMITIDOS</a></td></tr>';
	echo '<tr><td><a href="busca_reg.php" target="dn_cent">BUSCAR DOCUMENTOS</a></td></tr>';
	//echo '<tr><td><a href="actualiza_rem.php" target="up_left">ACTUALIZA EMITIDOS</a></td></tr>';
	echo '</table>';


	echo '<table border=1 width=170>';
	echo '<tr><td><a href="reporte.php" target="up_right">ULTIMO REGISTRO</a></td></tr>';
	echo '<tr><td><a href="reporte1.php" target="up_right">RELACION RECIBIDOS</a></td></tr>';
	echo '<tr><td><a href="reporte2.php" target="up_right">RELACION EMITIDOS</a></td></tr>';
	echo '<tr><td><a href="reporte2.php" target="up_right">DESCARGO DIARIO</a></td></tr>';
	echo '</table>';

	echo '</body></html>';
?>