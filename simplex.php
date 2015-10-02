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
	$sujeito2 = $_POST['sujeito2'];
	$qtdemaxima = $_POST['qtdemaxima'];
	$somenteresultado = $_POST['somenteresultado'];

	$teste = explode(" ", $funcao);

	$i = 0;
	if(!empty($funcao)) {
		echo $teste[0].'x'.($i+1);
	
		for ($i = 1; $i < count($teste); $i++) {
			echo " + " . $teste[$i].'x'.($i+1);
		}
	}
	echo "<br/>quantidade maxima = ".$qtdemaxima." <br/>";
	echo "somente resultado = ".$somenteresultado." <br/>";
	
	print_r($sujeito);
	print_r($sujeito2);
	
	
	/*foreach( $sujeito as $s ) {
	  print $s;
	}*/
	?>
</body>
</html>	
