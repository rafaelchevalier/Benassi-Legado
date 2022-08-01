 <?
require 'conexao.php';
require 'funcoes.php';

$funcao = $_REQUEST['funcao'];
$id = $_REQUEST['id'];

//************************************ INICIO CADASTRA AFERIÇÃO *******************************************************

if($funcao == "cad_fbl"){//Cadastra nova aferição
cad_fbl (utf8_decode($_REQUEST['nome']),utf8_decode($_REQUEST['balanca']),$_REQUEST['situacao'],utf8_decode($_REQUEST['obs']),converte_data($_REQUEST['data']));
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../fbl.php?pg=cad'>
	<script type=\"text/javascript\">	
	alert(\" Aferição Lançada com sucesso.\");
	</script>";
}// Fim teste funcao=cad_fbl

if($funcao == "cad"){//Cadastra nova aferição
    $qt = 0;
    if ($_GET['qt'] =="" or $_GET['qt'] > "40" ){$_GET['qt'] = 5; }
   for($i=0; $i < $_GET['qt']; $i++){
	$qt ++;
	
  if($_REQUEST['situacao'.$i] != ""){
cad_fbl (
		utf8_decode($_REQUEST['nome']),
		 utf8_decode($_REQUEST['balanca'.$i]),
		 $_REQUEST['situacao'.$i],
		 utf8_decode($_REQUEST['obs'.$i]),
		 converte_data($_REQUEST['data']));
   }}
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../fbl.php?pg=cad'>
	<script type=\"text/javascript\">	
	alert(\" Aferição Lançada com sucesso.\");
	</script>";
}// Fim teste funcao=cad_fbl

function cad_fbl($nome,$balanca,$situacao,$obs,$data){// Cadastra nova aferição
$sql_balanca = mysql_query("SELECT * FROM inventario where id='$balanca' ");
	$cont_balanca = mysql_num_rows($sql_balanca);
	while($linha_balanca = mysql_fetch_array($sql_balanca)){ 
	$num_serie = $linha_balanca['num_serie'];
	$num_patrimonio = $linha_balanca['num_patrimonio'];
	$setor = $linha_balanca['sala'];
	$empresa = $linha_balanca['local'];
	$descricao = $linha_balanca['descricao'];
	}
	$sql = "insert into fbl (usuario_cad,id_balanca,num_serie,descricao,setor,empresa,situacao,obs,data_cad,hora_cad,data_afericao) values 
	('$nome','$balanca','$num_serie','$descricao','$setor','$empresa','$situacao','$obs',now(),now(),'$data')";
	mysql_query($sql);
	}// Fim função cad_fbl
//************************************ INICIO Altera aferição *******************************************************	
/* Verificar depois se poderá ser feito alterações	
if($funcao == "alt_fbl"){
$id = $_GET['id'];

alt_fbl(utf8_decode($_REQUEST['nome']),utf8_decode($_REQUEST['balanca']),utf8_decode($_REQUEST['situacao']),utf8_decode($_REQUEST['obs']));

	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../fbl.php?pg=con'>
	<script type=\"text/javascript\">	
	</script>";

}

function alt_balanca($nome,$balanca,$situacao,$obs){
		$id = $_GET['id'];
	$sql = (" UPDATE fbl SET usuario_alt='$nome',identificacao='$balanca',situacao='$situacao',obs='$obs',data_alt= now() ,hora_alt= now(),data_afericao=now() where id='$id'");
	mysql_query($sql);
	}
*/

//************************************ INICIO Exclui Balança *******************************************************
if($funcao == "exclui_fbl"){
	$id = $_GET['id'];
	$sql = ("DELETE FROM fbl where id='$id'");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../fbl.php?pg=con'>
	<script type=\"text/javascript\">	
	</script>";
}
if($funcao == "exclui_varios"){	
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql = "delete from fbl WHERE id IN ($excluir) ";

	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../fbl.php?pg=con'>
	<script type=\"text/javascript\">	
	</script>";
}

?>