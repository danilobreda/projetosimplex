<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Simplex</title>
</head>
<body>
	<?php 
	if(!isset($_POST['funcao']) && !isset($_POST['sujeito']) && !isset($_POST['sujeito2']) && !isset($_POST['sujeito']) && !isset($_POST['qtdemaxima']))
	{
		echo "entrada incorreta";
		die;
	}
	
	$funcao = $_POST['funcao'];
	$sujeito = $_POST['sujeito'];
	$sujeito2 = $_POST['sujeito2'];
	$qtdemaxima = $_POST['qtdemaxima'];
	$somenteresultado = false;
	if(isset($_POST['somenteresultado']))
		$somenteresultado = true;
	
	/////////////////////////////////////////////////
	//Arrumando funcao objetiva:
	
	$funcoreplaced = str_replace(" ", "", $funcao);
	$funcaoexploded = explode("+", $funcoreplaced);	
	$funcaoelementos;
	$i = 0;
	if(!empty($funcaoexploded)) 
	{
		for ($i = 0; $i < count($funcaoexploded); $i++) 
		{
			$value = explode("x", $funcaoexploded[$i])[0];
			$index = explode("x", $funcaoexploded[$i])[1] - 1;
			
			$funcaoelementos[$index] = $value;
		}
	}
	print_r($funcaoelementos);
	
	/////////////////////////////////////////////////
	//Arrumando a regras:
	
	for ($i = 0; $i < count($funcaoexploded); $i++) 
	{
		$value = explode("x", $funcaoexploded[$i])[0];
		$index = explode("x", $funcaoexploded[$i])[1] - 1;
		
		$funcaoelementos[$index] = $value;
	}
	
	
	/////////////////////////////////////////////////
	
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
