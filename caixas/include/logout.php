<?php
	session_start();

	unset($_SESSION["login_usuario_caixa"]);
	unset($_SESSION["senha_usuario_caixa"]);
	unset($_SESSION['nivel_usuario_caixa']);

	header("location: ../index.php");
?>