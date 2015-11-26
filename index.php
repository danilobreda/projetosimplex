<html ng-app>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Projeto</title>
	<link href='https://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div ng-controller="principal" class="form">
		<table class="table">
			<tr>
				<th>Projeto Pesquisa Operacional</th>
				<tr>
					<td>
						<div class="botao">
						<br/>
						<center>
							<input type="button" class="botao" style="margin-left: 0px; width: 200px; height: 100px;" onclick="window.location='./knapsackview.php'" value="KNAPSACK"/>
							<input type="button" class="botao" style="margin-left: 0px; width: 200px; height: 100px;" onclick="window.location='./simplexview.php'" value="SIMPLEX"/>
							</center>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<fieldset class="field">
							<legend> Integrantes: </legend>
								<h5>Danilo Costa Breda RA:524069</h5>
								<h5>Maurilio dos Santos Matsuyama RA:534072</h5>
								<h5>Jorge Takano Junior RA:529754</h5>
								<h5>Anderson Miyada RA:525626</h5>
						</fieldset>
					</td>
				</tr>
			</tr>
		</table>
	</div>
</body>
</html>
