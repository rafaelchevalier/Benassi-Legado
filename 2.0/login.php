<? session_start();?>
<!DOCTYPE html> 
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>TI Benassi Rio</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.png">

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
    <link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
    <link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
    <!--[if lt IE 9]><link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms-ie8.css"><![endif]-->

    <!-- CSS Customization -->
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>    

<div class="wrapper">
    <!--=== Header ===-->    
    <div class="header">
        <div class="container">
            <!-- Logo -->
            <a class="logo" href="index.php">
                <img src="assets/img/logo1-default.png" alt="Logo">
            </a>
            <!-- End Logo -->
			<? 	//Carrega topo da página padrão... Não estã 
				require ("topo.php");
			?>
            <!-- Toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button>
            <!-- End Toggle -->
        </div><!--/end container-->
		<? 	//Carrega todo o menu da página padrão...
			require("menu.php");
		?>
		<!-- Cabeçalho Conteudo -->
		<div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">Login / Registro</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="?pg=cad">Cadastro</a></li>
				</ul>
			</div>
		</div>
		<!-- Fim Cabeçalho Conteudo -->

	
	<!-- Formulário de Cadastro de novos usuários -->
	<? if ($pg == "cad"){?>
	<div class="container content">
		<!-- Login-Form -->
        <div class="col-md-20">
            <form id="sky-form4" class="sky-form" name="cadusuario" method="post" action="include/adiciona.php?funcao=adiciona" >
                <header>Cadastro Usuário</header>            
                <fieldset>    
					<section>
						<div class="row">
							<label class="label col col-4">Nome Completo</label>
                            <div class="col col-8">
								<label class="input">
									<i class="icon-append fa fa-user"></i>
									<input type="text" name="nome" required>
                                </label>
                            </div>
                        </div>
                    </section> 
					<section>
						<div class="row">
							<label class="label col col-4">Login</label>
                            <div class="col col-8">
								<label class="input">
									<i class="icon-append fa fa-user"></i>
									<input type="text" name="login" required>
                                </label>
                            </div>
                        </div>
                    </section>        
						
					<section>
						<div class="row">
							<label class="label col col-4">Senha</label>
							<div class="col col-8">
								<label class="input">
									<i class="icon-append fa fa-lock"></i>
									<input type="password" name="password" placeholder="Password" id="password" >
									<b class="tooltip tooltip-bottom-right">Don't forget your password</b>
								</label>
							</div>
						</div>
                    </section>
                    <section>
						<div class="row">
							<label class="label col col-4">Confirmação Senha</label>
							<div class="col col-8">
								<label class="input">
									<i class="icon-append fa fa-lock"></i>
									<input type="password" name="passwordConfirm" placeholder="Confirm password">
									<b class="tooltip tooltip-bottom-right">Don't forget your password</b>
								</label>
							</div>
						</div>
					</section>
					<section>
						<div class="row">
							<label class="label col col-4">Email</label>
                            <div class="col col-8">
								<label class="input">
									<i class="icon-append fa fa-envelope"></i>
									<input type="email" name="email" required>
                                </label>
                            </div>
                        </div>
                    </section>
					<section>
						<div class="row">
							<label class="label col col-4">Nascimento</label>
                            <div class="col col-4">
								Dias
								<label class="select">
									<select name="dia" size="1">
											<option value="01">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
											<option value="06">06</option>
											<option value="07">07</option>
											<option value="08">08</option>
											<option value="09">09</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>
									</select>
									<i></i>
                                </label>
                            </div>
							<div class="col col-4">
								Mes
								<label class="select">
									<select name="mes" size="1">
									    <option value="01">Janeiro</option>
										<option value="02">Fevereiro</option>
									    <option value="03">Março</option>
									    <option value="04">Abril</option>
									    <option value="05">Maio</option>
									    <option value="06">Junho</option>
									    <option value="07">Julho</option>
									    <option value="08">Agosto</option>
									    <option value="09">Setembro</option>
									    <option value="10">Outubro</option>
									    <option value="11">Novembro</option>
									    <option value="12">Dezembro</option>
									</select>
									<i></i>
                                </label>
                            </div>
                        </div>
                    </section>
					<section>
							<div class="row">
								<label class="label col col-4">Celular</label>
								<div class="col col-8">
									<label class="input">
										<i class="icon-append glyphicon glyphicon-phone"></i>
										<input type="text" name="celular">
									</label>
								</div>
							</div>
					</section>
					<section>
							<div class="row">
								<label class="label col col-4">Id-Nextel</label>
								<div class="col col-8">
									<label class="input">
										<i class="icon-append glyphicon glyphicon-phone"></i>
										<input type="text" name="radio">
									</label>
								</div>
							</div>
					</section>
					<section>
							<div class="row">
								<label class="label col col-4">Telefone</label>
								<div class="col col-8">
									<label class="input">
										<i class="icon-append glyphicon glyphicon-phone-alt"></i>
										<input type="text" name="telefone">
									</label>
								</div>
							</div>
					</section>
					<section>
							<div class="row">
								<label class="label col col-4">Setor</label>
								<div class="col col-8">
									<label class="input">
										<i class="icon-append  fa fa-building-o"></i>
										<input type="text" name="setor">
									</label>
								</div>
							</div>
					</section>
					<section>
							<div class="row">
								<label class="label col col-4">Empresa</label>
								<div class="col col-8">
									<label class="select">
										<i class="icon-append  fa-building-o"></i>
										<select name="loja" size="1"> 
											<?   
											//Conecta com banco de dados para puxar o nome das lojas cadastradas na tabela (lojas)
											require "include/conexao.php";
											$sql_login = mysql_query("SELECT * FROM lojas ");
											$cont2 = mysql_num_rows($sql_login);
											while($linha2 = mysql_fetch_array($sql_login)){	
											?>
											  <option value="<? echo $linha2['id'] ?>" onChange="<? $mercado = $linha2['loja']; ?>"> <? echo $linha2['loja'] ?></option>  
										   <?  } ?>
										</select>
									</label>
								</div>
							</div>
					</section>
					<section>
							<div class="row">
								<label class="label col col-4">Nivel Usu&aacute;rio</label>
								<div class="col col-8">
									<label class="select">
										<i class="icon-append fa fa-user"></i>
										<select name="nivel_usuario" size="1" id="nivel_usuario"> 
											<?   
											require "include/conexao.php";
											switch ($filt_usuario_filtro){
											case 1:
											$sql_filtro_acesso = mysql_query("SELECT * FROM filtro_acesso ");	
											break;
											default:
											$sql_filtro_acesso = mysql_query("SELECT * FROM filtro_acesso Where nome_perfil='Chamado' ");  	
											break;
											}
											$cont2 = mysql_num_rows($sql_filtro_acesso);
											while($linha_filtro = mysql_fetch_array($sql_filtro_acesso)){	
											?>
											 <option value="<? echo $linha_filtro['id'] ?>"> <? echo $linha_filtro['nome_perfil'] ?></option>  
										   <?  } ?>
										</select> 
									</label>
								</div>
							</div>
					</section>
				</fieldset>
                <footer>
					<button type="submit" class="btn-u" >Cadastrar</button>
                </footer>
            </form>         
		</div>	
	</div>
	<? }?>
	<!-- Fim Formulário de Cadastro -->
	<!-- Formulário de Login -->
	<? 
	if (!isset($_SESSION['login_usuario'])){?>
	<div class="container content">
		<!-- Login-Form -->
        <div class="col-md-6">
            <form method="post" action="include/logar.php" id="sky-form4" class="sky-form">
                <header>Login</header>            
                <fieldset>                  
					<section>
						<div class="row">
							<label class="label col col-4">Login</label>
                            <div class="col col-8">
								<label class="input">
									<i class="icon-append fa fa-user"></i>
									<input type="text" name="login" required >
                                </label>
                            </div>
                        </div>
                    </section>        
						
                    <section>
						<div class="row">
							<label class="label col col-4">Senha</label>
                            <div class="col col-8">
								<label class="input">
									<i class="icon-append fa fa-lock"></i>
                                    <input type="password" name="senha" required >
                                </label>
                            </div>
                        </div>
                    </section>
                </fieldset>
                <footer>
					<button type="submit" class="btn-u">Log in</button>
					<a href="?pg=cad" class="btn-u btn-u-default">Cadastrar</a>
                </footer>
            </form>         
		</div>	
	</div>
	<? } if (isset($_SESSION['login_usuario'])){?>
	<div class="container content">
		<div class="col col-12">
			<div class="row content-boxes-v1 margin-bottom-40">
				<div class="col-md-12 md-margin-bottom-30">                
					<h2 class="heading-sm">
						<i class="icon-custom rounded-2x icon-lg icon-bg-u fa fa-lightbulb-o"></i>
						<span><? echo $saudacao.": ".$nome."<br />Você já está logado"?></span>
					</h2>
				</div>  
			</div>
		</div>
	</div>
	<? }?>
	<!-- Fim Formulário de Login -->
	<div class="margin-bottom-40"></div>
    <!-- End Content Part -->
	</div>

 <? require ("rodape.php");?>
</div><!--/wrapper-->

<!-- JS Global Compulsory -->           
<script type="text/javascript" src="assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery/jquery-migrate.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/plugins/smoothScroll.js"></script>
<script src="assets/plugins/sky-forms-pro/skyforms/js/jquery.validate.min.js"></script>
<script src="assets/plugins/sky-forms-pro/skyforms/js/jquery.maskedinput.min.js"></script>
<script src="assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
<script src="assets/plugins/sky-forms-pro/skyforms/js/jquery.form.min.js"></script>
<!-- JS Customization -->
<script type="text/javascript" src="assets/js/custom.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/forms/reg.js"></script>
<script type="text/javascript" src="assets/js/forms/login.js"></script>
<script type="text/javascript" src="assets/js/forms/contact.js"></script>
<script type="text/javascript" src="assets/js/forms/comment.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        RegForm.initRegForm();
        LoginForm.initLoginForm();
        ContactForm.initContactForm();
        CommentForm.initCommentForm();
        });
</script>
<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/placeholder-IE-fixes.js"></script>
    <script src="assets/plugins/sky-forms-pro/skyforms/js/sky-forms-ie8.js"></script>
<![endif]-->

</body>
</html>