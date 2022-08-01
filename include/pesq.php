<?
include 'conexao.php';

//************************************ INICIO Cadastro CAD_PESQ *******************************************************

if($funcao == "cad"){//Adiciona nova balança
cad (utf8_decode($_REQUEST['pergunta']),$_REQUEST['ativo']);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../pesq.php?pg=cad'>
	<script type=\"text/javascript\">	
	alert(\" Balança Cadastrada com sucesso.\");
	</script>";
}// Fim teste funcao=cad

function cad($pergunta, $ativo){// CADASTRO
	$sql = "insert into cad_pesq (pergunta,ativo,data_cad,hora_cad) values ('$pergunta','$ativo',now(),now())";
	mysql_query($sql);
	}// Fim função cads
//************************************ INICIO Altera Balança *******************************************************	
	
if($funcao == "alt"){
$id = $_GET['id'];

alt(utf8_decode($_REQUEST['pergunta']),$_REQUEST['ativo']);

	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../pesq.php?pg=consulta_pesq1'>
	<script type=\"text/javascript\">	
	</script>";

}

function alt($pergunta, $ativo){
		$id = $_GET['id'];
	$sql = (" UPDATE cad_pesq SET ativo='$ativo',data_alt= now() ,hora_alt= now() where id='$id'");
	mysql_query($sql);
	}
	


//************************************ INICIO Cadastro PESQ*******************************************************

if($funcao == "cad_pesq2"){//Adiciona nova balança
cad_pesq2 (utf8_decode($_REQUEST['nome']),utf8_decode($_REQUEST['empresa']),utf8_decode($_REQUEST['email']),utf8_decode($_REQUEST['tel']),utf8_decode($_REQUEST['cont']),utf8_decode($_REQUEST['obs']));
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../pesq.php?pg=cad'>
	<script type=\"text/javascript\">	
	alert(\" Obrigado por deixar sua avaliação.\");
	</script>";
}// Fim teste funcao=cad

function cad_pesq2($nome,$empresa,$email,$tel,$cont,$obs){// CADASTRO
	$sql = "insert into pesq_cab (nome,empresa,email,tel,total,obs,data_cad,hora_cad) values ('$nome','$empresa','$email','$tel','$cont','$obs',now(),now())";
	mysql_query($sql);
	$ultimo_id = mysql_insert_id();
		for ($i=2; $i <= $cont; $i++){
cad_pesq_itens (utf8_decode($_REQUEST['pergunta'.$i]),utf8_decode($_REQUEST['avaliacao'.$i]),$ultimo_id);	
		}

	}// Fim função cads

function cad_pesq_itens($pergunta,$avaliacao,$ultimo_id){
	$sql = "insert into pesq_itens (pergunta,avaliacao,id_pesq_cab) values ('$pergunta','$avaliacao','$ultimo_id')";
	mysql_query($sql);
}


if($funcao == "exclui_pesguntas"){	
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql = "delete from cad_pesq WHERE id IN ($excluir) ";

	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../pesq.php?pg=consulta_pesq1'>
	<script type=\"text/javascript\">	
	</script>";
}

if($funcao == "exclui_pesquisa"){	
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql = "delete from pesq_cab WHERE id IN ($excluir) ";
	$sql2 = "delete from pesq_itens WHERE id_pesq_cab IN ($excluir) ";

	mysql_query($sql);
	mysql_query($sql2);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../pesq.php?pg=consulta_pesq2'>
	<script type=\"text/javascript\">	
	</script>";
}


?>