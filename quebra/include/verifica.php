<?
if ( isset($_SESSION['mercado_cnpj']) ){
	
	}
else{
	 //Caso as sessoes não existam, ou seus valores não conferem, redirecionamos
		echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../quebra/index.php'>
	<script type=\"text/javascript\">	
	alert(\" Você precisa estar logado para acessar esta área.\");
	</script>";
	exit;
	}

?>