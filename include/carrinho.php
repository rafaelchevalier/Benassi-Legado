 <?
require 'conexao.php';
require 'funcoes.php';

/*************************************************************************************************************************************************
										Inicio Módulo incluir um carrinho
*************************************************************************************************************************************************/

if($funcao == "cad"){//Cadastra

cad (
	utf8_decode($_REQUEST['hora_saida']),
	converte_data($_REQUEST['data_saida']),
	utf8_decode($_REQUEST['destino']),
	utf8_decode($_REQUEST['origem']),
	utf8_decode($_REQUEST['num_serie']),
	utf8_decode($_REQUEST['usuario']),
	utf8_decode($_REQUEST['placa_transporte']),
	utf8_decode($_REQUEST['cod_transporte']),
	utf8_decode($_REQUEST['motorista'])
);
	for($b=0; $b<="5"; $b ++){
		if($_REQUEST['nome'.$b] != ""){
			cad_itens_carrinho(
				utf8_decode($_REQUEST['quantidade'.$b]),
				utf8_decode($_REQUEST['nome'.$b]),
				utf8_decode($_REQUEST['descricao'.$b]),
				utf8_decode($_REQUEST['num_serie'])
			);
		}
	}// fim for($b=0 ; $b<=$i ; $b ++){
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../mov_carrinho.php?pg=leitura'>
	<script type=\"text/javascript\">	
		alert(\" Cadastro efetuado com sucesso.\");
	</script>";
}

function cad($hora_saida,$data_saida,$destino,$origem,$num_serie,$usuario_cad,$placa_transporte,$cod_transporte,$motorista){// Cadastra
	$sql = "insert into mov_carrinho (
		hora_saida,
		data_saida,
		destino,
		origem,
		num_serie,
		usuario_cad,
		placa_transporte,
		cod_transporte,
		motorista,
		data_cad,
		hora_cad
	) values (
		'$hora_saida',
		'$data_saida',
		'$destino',
		'$origem',
		'$num_serie',
		'$usuario_cad',
		'$placa_transporte',
		'$cod_transporte',
		'$motorista',
		now(),
		now()
	)";
	mysql_query($sql);
	}// Fim função cad
	
function cad_itens_carrinho($quantidade,$nome,$descricao,$num_serie){// Cadastra
//Conta a ultima ID de pedido de compra
	$sql_pedido_compra = mysql_query("SELECT id FROM mov_carrinho ORDER BY id DESC LIMIT 1 ");
	$id_pedido = mysql_fetch_array($sql_pedido_compra);
	$id_pedido = $id_pedido['id'];
	//Fim conta a ultima ID de pedido de compra
	$sql2 = "insert into itens_carrinho (
		quantidade,
		nome,
		descricao,
		num_carrinho,
		id_mov_carrinho
	) values (
		'$quantidade',
		'$nome',
		'$descricao',
		'$num_serie',
		'$id_pedido'
	)";
	mysql_query($sql2);
	}// Fim função cad_acao_rn
/*************************************************************************************************************************************************
										Fim Módulo incluir um carrinho
*************************************************************************************************************************************************/


/*************************************************************************************************************************************************
										Inicio Módulo incluir varios carrinho
*************************************************************************************************************************************************/

