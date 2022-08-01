<?
require"include/verifica.php";

//configuração para conexão com banco de dados SQL.
$local_banco="mysql.webevolution.info";
$usuario_banco="webevolution03";
$senha_banco="benassi01";
$nome_banco="webevolution03";
//Conexão com banco de dados
$db = mysql_connect("$local_banco", "$usuario_banco", "$senha_banco");
$dados = mysql_select_db("$nome_banco", $db);
//Variaveis que serão alteradas
$msg ="/t Agora deve digitar o CNPJ de sua loja.....";

//Variavel para filtro altera somente a fariavel que bate com a informação pre definida
$ativo = "0";


	$sql = (" UPDATE login SET msg_desativado='$msg' where ativo ='$ativo'");
	mysql_query($sql);


?>