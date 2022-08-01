<?
require "include/conexao.php";

$sql = mysql_query("SELECT * FROM login order by login desc");
$cont = mysql_num_rows($sql);
	echo "Nome de Usuários: <br />";
	$i = 0;
while($linha = mysql_fetch_array($sql)){
	$V_nome[$i] = $linha['nome'];
	$i ++;
}
for($e=0;$e<$i;$e++){ 
	echo $V_nome[$e]."<br />";
}
?>