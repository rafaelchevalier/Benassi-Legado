<?php 
include 'config.php';
$db = mysql_connect("$local_banco", "$usuario_banco", "$senha_banco");
if(!$db) die ('<h1>Falha na conexão com banco de dados!</h1>');
$dados = mysql_select_db("$nome_banco", $db);
?>