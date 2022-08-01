<?
require 'conexao.php';
require 'funcoes.php';


//************************************ INICIO CADASTRA AFERIÇÃO *******************************************************
if($funcao == "cad" ){//Cadastra nova aferição
    $qt = 0;
	$qt_cad =0;
    if ($_GET['qt'] =="" or $_GET['qt'] > "40" ){$_GET['qt'] = 5; }
   for($i=0; $i < $_GET['qt']; $i++){
	$qt ++;
	
  if($_REQUEST['nome'.$i] != ""){//Só grava se o campo nome estiver preenchido
	$qt_cad ++;
cad (
		utf8_decode($_REQUEST['nome'.$i]),
		utf8_decode($_REQUEST['loja'.$i]),
		utf8_decode($_REQUEST['funcao'.$i]),
		utf8_decode($_REQUEST['setor'.$i]),
		utf8_decode($_REQUEST['superior'.$i]),
		utf8_decode($_REQUEST['sistema'.$i]),
		utf8_decode($_REQUEST['email'.$i]),
		utf8_decode($_REQUEST['tipo'.$i]),
		converte_data($_REQUEST['data'])
	);
   }}
   if($qt == 0){
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../rh_novo_funcionario.php?pg=cad'>
	<script type=\"text/javascript\">	
	alert(\" Nenhum cadastro efetuado. Você deve preencher todos os campos obrigatorios.\");
	</script>";
   }
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../rh_novo_funcionario.php?pg=cad'>
	<script type=\"text/javascript\">	
	alert(\" $qt_cad Cadastros efetuado com sucesso.\");
	</script>";
}// Fim teste funcao=cad

function cad($nome,$loja,$funcao,$setor,$superior,$sistema,$email,$tipo,$data){// Cadastra nova aferição

	$sql = "insert into rh_novo_funcionario 
		(nome,loja,funcao,setor,superior,sistema,email,tipo,data_contratacao,data_cad) 
		values 
		('$nome','$loja','$funcao','$setor','$superior','$sistema','$email','$tipo','$data',now())";
	mysql_query($sql);
	}// Fim função cad

//************************************ INICIO Exclui *******************************************************
if($funcao == "exclui"){
	$id = $_GET['id'];
	$sql = ("DELETE FROM rh_novo_funcionario where id='$id'");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../rh_novo_funcionario.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}
if($funcao == "exclui_varios"){	
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql = "delete from rh_novo_funcionario WHERE id IN ($excluir) ";

	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../rh_novo_funcionario.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}

?>

