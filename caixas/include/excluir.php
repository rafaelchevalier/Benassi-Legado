<?php
include'conexao.php';
include'funcoes.php';


if ($funcao == "excluiradm"){
	$id = $_GET['id'];
	$sql = ("DELETE FROM login where id='$id'");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../usuario.php?pg=relusuario'>
	<script type=\"text/javascript\">	
	</script>";
}

if ($funcao == "excluircaixa"){
	$id = $_GET['id'];
	$sql = ("DELETE FROM caixas where id='$id'");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../caixas.php?pg=relcaixas'>
	<script type=\"text/javascript\">	
	</script>";
}

if ($funcao == "excluirmercado"){
	$id = $_GET['id'];
	$sql = ("DELETE FROM mercado where id='$id'");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../mercado.php?pg=relmercado'>
	<script type=\"text/javascript\">	
	</script>";
}
if ($funcao == "excluir_contagem"){
	$id = $_GET['id'];
	$sql = ("DELETE FROM contagem where id='$id'");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../contagem.php?pg=relcont&ordenar='>
	<script type=\"text/javascript\">	
	</script>";
}

?>