<?
require 'conexao.php';
require 'funcoes.php';
require '../js/funcoes.jsp';


if($funcao == "adiciona"){//Adiciona usuário
adiciona ($_REQUEST['nome'], $_REQUEST['login'],$senha,$_REQUEST['email'],$_REQUEST['nivel_usuario'],$_REQUEST['hora_inicio'],$_REQUEST['hora_fim'], $_REQUEST['contato']);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../usuario.php?pg=cadadm'>
	<script type=\"text/javascript\">	
	</script>";
}

if($funcao == "adicionacaixa"){//Adiciona o produto
adicionacaixa ($_REQUEST['cod'], $_REQUEST['tamanho'], $_REQUEST['cor'], $_REQUEST['descricao']);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../caixas.php?pg=cadcaixa'>
	<script type=\"text/javascript\">	
	</script>";
}
if($funcao == "adicionamercado"){//Adiciona o mercado
$login_duplicado = "0";
$teste_login = $_REQUEST['cnpj'];
$sql_login = mysql_query("SELECT cnpj FROM mercado ");
		$cont2 = mysql_num_rows($sql_login);
		while($linha_login = mysql_fetch_array($sql_login)){
			if ($teste_login == $linha_login['cnpj']){
				$login_duplicado = "1";
				}
		}


if ($login_duplicado == 0){
adicionamercado ($_REQUEST['cod'], $_REQUEST['filial'], $_REQUEST['razao_social'], $_REQUEST['nome_fantasia'], $_REQUEST['cnpj'], $_REQUEST['rua'], $_REQUEST['bairro'], $_REQUEST['cidade'], $_REQUEST['cep'], $_REQUEST['estoque'], $_REQUEST['cod_funcionario'], $_REQUEST['nome_funcionario'], $_REQUEST['email']);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../mercado.php?pg=cadmercado'>
	<script type=\"text/javascript\">	
	</script>";
}
if ($login_duplicado == 1){
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../mercado.php?pg=cadmercado'>
	<script type=\"text/javascript\">	
	alert(\" Cadastro não efetuado! CNPJ já existe na base de dados .\");
	</script>";}
}
// Função para adicionar contagem do mercado.
if($funcao == "adiciona_contagem"){//Adiciona a contagem 
			if($_REQUEST['quantidade'] == "" or $_REQUEST['baixa'] == "" or $_REQUEST['placa'] == "" or $_REQUEST['recebida' == ""]){//Teste para verificar se os campos necessários estão preenchidos.
				echo"
			<META HTTP-EQUIV=REFRESH content='0; URL=../contagem.php?pg=contfunc'>
			<script type=\"text/javascript\">	
				alert(\" Todos os campos com * devem ser preenchidos.\");
			</script>";
			}//Fim teste para verificar se os campos necessários estão preenchidos.
			else{//Passa caso os campos Quantidade Baixas e Placa não estejam vazios
				
		//Bloqueio para não permitir 2 postagem com a mesma data e mesmo mercado
	$sql2 = mysql_query("SELECT * FROM contagem ORDER by id ");
$cont2 = mysql_num_rows($sql2);
	//Inicio cógo para incrementar o código da contagem
	$sql3 = mysql_query("SELECT * FROM contagem ORDER BY id DESC");
$linha3 = mysql_fetch_array($sql3);
$cod_contagem = $linha3['cod_contagem'];
$cod_contagem ++;//Variávem com valor da ultima linha da coluna "cod_contagem" incrementando +1
	//Fim cógo para incrementar o código da contagem
while($linha2 = mysql_fetch_array($sql2)){// Testa se o mercado já foi digitado no dia.
	if ($linha2['mercado'] == $_REQUEST['mercado'] and $linha2['data_cadastro'] == converte_data($_REQUEST['data_contagem'])){
		echo"
			<META HTTP-EQUIV=REFRESH content='0; URL=../contagem.php?pg=contfunc'>
			<script type=\"text/javascript\">	
				alert(\" A contagem só pode ser passada uma vez por dia para cada mercado.\");
			</script>";
			system(exit);
	}// Fecha if 
}// Fecha While
//Fim bloqueio para não permitir 2 postagem com a mesma data e mesmo mercado

adiciona_contagem ($_REQUEST['cod_mercado'], $_REQUEST['mercado'], $_REQUEST['cod_funcionario'], $_REQUEST['funcionario'], $_REQUEST['data_contagem'], $_REQUEST['quantidade'], $_REQUEST['baixa'], $_REQUEST['placa'], $_REQUEST['recebida'], $_REQUEST['devolucao'], $_REQUEST['nota_devolucao'], $_REQUEST['serie_nfe'], $cod_contagem);//Envia as informações dos campos para a função adicionar inserir no banco de dados.
	
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../contagem.php?pg=relcont'>
	<script type=\"text/javascript\">	
	</script>";
	}// Fecha if adiciona função
}//Fecha else teste para verificar se os campos necessários estão preenchidos.
mysql_close($db);//Fecha conexão com banco de dados que foi aberta para poder fazer o teste se já exite a contagem e criação do código da contagem com incremento



if($funcao == "adiciona_contagem_saida"){//Adiciona contagem saida
if ($_REQUEST['saida'] != "" AND $_REQUEST['placa'] != "" AND $_REQUEST['mercado'] != ""){
adiciona_contagem_saida ($_REQUEST['cod_funcionario'], $_REQUEST['funcionario'], $_REQUEST['saida'], $_REQUEST['placa'], $_REQUEST['mercado']);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../contagem.php?pg=cad_cont_saida'>
	<script type=\"text/javascript\">	
	</script>";
}//Fecha if 
else{
	echo"
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../contagem.php?pg=cad_cont_saida'>
	<script type=\"text/javascript\">	
	alert(\" TODOS OS CAMPOS DEVEM SER PREENCHIDOS\");
	</script>";
	
}}// Fecha if($funcao == "adicionacontagemsaida")
?>

