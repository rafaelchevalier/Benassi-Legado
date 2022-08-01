<?php

include"conexao.php";

if(isset($_SESSION['login_usuario_caixa']) AND isset($_SESSION['senha_usuario_caixa']) AND $_SESSION['nivel_usuario_caixa'] < 1){
	$login_usuario_caixa = $_SESSION['login_usuario_caixa']; 
	$senha_usuario_caixa = $_SESSION['senha_usuario_caixa'];
	
	$sql = mysql_query("SELECT * FROM login WHERE login = '$login_usuario_caixa'");
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$senha_db = $linha['senha'];
}

if($cont == 0){//confere o usuario

	unset($_SESSION['login_usuario_caixa']);
	unset($_SESSION['senha_usuario_caixa']);

	echo"
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php>
	<script type=\"text/javascript\">	
	alert(\" Nome do usuário não existe.\");
	</script>";
} 

}else {
	echo"
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>
	<script type=\"text/javascript\">	
	alert(\" Você precisa estar logado para acessar esta página.\");
	</script>";
} 
?>