<?
include 'conexao.php';
include 'funcoes.php';
if($funcao == "adiciona"){//Adiciona um novo usuário
adiciona ($_REQUEST['nome'],$_REQUEST['nivel_usuario'], $_REQUEST['login'],md5($_REQUEST['senha']),$_REQUEST['email'],$_REQUEST['dia'],$_REQUEST['mes'],$_REQUEST['telefone'],$_REQUEST['celular'],$_REQUEST['radio'],$_REQUEST['setor']);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../usuarios.php?pg=caduser'>
	<script type=\"text/javascript\">	
	alert(\" Cadastro efetuado com sucesso.\");
	</script>";
}
//************************ INICIO MÓDULO PATRIMONIO *********************************************
if($funcao == "adiciona_patrimonio"){//Acidioa patrimonio
	if($_REQUEST['num_patrimonio'] == "" || $_REQUEST['descricao'] == "" || $_REQUEST['categoria'] == "" || $_REQUEST['local'] == "" || $_REQUEST['sala'] == "" || $_REQUEST['situacao'] == ""){//Testa se passar por todos os campos estiverem prenchidos libera
		echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../patrimonio.php?pg=cad_patrimonio'>
	<script type=\"text/javascript\">	
	alert(\" Preencha todos os dados os campos obrigatórios.\");
	</script>";
	stop();
		}
	else{
adiciona_patrimonio (utf8_decode($_REQUEST['categoria']), 
			utf8_decode($_REQUEST['descricao']), 
			$_REQUEST['num_patrimonio'],
			utf8_decode($_REQUEST['fornecedor']),
			utf8_decode($_REQUEST['sala']),
			utf8_decode($_REQUEST['local']), 
			$_REQUEST['valor'], 
			$_REQUEST['data_compra'], 
			utf8_decode($_REQUEST['situacao']), 
			$_REQUEST['data_baixa'], 
			utf8_decode($_REQUEST['motivo_baixa']), 
			$_REQUEST['baixa'], $_REQUEST['nfe'], 
			utf8_decode($_REQUEST['nome_usuario']),
			$_REQUEST['serie'], 
			utf8_decode($_REQUEST['categoria_depreciacao']),
			utf8_decode($_REQUEST['num_serie']),  
			converte_data($_REQUEST['data_garantia'])
			);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../patrimonio.php?pg=cad_patrimonio'>
	<script type=\"text/javascript\">	
	alert(\" Patrimônio cadastrado com sucesso.\");
	</script>";
}}

if($funcao == "baixa_patrimonio"){//Adiciona Baixa_patrimonio
$id_patrimonio = $_GET['id'];
	baixa_patrimonio ($_REQUEST['tipo_baixa'],utf8_decode($_REQUEST['descricao']),utf8_decode($_REQUEST['empresa']),$_REQUEST['data_prevista']);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../patrimonio.php?pg=rel_patrimonio'>
	<script type=\"text/javascript\">	
	alert(\" Baixa patrimonio bem sucedido.\");
	</script>";
	}
	
	
	
//Fim Adiciona Baixa patrimonio
//************************ FIM MÓDULO PATRIMONIO *********************************************


if($funcao == "adiciona_filtro"){//Adiciona Filtro de acesso 
adiciona_filtro ($_REQUEST['cad_patrimonio'], $_REQUEST['alt_patrimonio'], $_REQUEST['del_patrimonio'],$_REQUEST['cad_usuario'],$_REQUEST['alt_usuario'],$_REQUEST['del_usuario']);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../filtro_acesso.php'>
	<script type=\"text/javascript\">	
	alert(\" Filtro acesso cadastrado com sucesso.\");
	</script>";
}

//************************************ INICIO MÓDULO DE COMPRA *******************************************************
//Adiciona pedido de compras 
if($funcao == "adiciona_pedido_compra"){
	//Adiciona pedido_compra
adiciona_pedido_compra (utf8_decode($_REQUEST['solicitante']),utf8_decode($_REQUEST['setor']),$_REQUEST['prioridade'],utf8_decode($_REQUEST['descricao_pedido']),
	//Fim Adiciona pedido_compra
	//Adiciona itens_pedido_compra
		$_REQUEST['quantidade0'],$_REQUEST['produto0'],$_REQUEST['motivo0'],
		$_REQUEST['quantidade1'],$_REQUEST['produto1'],$_REQUEST['motivo1'],
		$_REQUEST['quantidade2'],$_REQUEST['produto2'],$_REQUEST['motivo2'],
		$_REQUEST['quantidade3'],$_REQUEST['produto3'],$_REQUEST['motivo3'],
		$_REQUEST['quantidade4'],$_REQUEST['produto4'],$_REQUEST['motivo4'],
		$_REQUEST['quantidade5'],$_REQUEST['produto5'],$_REQUEST['motivo5'],
		$_REQUEST['quantidade6'],$_REQUEST['produto6'],$_REQUEST['motivo6'],
		$_REQUEST['quantidade7'],$_REQUEST['produto7'],$_REQUEST['motivo7'],
		$_REQUEST['quantidade8'],$_REQUEST['produto8'],$_REQUEST['motivo8'],
		$_REQUEST['quantidade9'],$_REQUEST['produto9'],$_REQUEST['motivo9']);//fim função adiciona_pedido_compra
	//Fim adiciona itens_pedido_compra
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../pedidodecompra.php?pg=cadpedido'>
	<script type=\"text/javascript\">	
	alert(\" Seu pedido de compra foi cadastrado com sucesso.\");
	</script>";
}//Fim if funcao adiciona_pedido_compra

if($funcao == "aprova_pedido_compra"){
	//Adiciona pedido_compra
	$id = $_GET['id'];
aprova_pedido_compra ($_REQUEST['aprovado']);//fim função adiciona_pedido_compra
	//Fim adiciona itens_pedido_compra
	
	if($_REQUEST['aprovado'] == 1){
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../pedidodecompra.php?pg=pendente'>
	<script type=\"text/javascript\">	
	alert(\" Pedido aprovado para orçamento.\");
	</script>";
	}
	if($_REQUEST['aprovado'] != 1){
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../pedidodecompra.php?pg=pendente'>
	<script type=\"text/javascript\">	
	alert(\" Pedido reprovado para orçamento.\");
	</script>";
	}
}//Fim if funcao aprova_pedido_compra

//************************************ FIM MÓDULO DE COMPRA *******************************************************
?>