<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Simplex</title>
</head>
<body>
	<table width="800px" align="center">
		<tr>
			<td>
				<fieldset><legend><b>Função Objetivo</b></legend>
					<table>
						<tr>
							<td>Max: Z = </td>
							<td><input type="text" id="funcaoObjetivo" tabindex="1" size="91"></td>
						</tr>
					</table>
				</fieldset>
			</td>
		</tr>
		<tr>
			<td>
				<fieldset><legend><b>Regras</b></legend>
					<table>
						<tr>
							<td>Sujeito a : </td>
							<td><input type="text" id="regras" tabindex="2" size="90"></td>
						</tr>
					</table><br/>
					<table>
						<tr>
							<td width="610px" height="300px" colspan="2">
								<table width="100%" height="100%" border="1">
									<tr>
										<td>
											aqui vai ficar o grid
										</td>	
									</tr>	
								</table>	
							</td>
							<td width="130px">
								<table align="center">
									<tr>
										<td><input type="button" id="btnAdicionar" tabindex="-1" value="Adicionar" style="width: 100px; height: 30px;"></td>
									</tr>
									<tr><td></td></tr>
									<tr>
										<td><input type="button" id="btnRemover" tabindex="-1" value="Remover" style="width: 100px; height: 30px;"></td>
									</tr>
									<tr><td></td></tr>
									<tr>
										<td><input type="button" id="btnLimpar" tabindex="-1" value="Limpar" style="width: 100px; height: 30px;"></td>
									</tr>
								</table>	
							</td>		
						</tr>	
					</table>
				</fieldset>
				<fieldset><legend><b>Parâmetros</b></legend>
					<table width="100%">
						<tr>
							<td>Qtde. Máxima Iterações: </td>
							<td><input type="text" id="qtdeMaximaIteracoes" tabindex="3" size="10"></td>
							<td style="width: 200px"></td>
							<td><input type="checkbox" id="ckbImprimirResultado" tabindex="4"></td>
							<td>Imprimir somente o resultado</td>
						</tr>	
					</table>	
				</fieldset>		
			</td>
		</tr>
	</table>
</body>
</html>	
<?php 
	 
	
?>