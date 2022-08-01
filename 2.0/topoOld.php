<?
$hora_atual = date('H:i');
if($hora_atual < "12:00:00"){ $saudacao = "Bom dia"; }
if($hora_atual > "11:59:59" and $hora_atual < "18:00:00"){ $saudacao = "Boa tarde"; }
if($hora_atual > "17:59:59"){ $saudacao = "Boa noite"; }
$pg = $_GET['pg'];
$nome_usuario_logado = $_SESSION['nome_usuario'];
require "include/config_filtros.php"; // Se login passar libera a configuração de filtro de acesso
require "include/funcoes.php";
?>

<!-- Topbar -->
<div class="topbar">
	<ul class="loginbar pull-right">
        <li class="topbar-devider"></li>   
        <li><a href="ajuda.php">Ajuda</a></li>  
        <li class="topbar-devider"></li>   
			<?
			require("include/conexao.php");
			if(isset($_SESSION['login_usuario']) AND isset($_SESSION['senha_usuario'])){
				$login_usuario = $_SESSION['login_usuario']; 
				$sql = mysql_query("SELECT * FROM login WHERE login = '$login_usuario'");
				$cont = mysql_num_rows($sql);
				while($linha = mysql_fetch_array($sql)){
					$nome = $linha['nome'];
				}
				if($cont == 0){//confere o usuario

				} 
				if($senha_db != $senha_usuario){//confere a senha 
					$teste_logado="1";
					
				} 
				?>
				<li>Bem Vindo(a): (<? echo $nome?>)</li>
				<li><a href="include/logout.php">SAIR</a></li>
				<?
				
			}else { $teste_logado="0";
			?>
				<li><a href="login.php">Login</a></li>   
		<? }?>
	</ul>
</div>
<!-- End Topbar -->

        
