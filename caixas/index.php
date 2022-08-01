<?
session_start();
if(isset($_SESSION['login_usuario_caixa']) AND isset($_SESSION['senha_usuario_caixa'])){
	require"topo.php";
	require"home.php";
	require"rodape.php";
}//Fecha if 
else{
require"topo.php";
require"login.php";
require"rodape.php";

}//Fecha else
?>

