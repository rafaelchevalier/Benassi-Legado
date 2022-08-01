 <?
require 'conexao.php';
require 'funcoes.php';



/*************************************************************************************************************************************************
										Inicio Módulo incluir varios carrinho
*************************************************************************************************************************************************/

if($funcao == "cad2"){//Cadastra
	$cont_carrinho_duplicado = 0;
	$carrinho_devolucao_ativado = 0;
	for($b=0; $b<=200; $b ++){
		if($_REQUEST['num_serie'.$b] != ""){
			$bloqueia_cad = 0;
			//Verifica se há carrinho sendo lançado em duplicidade no mesmo dia, se já existir o lançamento do segundo carrinho em diante é bloqueado.
			$verifica_carrinho = repete_carrinho($_REQUEST['num_serie'.$b], converte_data($_REQUEST['data_saida']), $_POST['tipo_mov']);
			if($verifica_carrinho > 0)
			{
				$carrinho_duplicado = $carrinho_duplicado."(".$_REQUEST['num_serie'.$b].")";
				$cont_carrinho_duplicado ++;
				$bloqueia_cad = 1;
			}
			
			if($_POST['tipo_mov'] == "DEVOLUCAO" AND verifica_situacao_carrinho($_REQUEST['num_serie'.$b]) == 1){//filtro para bloquear o lançamento quando tentar realizar devolução para Benassi SP quando um carrinho ainda não tiver retornado para o CD.
				$carrinho_devolucao_ativado = $carrinho_devolucao_ativado."(".$_REQUEST['num_serie'.$b].")";
				$cont_carrinho_duplicado ++;
				$bloqueia_cad = 1;
			}
			
			if($_REQUEST['num_serie'.$b] != "" AND $bloqueia_cad == 0){
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
		<META HTTP-EQUIV=REFRESH content='0; URL=../carrinho.php?pg=comprovante&num=$num_serie_url'>
		<script type=\"text/javascript\">	
			alert(\" Houveram $cont_carrinho_duplicado lançamentos bloqueados por duplicidade $carrinho_duplicado\");
		</script>";
		/*echo"
			<script type=\"text/javascript\">	
				alert(\" Cadastro efetuado com sucesso. Houveram $cont_carrinho_duplicado bloqueados por duplicidade $carrinho_duplicado\");
				history.back(-4);
			</script>
		";*/
	}
	if($cont_carrinho_duplicado == 0)
	{
		echo"
			<META HTTP-EQUIV=REFRESH content='0; URL=../carrinho.php?pg=comprovante&num=$num_serie_url'>
			<script type=\"text/javascript\">	
				alert(\" Cadastro efetuado com sucesso.\");
			</script>";
		/*
		echo"
			<script type=\"text/javascript\">	
				alert(\" Cadastro efetuado com sucesso.\");
				history.back(-4);
			</script>
		";
		*/
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
	$situacao = "1";
	switch ($tipo_mov){
		case "RETORNO":
			//Localiza origem e destino do carrinho enviado anteriormente.
			$sql = mysql_query("SELECT * FROM mov_carrinho WHERE num_serie='$num_serie' and situacao='1'  ORDER BY data_saida DESC LIMIT 1 ");
			$linha = mysql_fetch_array($sql);
			$origem =  $linha['destino'];
			$id = $linha['id'];
			//desativa_carrinho($id);
			baixa_situacao_carrinho($id);
			$situacao = "0";
		break;
		case "DEVOLUCAO":
			$situacao = "0";
		break;
		case "SAIDA":
			$situacao = "1";
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
		situacao,
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
		'$situacao',
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

//************************************ INICIO Exclui Carrinho *******************************************************
//Exclui  Carrinho pro vez
if($funcao == "exclui_mov_carrinho"){
	$id = $_GET['id'];
	$sql = ("DELETE FROM mov_carrinho where id='$id' and comprovante='0' limit 1");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../carrinho.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}
//Exclui Vários Carrinhos.
if($funcao == "exclui_varios"){	
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql = "delete from mov_carrinho WHERE id IN ($excluir) ";

	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../carrinho.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}

//Altera campo ativo da tabela carrinho para 0(Desativado) ou 1(Ativado) independente da situação atual.
if($funcao == "alt_carrinho"){
	require "conexao.php";
	$id = $_GET['id'];
	$sql_consulta = mysql_query("SELECT id,ativo FROM mov_carrinho WHERE id='$id' LIMIT 1 ");
	$linha = mysql_fetch_array($sql_consulta);
	if ($linha['ativo'] == 0){
		$sql_altera = (" UPDATE mov_carrinho SET ativo='1' where id='$id'");
	}
	if ($linha['ativo'] == 1){
		$sql_altera = (" UPDATE mov_carrinho SET ativo='0' where id='$id'");
	}
	mysql_query($sql_altera);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../carrinho.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}



?>