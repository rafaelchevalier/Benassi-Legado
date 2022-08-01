<?php
include 'config.php';
$db = mysql_connect("$local_banco", "$usuario_banco", "$senha_banco");
$dados = mysql_select_db("$nome_banco", $db);
?>