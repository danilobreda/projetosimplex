<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Simplex</title>
</head>
<body>
	<h1>EM Construcao</h1>
	<?php 
	$funcao = $_POST['funcao'];
	$sujeito = $_POST['sujeito'];
	$qtdemaxima = $_POST['qtdemaxima'];
	$somenteresultado = $_POST['somenteresultado'];

	echo "funcao = ".$funcao." <br/>";
	echo "quantidade maxima = ".$qtdemaxima." <br/>";
	echo "somente resultado = ".$somenteresultado." <br/>";
	
	print_r($sujeito);
	
	
	/*foreach( $sujeito as $s ) {
	  print $s;
	}*/
	?>
</body>
</html>	