if($funcao == "cad2"){//Cadastra
	$cont_carrinho_duplicado = 0;
	for($b=0; $b<=200; $b ++){
		$verifica_carrinho = repete_carrinho($_REQUEST['num_serie'.$b], converte_data($_REQUEST['data_saida']), $_POST['tipo_mov']);
		if($verifica_carrinho > 0)
		{
			$carrinho_duplicado = $carrinho_duplicado."(".$_REQUEST['num_serie'.$b].") ";
			$cont_carrinho_duplicado ++;
		}
		
		if($_REQUEST['num_serie'.$b] != "" and $verifica_carrinho == 0){
			cad2 (
				utf8_decode($_REQUEST['hora_saida']),
				converte_data($_REQUEST['data_saida']),
				utf8_decode($_REQUEST['destino']),
				utf8_decode($_REQUEST['origem']),
				utf8_decode($_REQUEST['usuario']),
				utf8_decode($_REQUEST['placa_transporte']),
				utf8_decode($_REQUEST['cod_transporte']),
				utf8_decode($_REQUEST['motorista']),
				utf8_decode($_REQUEST['tipo_mov']),
				utf8_decode($_REQUEST['num_serie'.$b])
			);
		}
	}// fim for($b=0 ; $b<=$i ; $b ++){	
	for($b=0; $b<="5"; $b ++){
		if($_REQUEST['nome'.$b] != ""){
			cad_itens_carrinho2(
				utf8_decode($_REQUEST['quantidade'.$b]),
				utf8_decode($_REQUEST['nome'.$b]),
				utf8_decode($_REQUEST['descricao'.$b])
			);
		}
	}// fim for($b=0 ; $b<=$i ; $b ++){
	if(!empty($_REQUEST['prateleiras'])){
		cad_contentor(
			utf8_decode($_REQUEST['hora_saida']),
			converte_data($_REQUEST['data_saida']),
			utf8_decode($_REQUEST['origem']),
			utf8_decode($_REQUEST['destino']),
			utf8_decode($_REQUEST['prateleiras'])
		);
		}
	$num_serie_url = 	$_REQUEST['num_serie0'];
	if($cont_carrinho_duplicado > 0)
	{
		echo"
			<script type=\"text/javascript\">	
				alert(\" Cadastro efetuado com sucesso. Houveram $cont_carrinho_duplicado bloqueados por duplicidade $carrinho_duplicado\");
				history.back(-2);
			</script>
		";
	}
	if($cont_carrinho_duplicado == 0)
	{
		echo"
			<script type=\"text/javascript\">	
				alert(\" Cadastro efetuado com sucesso.\");
				history.back(-2);
			</script>
		";
	}
}
function cad_contentor($hora_mov,$data_mov,$origem,$destino,$quantidade){
	$sql = "insert into mov_carrinho_contentores (
		data_mov,
		hora_mov,
		origem,
		destino,
		quantidade
	) values (
		'$data_mov',
		'$hora_mov',
		'$origem',
		'$destino',
		'$quantidade'
	)";
	mysql_query($sql);
}
function cad2($hora_saida,$data_saida,$destino,$origem,$usuario_cad,$placa_transporte,$cod_transporte,$motorista,$tipo_mov,$num_serie){// Cadastra
	switch ($tipo_mov){
		case "RETORNO":
			//Localiza origem e destino do carrinho enviado anteriormente.
			$sql = mysql_query("SELECT id,destino, num_serie FROM mov_carrinho WHERE num_serie='$num_serie' and ativo='1' LIMIT 1 ");
			$linha = mysql_fetch_array($sql);
			$origem =  $linha['destino'];
			$id = $linha['id'];
			desativa_carrinho($id);
			
			$ativo = "0";
		break;
		case "SAIDA":
			$ativo = "1";
		break;
	}
	$sql = "insert into mov_carrinho (
		hora_saida,
		data_saida,
		destino,
		origem,
		usuario_cad,
		placa_transporte,
		cod_transporte,
		motorista,
		tipo_mov,
		num_serie,
		ativo,
		data_cad,
		hora_cad
	) values (
		'$hora_saida',
		'$data_saida',
		'$destino',
		'$origem',
		'$usuario_cad',
		'$placa_transporte',
		'$cod_transporte',
		'$motorista',
		'$tipo_mov',
		'$num_serie',
		'$ativo',
		now(),
		now()
	)";
	mysql_query($sql);
	
	}// Fim função cad
	
function cad_itens_carrinho2($quantidade,$nome,$descricao){// Cadastra
//Conta a ultima ID de pedido de compra
	$sql_pedido_compra = mysql_query("SELECT id FROM mov_carrinho ORDER BY id DESC LIMIT 1 ");
	$id_pedido = mysql_fetch_array($sql_pedido_compra);
	$id_pedido = $id_pedido['id'];
	//Fim conta a ultima ID de pedido de compra
	$sql_itens_carrinho = "insert into itens_carrinho (
		quantidade,
		nome,
		descricao,
		id_mov_carrinho
	) values (
		'$quantidade',
		'$nome',
		'$descricao',
		'$id_pedido'
	)";
	mysql_query($sql_itens_carrinho);
	}// Fim função cad_acao_rn
/*************************************************************************************************************************************************
										Fim Módulo incluir varios carrinho
*************************************************************************************************************************************************/

//************************************ INICIO Exclui Balança *******************************************************
if($funcao == "exclui_mov_carrinho"){
	$id = $_GET['id'];
	$sql = ("DELETE FROM mov_carrinho where id='$id' and comprovante='0' limit 1");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../mov_carrinho.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}


?>