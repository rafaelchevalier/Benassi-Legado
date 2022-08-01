<?
include'conexao.php';
include'funcoes.php';


if($funcao == "excluiruser"){
	$id = $_GET['id'];
	$sql = ("DELETE FROM login where id='$id'");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../usuarios.php?pg=relusuario'>
	<script type=\"text/javascript\">	
	</script>";
}
if($funcao == "excluir_patrimonio"){
	$id = $_GET['id'];
	$sql = ("DELETE FROM inventario where id='$id'");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../patrimonio.php?pg=rel_patrimonio'>
	<script type=\"text/javascript\">	
	</script>";
}

?>