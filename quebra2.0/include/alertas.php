<?php

$usuario_inexistente = echo"
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../index.php'>
	<script type=\"text/javascript\">	
	alert(\" teste Nome do usuário não existe.\");
	</script>";

$senha_incorreta = echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../index.php'>
	<script type=\"text/javascript\">	
	alert(\" Senha incorreta.\");
	</script>";
	
$manutencao_sistema = echo"
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../quebra.php?pg=tipo'>
	<script type=\"text/javascript\">	
	alert(\" Estamos em manutenção previsão para normalização do sistema é 25/02/2016. Favor arquivar informações .\");
	</script>";

?>