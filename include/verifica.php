<?
if ( isset($_SESSION['login_usuario']) ){
	require "include/conexao.php";
	$id_usuario = $_SESSION['id_usuario'];
	$sql = mysql_query("SELECT * FROM login WHERE id = '$id_usuario' LIMIT 1");
	while($linha = mysql_fetch_array($sql)){
		if($linha['email'] == ""){
			echo"
				<META HTTP-EQUIV=REFRESH CONTENT='0; URL=usuarios.php?pg=alterauser&id=$id'>
				<script type=\"text/javascript\">	
					alert(\" Favor atualizar seu email cadastrado no sistema. Isso é muito importanto para o acompanhamento de seus chamados.\");
				</script>
			";
		}	
	}
}
else{
	 //Caso as sessoes não existam, ou seus valores nn�oo conferem, redirecionamos
		echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=2.0/index.php'>
	<script type=\"text/javascript\">	
	alert(\" Você precisa estar logado para acessar esta área.\");
	</script>";
	exit;
	}

?>