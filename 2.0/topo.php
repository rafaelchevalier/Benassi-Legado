<?
$hora_atual = date('H:i');
if($hora_atual < "12:00:00"){ $saudacao = "Bom dia"; }
if($hora_atual > "11:59:59" and $hora_atual < "18:00:00"){ $saudacao = "Boa tarde"; }
if($hora_atual > "17:59:59"){ $saudacao = "Boa noite"; }
$pg = $_GET['pg'];
$nome_usuario_logado = $_SESSION['nome_usuario'];
require "include/config_filtros.php"; // Se login passar libera a configuração de filtro de acesso
require "include/funcoes.php";
require "include/funcoes_aux.php";
?>

    <!-- Web Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- CSS Header and Footer -->
    <link rel="stylesheet" href="assets/css/headers/header-default.css">
    <link rel="stylesheet" href="assets/css/footers/footer-v1.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="assets/plugins/animate.css">
    <link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="assets/css/custom.css">
	
	<!-- Data Table 
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
	
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
	
	<!-- Fim data table -->
	
	<!-- Jquery UI
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<!-- Fim Jquery UI -->

	
	

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

        
