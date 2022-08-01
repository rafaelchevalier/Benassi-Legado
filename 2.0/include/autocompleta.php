<?php
	require_once('config.php');
	$pdo = new PDO('mysql:host=mysql.rasp.net.br;dbname=rasp02', $usuario_banco, $senha_banco);
    
	$campo = "";
	$tabela = "";
	$f = $_GET['f'];
	switch ($f){
		/******************************************************************
						Inicio Auto Completar módulo CVP
		*******************************************************************/
		case "cvp_produto":
				$campo = "produto";
				$tabela = "cvp_cab";
			$dados = $pdo->prepare("
				SELECT $campo FROM $tabela
					GROUP BY $campo
					ORDER BY $campo ASC
					LIMIT 500
				");
			$dados->execute();
			echo json_encode($dados->fetchAll(PDO::FETCH_ASSOC));
		break;
		case "cvp_cod_rastreio":
			$campo = "cod_rastreio";
			$tabela = "cvp_cab";
			$dados = $pdo->prepare("
				SELECT $campo FROM $tabela
					GROUP BY $campo
					ORDER BY $campo ASC
					LIMIT 500
				");
			$dados->execute();
			echo json_encode($dados->fetchAll(PDO::FETCH_ASSOC));
		break;
		case "cvp_responsavel":
			$campo = "responsavel";
			$tabela = "cvp_cab";
			$dados = $pdo->prepare("
				SELECT $campo FROM $tabela
					GROUP BY $campo
					ORDER BY $campo ASC
					LIMIT 500
				");
			$dados->execute();
			echo json_encode($dados->fetchAll(PDO::FETCH_ASSOC));
		break;
		/******************************************************************
						Fim Auto Completar módulo CVP
		*******************************************************************/
		
		default;
		

	
	}
?>