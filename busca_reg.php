<?php
	
	echo '<html><head><title>REGISTRO DE DOCUMENTOS DR PUNO</title>
	<link href="misestilos.css" rel="stylesheet" type="text/css"></head>	
	<body bgcolor="#0055aa">';
	
	echo '<table><tr><td>';
	echo '<form action="ar_doc.php" method="POST" enctype="multipart/form-data">';
	echo '<fieldset><legend>BUSQUEDA DOCUMENTOS RECIBIDOS</legend>';
	echo 'REGISTRO : <input type="text" name="n_reg" size="10"/> &nbsp 
	 FECHA : <input type="text" name="fecha_recep" size="10"/></br>
	 REMITENTE : <input type="text" name="nombre_rem" size="50"/></br>';
	echo '<input type="submit" name="enviar" value="BUSCA RECIBIDO"/>';
	echo '</fieldset>';
	echo '</form>';
	echo '</td></tr></table></body></html>';
	
	
?>