 <?
require 'conexao.php';
require 'funcoes.php';

//************************************ INICIO CADASTRA AFERIÇÃO *******************************************************


if($funcao == "cad"){//Cadastra nova aferição
    $qt = 0;

   for($i=0; $i < 1; $i++){
	$qt ++;
	
 
cad (converte_data($_REQUEST['data']),
		 utf8_decode($_REQUEST['nome']),
		 utf8_decode($_REQUEST['maquina'.$i]),
		 utf8_decode($_REQUEST['situacao'.$i]),
		 utf8_decode($_REQUEST['obs'.$i]),
		 utf8_decode($_REQUEST['situacao_impressora'.$i]),
		 utf8_decode($_REQUEST['obs_impressora'.$i]),
		 utf8_decode($_REQUEST['situacao_balanca'.$i]),
		 utf8_decode($_REQUEST['obs_balanca'.$i]),
		 utf8_decode($_REQUEST['situacao_conservacao'.$i]),
		 utf8_decode($_REQUEST['obs_conservacao'.$i])
		 );
   }
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../ocorrencia_cozinha.php?pg=cad'>
	<script type=\"text/javascript\">	
	alert(\" Cadastro efetuado com sucesso.\");
	</script>";
}// Fim teste funcao=cad_fbl

function cad($data,$nome,$maquina,$situacao,$obs,$situacao_impressora,$obs_impressora,$situacao_balanca,$obs_balanca,$situacao_conservacao,$obs_conservacao){// Cadastra nova aferição
	$sql = "insert into ocorrencia_cozinha (data_cad,usuario_cad,maquina,situacao,obs,situacao_impressora,obs_impressora,situacao_balanca,obs_balanca,situacao_conservacao,obs_conservacao,hora_cad) values 
	('$data','$nome','$maquina','$situacao','$obs','$situacao_impressora','$obs_impressora','$situacao_balanca','$obs_balanca','$situacao_conservacao','$obs_conservacao',now())";
	mysql_query($sql);
	}// Fim função cad_fbl

//************************************ INICIO Exclui Balança *******************************************************

if($funcao == "exclui_varios"){	
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql = "delete from ocorrencia_cozinha WHERE id IN ($excluir) ";

	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../ocorrencia_cozinha.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}

?>

