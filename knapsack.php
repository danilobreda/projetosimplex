<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style2.css">
	<title>Knapsack</title>
</head>
<body>
	<?php 
	if(!isset($_POST['pesomaximo']) && !isset($_POST['peso']) && !isset($_POST['custo']))
	{
		echo "entrada incorreta";
		die;
	}
	
	$pesomaximo = $_POST['pesomaximo'];
	$arraypeso = $_POST['peso'];
	$arraycusto = $_POST['custo'];
	$arraytabela; // tabela 2d, representa a tabela final.
	$arraytabelaRow = count($arraypeso) + 1;
	$arraytabelaCol = $pesomaximo + 1;
	
	$arraytabelaresultado;
	$stringHTMLresultado = "";
	
	/////////////////////////////////////////////////
	//PRINTA INICIO:
	echo "<br/><hr/>";
	echo "<h1>Informações Iniciais:</h1>";
	
	PrintaTabelaInicial($pesomaximo, $arraypeso, $arraycusto, $arraytabelaRow, $arraytabelaCol);
	
	
	//taca tudo zero no arraytabela:
	for ($x = 0; $x < $arraytabelaRow; $x++) 
	{
		for ($y = 0; $y < $arraytabelaCol; $y++) 
		{
			$arraytabelaresultado[$x][$y] = "t_0";
			$arraytabela[$x][$y] = 0;
		}
	}
	
	//efetua processo da mochila:(com debug)
	for ($x = 0 ; $x < $arraytabelaRow ; $x++) 
	{
		for ($y = 0; $y < $arraytabelaCol; $y++) 
		{
			if($x == 0 || $y == 0)
				continue;
			
			
			//echo $x .'-'.$y;
			
			if($arraypeso[$x - 1] <= $y)
			{
				//echo " | ".$arraypeso[$x - 1]." <= ".$y;
				$indexA = $arraytabela[$x - 1][$y];
				$indexB = $arraytabela[$x - 1][$y - $arraypeso[$x - 1]] + $arraycusto[$x - 1];
				//echo ' | indexA: '.$indexA;
				//echo ' | indexB: '.$arraytabela[$x - 1][$y - $arraypeso[$x - 1]].' + '.$arraycusto[$x - 1].' = '.$indexB;
				
				if($indexA > $indexB)
					$arraytabela[$x][$y] = $indexA;
				else
					$arraytabela[$x][$y] = $indexB;
			}
			else
			{
				//echo " | ".$arraypeso[$x - 1]." > ".$y;
				$arraytabela[$x][$y] = $arraytabela[$x - 1][$y];
				//echo " | = ".$arraytabela[$x - 1][$y];
			}
			//echo "<br/>";
		}
	}			
	//efetua verificação de quem entra na mochila:
	$totalPeso = 0;
	$totalCusto = 0;	
	$Row = $arraytabelaRow - 1;
	$Col = $arraytabelaCol - 1;
	do
	{
		//$arraytabelaresultado
		//echo $Row."-".$Col." | ".$arraytabela[$Row][$Col]." | ";
		if($arraytabela[$Row][$Col] == $arraytabela[$Row - 1][$Col])
		{
			//echo " A <br/>";
			$arraytabelaresultado[$Row][$Col] = false;//não é a resposta
			$Row = $Row - 1;
			$Col = $Col;
		}
		else
		{
			$stringHTMLresultado = $stringHTMLresultado."<h3> Peso: ".$arraypeso[$Row - 1]." | Custo: ".$arraycusto[$Row - 1]."</h3>";
			$totalPeso += $arraypeso[$Row - 1];
			$totalCusto += $arraycusto[$Row - 1];
			//echo " B: <br/>";
			$arraytabelaresultado[$Row][$Col] = "t_1";//é a resposta
			$Row = $Row - 1;
			$Col = $Col - $arraypeso[$Row];
		}
		
		if($Row == 0)
		{
			$arraytabelaresultado[$Row][$Col] = "t_2";//é a resposta
		}
	}
	while($Row != 0);
	$stringHTMLresultado = $stringHTMLresultado."<br/><h3> Total Peso: ".$totalPeso."</h3>";
	$stringHTMLresultado = $stringHTMLresultado."<h3> Total Custo: ".$totalCusto."</h3>";
	
	echo "<br/><hr/>";
	echo "<h1>Tabela Gerada</h1>";
	PrintaTabelaFinal($arraytabela, $arraypeso, $arraytabelaRow, $arraytabelaCol, $arraytabelaresultado);
	
	echo "<br/><hr/>";
	echo "<h1>Resultado</h1>";
	echo $stringHTMLresultado;
	
	/////////////////////////////////////////////////
	
	function PrintaTabelaInicial($pesomaximo, $arraypeso, $arraycusto, $arraytabelaRow, $arraytabelaCol)
	{
		echo "<h2>Peso Máximo da Mochila: ".$pesomaximo."</h2>";
		echo "<table style=\"border: 1px solid black; width: 35%; \" >";
		//cabecalho
		echo "<thead>";
		echo "<tr>";
		echo "<th>Item</th>";
		echo "<th>Peso</th>";
		echo "<th>Custo</th>";
		echo "</tr>";
		echo"</thead>";
		//itens
		echo "<tbody>";
		for ($x = 0 ; $x < $arraytabelaRow - 1; $x++) 
		{
			
			echo "<tr>";
			echo "<td>";
			echo ($x + 1);
			echo "</td>";
			echo "<td>";
			echo $arraypeso[$x];
			echo "</td>";
			echo "<td>";
			echo $arraycusto[$x];
			echo "</td>";
			echo "</tr>";
		}		
		echo "</tbody>";		
		echo "</table>";	
	}
	
	function PrintaTabelaFinal($arraytabela, $arraypeso, $arraytabelaRow, $arraytabelaCol, $arraytabelaresultado)
	{
		echo "<table style=\"border: 1px solid black; width: 100%; \">";
		//cabecalho
		echo "<thead>";
		echo "<tr>";
		echo "<th class=\"base\">-</th>";
		for ($x = 0 ; $x < $arraytabelaCol ; $x++) 
		{
			echo "<th>";
			echo $x;
			echo "</th>";
		}		
		echo "</tr>";
		echo"</thead>";
		//itens
		echo "<tbody>";
		for ($x = 0 ; $x < $arraytabelaRow; $x++) 
		{
			
			echo "<tr>";
			echo "<td>";
			if($x == 0)//item da coluna (peso):
			{
				echo 0;
			}
			else
			{
				 echo $arraypeso[$x - 1];
			}				
			echo "</td>";
			for ($y = 0 ; $y < $arraytabelaCol; $y++) 
			{
				if($arraytabelaresultado[$x][$y] != "t_0")
				{
					
					if($arraytabelaresultado[$x][$y] == "t_1" )
					{
						echo "<td style=\"background-color: #41DD92\">";						
					}
					else
					{
						echo "<td style=\"background-color: white\">";
					}
				}
				else
				{
					echo "<td>";
				}
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
