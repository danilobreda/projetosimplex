<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style2.css">
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
	$regraselementovalor = $_POST['sujeito2'];//o array final das regras(resultado <=)
	$qtdemaxima = $_POST['qtdemaxima'];
	$somenteresultado = false;
	if(isset($_POST['somenteresultado']))
		$somenteresultado = true;
	
	/////////////////////////////////////////////////
	//PRINTA INICIO:
	
	PrintaInicio($funcao, $sujeito, $regraselementovalor, $qtdemaxima);
	/////////////////////////////////////////////////
	
	$arraytabela; // tabela 2d, representa a tabela em si.
	$arraytabelabase; // tabela 1d, representa alguns elementos da tabelas separados.
	$arraytabelacolunas; // tabela 1d, representa alguns elementos da tabelas separados.
	
	$arraytodasbase; //tabela 2d, representa a tabela de variaveis basicas, [(0)simbolo,(1)valor].
	
	$funcaoelementos;//o array final da funcao objetiva
	$regraselemento;//o array final 2d das regras
	
	/////////////////////////////////////////////////
	//Arrumando funcao objetiva:
	
	$funcoreplaced = str_replace(" ", "", $funcao);
	$funcaoexploded = explode("+", $funcoreplaced);	
	if(!empty($funcaoexploded)) 
	{
		for ($i = 0; $i < count($funcaoexploded); $i++) 
		{
			$value = explode("x", $funcaoexploded[$i])[0];
			$index = explode("x", $funcaoexploded[$i])[1] - 1;
			$funcaoelementos[$index] = $value;
		}
	}
	//print_r($funcaoelementos);
	
	/////////////////////////////////////////////////
	//Arrumando as regras:
	for ($i = 0; $i < count($sujeito); $i++) 
	{
		$regrasreplaced = str_replace(" ", "", $sujeito[$i]);
		$regrasexploded = explode("+", $regrasreplaced);
		
		for ($j = 0; $j < count($regrasexploded); $j++) 
		{
			$value = explode("x", $regrasexploded[$j])[0];
			$index = explode("x", $regrasexploded[$j])[1] - 1;
			$regraselemento[$i][$index] = $value;
		}
	//print_r($regraselemento);
	}
	//print_r($regraselemento);
	
	
	/////////////////////////////////////////////////
	//definindo as bases:
	$index = 0;
	for ($i = 0 ; $i < count($regraselementovalor) ; $i++) 
	{
		$arraytodasbase[$index][0] = "f".($i+1);
		$arraytodasbase[$index][1] = $regraselementovalor[$i];
		$index++;
	}
	for ($i = 0 ; $i < count($funcaoelementos) ; $i++) 
	{
		$arraytodasbase[$index][0] = "x".($i+1);
		$arraytodasbase[$index][1] = 0;
		$index++;
	}
	//print_r($arraytodasbase);
	
	/////////////////////////////////////////////////
	//MONTA TABELA AUXILIARES:
	
	//BASE:
	$finalx = 0;
	for ($x = 0 ; $x < count($regraselementovalor); $x++) 
	{
		$arraytabelabase[$x] = $arraytodasbase[$x][0];
		$finalx = $x;
	}
		$arraytabelabase[$finalx + 1] = "z";
	//COLUNAS:
	$finalx = 0;
	for ($x = 0 ; $x < count($arraytodasbase) ; $x++) 
	{
		$arraytabelacolunas[$x] = $arraytodasbase[$x][0];
		$finalx = $x;
	}
	$arraytabelacolunas[$finalx + 1] = "b";
	
	//print_r($arraytabelabase);
	//echo "<br/>";
	//print_r($arraytabelacolunas);
	
	/////////////////////////////////////////////////
	//MONTA TABELA:
	
	$primeirox = -1;
	$primeiroy = -1;
	$primeirob = -1;
	$primeirofunc = -1;
	for ($x = 0 ; $x < count($arraytabelabase) ; $x++) 
	{
		for ($y = 0 ; $y < count($arraytabelacolunas) ; $y++) 
		{
			//DEFININDO LINHA Z
			if($arraytabelabase[$x] == "z")
			{
				//definindo F
				if(strpos($arraytabelacolunas[$y],'f') !== false)//ve se 'f' tem dentro
				{
					$arraytabela[$x][$y] = 0;
				}
				
				//definindo X
				if(strpos($arraytabelacolunas[$y],'x') !== false)//ve se 'x' tem dentro
				{
					if($primeirofunc == -1)
						$primeirofunc = $y;
					$arraytabela[$x][$y] = $funcaoelementos[$y - $primeirofunc] * -1;
				}
				//definindo B
				if($arraytabelacolunas[$y] == "b")
					$arraytabela[$x][$y] = 0;
			}
			else//DEFININDO OUTRAS LINHAS
			{
				//definindo F
				if($arraytabelabase[$x] == $arraytabelacolunas[$y])
					$arraytabela[$x][$y] = 1;
				else
					$arraytabela[$x][$y] = 0;
				
				//definindo X
				if(strpos($arraytabelacolunas[$y],'x') !== false)//ve se x tem dentro
				{
					if($primeirox == -1)
						$primeirox = $x;
					if($primeiroy == -1)
						$primeiroy = $y;
					
					if(!isset($regraselemento[$x - $primeirox][$y - $primeiroy]))// ARRUMA O BUG (CODIGO: 0001)
						$arraytabela[$x][$y] = 0;
					else					
						$arraytabela[$x][$y] = $regraselemento[$x - $primeirox][$y - $primeiroy];
				}
				
				//definindo B
				if($arraytabelacolunas[$y] == "b")
				{
					if($primeirob == -1)
						$primeirob = $x;
					$arraytabela[$x][$y] = $arraytodasbase[$x - $primeirob][1];
				}
			}
			//echo $arraytabelabase[$x]."+".$arraytabelacolunas[$y]."=".$arraytabela[$x][$y];
			//echo "<br/>";
		}
	}
	
	/////////////////////////////////////////////////
	//PRINTA TABELA:
	
	PrintaTabela($arraytabelabase, $arraytabelacolunas, $arraytabela);
	
	/////////////////////////////////////////////////
	//FUNCOES:
	function PrintaInicio($funcao, $sujeito, $regraselementovalor, $qtdemaxima)
	{
		echo "<table class=\"table2\">";
		echo "<tbody>";
		echo "<tr>";
			echo "<td>";
		echo "MAX Z:  ";
		echo "<br/>";
		echo $funcao;
		echo "<br/>";
		echo "<br/>";
		echo "Regras:  ";
		echo "<br/>";
		for ($x = 0 ; $x < count($sujeito) ; $x++) 
		{
			echo $sujeito[$x];
			echo " <= ";			
			echo $regraselementovalor[$x];
			echo "<br/>";
		}
		echo "<br/>";
		echo "Quantidade maxima iterações: ".$qtdemaxima;
		echo "<br/>";	
			echo "</td>";
		echo "</tr>";
		echo "</tbody>";	
		echo "</table>";
		echo "<br/>";	
		echo "<br/>";	
	}
	
	function PrintaTabela($arraytabelabase, $arraytabelacolunas, $arraytabela)
	{
		echo "<table class=\"table2\">";
		//cabecalho
		echo "<thead>";
		echo "<tr>";
		echo "<th class=\"base\">Base</th>";
		for ($x = 0 ; $x < count($arraytabelacolunas) ; $x++) 
		{
			echo "<th>";
			echo $arraytabelacolunas[$x];
			echo "</th>";
		}		
		echo "</tr>";
		echo"</thead>";
		//itens
		echo "<tbody>";
		for ($x = 0 ; $x < count($arraytabelabase); $x++) 
		{
			echo "<tr>";
			echo "<td>";
			echo $arraytabelabase[$x];
			echo "</td>";
			for ($y = 0 ; $y < count($arraytabelacolunas); $y++) 
			{
				echo "<td>";
				echo $arraytabela[$x][$y];
				echo "</td>";
			}	
			echo "</tr>";
		}		
		echo "</tbody>";		
		echo "</table>";
	}
	?>
</body>
</html>	
