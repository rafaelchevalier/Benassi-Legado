<?php
	session_start();

	unset($_SESSION["mercado_senha"]);
	unset($_SESSION["mercado_cnpj"]);
	unset($_SESSION['mercado_id']);
	unset($_SESSION['mercado_email']);
	unset($_SESSION['mercado_cod_tab']);

	header("location: ../index.php");
?>