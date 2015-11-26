<html ng-app>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>KnapSack</title>
	<link href='https://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.13/angular.min.js"></script>
    <script type="text/javascript">
	//script ANGULARJS
      var principal = function($scope){
		$scope.items = [];//cria array
        
        $scope.add = function (index) {
			$scope.items.push({ //insere valor no array
            indexvalue: index
			});
        };
		
		$scope.limpar = function () {
			$scope.items = [];//limpa array
			$scope.add(-1);//adiciona novo valor no array
        };
		
		$scope.remover = function(index){
			$scope.items.splice(index, 1);//remove do array
			if($scope.items.length == 0)
			{
				$scope.add(-1);//adiciona valor no array 
			}
		}
		
		$scope.add(-1);//adiciona valor no array na inicialização da tela
      }
    </script>
	<div ng-controller="principal" class="form">
		<form action="knapsack.php" method="POST" target="_blank">
		<table class="table">
			<tr>
				<th>KNAPSACK (Mochila)</td>
				<tr>
					<td>
						<fieldset class="field">
							<table align="center">
								<tr>
									<td>
										<p>Peso Maximo Mochila: </p>
									</td>
									<td>
										<input name="pesomaximo" type="number" id="pesomaximo" tabindex="1" size="70">
									</td>	
								</tr>
							</table>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td>
						<fieldset class="field"><legend>Itens</legend>
							<br/>
							<table align="center">
								<tr>
									<td>
									<div ng-repeat="item in items" class="item">
										Item: {{$index + 1}}  | Peso: <input name="peso[]" type="number" id="peso" tabindex="2" size="20" >  | Custo: <input name="custo[]" type="number" id="custo" tabindex="2" size="5">
										<input type="button" id="btnRemover" value="Remover" style="width: 70px; height: 23px;" ng-click="remover($index)">
										<br/>
									</div>
									</td>
									<td>
										<table class="botao">
											<tr>
												<td><input type="button" id="btnAdicionar" tabindex="-1" value="Adicionar" style="width: 100px; height: 30px;" ng-click="add()"></td>
											</tr>
											<tr><td></td></tr>
											<tr>
												<td><input type="button" id="btnLimpar" tabindex="-1" value="Limpar Tudo" style="width: 100px; height: 30px;" ng-click="limpar()"></td>
											</tr>
										</table>	
									</td>		
								</tr>	
							</table>
							<table class="botao">
								<tr>
									<td><input type="submit" tabindex="-1" value="PROCESSAR" ></td>
								</tr>	
							</table>	
						</fieldset>
					</td>
				</tr>
			</tr>
		</table>
		</form>
	</div>
</body>
</html>
