<html ng-app>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Simplex</title>
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
	<div ng-controller="principal">
	<form action="simplex.php" method="POST">
	<table width="800px" align="center">
		<tr>
			<td>
				<fieldset><legend><b>Função Objetivo</b></legend>
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
				<fieldset><legend><b>Regras</b></legend>
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
							<td width="130px">
								<table align="center">
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
				<fieldset><legend><b>Parâmetros</b></legend>
					<table width="100%">
						<tr align="center">
							<td>Qtde. Máxima Iterações: <input type="text" name="qtdemaxima" id="qtdeMaximaIteracoes" tabindex="3" size="5"></td>
							<td><input type="checkbox" name="somenteresultado" id="ckbImprimirResultado" tabindex="4">Imprimir somente o resultado</td>
						</tr>
					</table>
				</fieldset>
				<table><tr><td></tr></table>
				<fieldset>
					<table align="center">
						<tr>
							<td>
								<input type="button" id="btnCancelar" value="Cancelar" tabindex="-1" style="width: 100px; height: 30px;">
								<input type="submit" id="btnProcessar" value="Processar" tabindex="-1"  style="width: 100px; height: 30px;">
							</td>
						</tr>	
					</table>	
				</fieldset>		
			</td>
		</tr>
	</table>
	</form>
	</div>
</body>
</html>