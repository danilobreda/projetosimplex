<html ng-app>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Simplex</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.13/angular.min.js"></script>
    <script type="text/javascript">
	//script ANGULARJS
      var principal = function($scope){
		$scope.items = [];//cria array
        
        $scope.add = function () {
			$scope.items.push({ //insere valor no array
            text: ""
			});
        };
		
		$scope.limpar = function () {
			$scope.items = [];//limpa array
			$scope.add();//adiciona novo valor no array
        };
		
		$scope.remover = function(index){
			$scope.items.splice(index, 1);//remove do array
			if($scope.items.length == 0)
			{
				$scope.add();//adiciona valor no array 
			}
		}
		
		$scope.add();//adiciona valor no array na inicialização da tela
      }
    </script>
	<div ng-controller="principal" class="form">
		<form action="simplex.php" method="POST">
		<table class="table">
			<tr>
				<th>Método SIMPLEX </td>
				<tr>
					<td>
						<fieldset class="field"><legend>Função Objetivo</legend>
							<table>
								<tr>
									<td>Max: Z = </td>
									<td><input name="funcao" type="text" id="funcaoObjetivo" tabindex="1" size="91"></td>
								</tr>
							</table>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td>
						<fieldset class="field"><legend>Regras</legend>
							<br/>
							<table>
								<tr>
									<td>
									<div ng-repeat="item in items">
										Sujeito a :
										<input name="sujeito[]" type="text" id="regras" tabindex="2" size="50" ng-model="item.text">
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
						</fieldset>
						<fieldset class="field"><legend>Parâmetros</legend>
							<table>
								<tr>
									<td>Qtde. Máxima Iterações: </td>
									<td><input type="text" name="qtdemaxima" id="qtdeMaximaIteracoes" tabindex="3" ></td>
									<td style="width: 200px"></td>
									<td><input type="checkbox" name="somenteresultado" id="ckbImprimirResultado" tabindex="4"></td>
									<td>Imprimir somente o resultado</td>
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
