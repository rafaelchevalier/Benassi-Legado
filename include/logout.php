<?php
	session_start();

	unset($_SESSION["login_usuario"]);
	unset($_SESSION["senha_usuario"]);
	unset($_SESSION['nivel_usuario']);
	unset($_SESSION['id_usuario']);
	unset($_SESSION['nome_usuario']);
	unset($_SESSION['id_perfil_acesso']);
	unset($_SESSION['email_usuario']);

	header("location: ../2.0/index.php");
?>