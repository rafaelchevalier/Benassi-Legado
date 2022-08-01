<?php
include 'config.php';
$db = mysql_connect("$local_banco_mysoft", "$usuario_banco_mysoft", "$senha_banco_mysoft");
$dados = mysql_select_db("$nome_banco_mysoft", $db);
?>