<?
//Função para pesquisas da contagem///////////////////////////////////////////////////////
// Pesquisa por data
if($funcao == "pesquisa_contagem_data"){
pesquisa_contagem_data ($_REQUEST['data1'], $_REQUEST['data2']);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../usuario.php?pg=cadadm'>
	<script type=\"text/javascript\">	
	</script>";
}

?>