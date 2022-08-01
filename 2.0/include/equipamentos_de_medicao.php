 <?
require 'conexao.php';
require 'funcoes.php';

//************************************ INICIO CADASTRA AFERIÇÃO *******************************************************

if($funcao == "cad"){//Cadastra nova aferição
    $qt = 0;
    if ($_GET['qt'] =="" or $_GET['qt'] > "40" ){$_GET['qt'] = 40; }
   for($i=0; $i < $_GET['qt']; $i++){
	$qt ++;
	
  if($_REQUEST['nome'.$i] != "" and $_REQUEST['num_serie'.$i] != "" ){
cad(	 utf8_decode($_REQUEST['nome'.$i]),
		 utf8_decode($_REQUEST['num_serie'.$i]),
		 utf8_decode($_REQUEST['descricao'.$i]));
   }}
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../equipamentos_de_medicao.php?pg=consulta'>
	<script type=\"text/javascript\">	
	alert(\" Aferição Lançada com sucesso.\");
	</script>";
	
}// Fim teste funcao=cad_fbl

function cad($nome,$num_serie,$descricao){// Cadastra nova aferição
	$sql = "insert into cad_equipamento_de_medicao (nome,num_serie,descricao) values 
	('$nome','$num_serie','$descricao')";
	mysql_query($sql);
	}// Fim função cad_fbl
	
//************************************ INICIO Altera aferição *******************************************************	
/* Verificar depois se poderá ser feito alterações	
if($funcao == "alt_fbl"){
$id = $_GET['id'];

alt_fbl(utf8_decode($_REQUEST['nome']),utf8_decode($_REQUEST['balanca']),utf8_decode($_REQUEST['situacao']),utf8_decode($_REQUEST['obs']));

	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../fbl.php?pg=consulta_fbl'>
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

if($funcao == "exclui"){	
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql = "delete from cad_equipamento_de_medicao WHERE id IN ($excluir) ";

	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../equipamentos_de_medicao.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}

?>

