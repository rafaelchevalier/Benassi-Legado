<? session_start();
require ("include/verifica.php");
?>
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
            <? 	//Carrega todo o menu da página padrão...
				require ("topo.php");
			?>
			<!-- Toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button>
            <!-- End Toggle -->
        </div><!--/end container-->
		<? require("menu.php");?>
		<!-- Cabeçalho Conteudo -->
		<div class="breadcrumbs">
			<div class="container">
				<h1 class="pull-left">Menu Principal</h1>
				<ul class="pull-right breadcrumb">
					
				</ul>
			</div>
		</div>
		<!-- Fim Cabeçalho Conteudo -->

	<!--/Conteudo-->
	<div class="container content" >
		<!-- Begin Content -->
                <!-- Service Blcoks Sampe v3 -->
                <div class="row margin-bottom" id="sortable">
					<!-- Chamado -->
                    <div class="col-md-3 ui-state-default">
						<div class="service-block-light"> 
							<button type="button" class="btn btn-primary dropdown-toggle rounded-2x" data-toggle="dropdown">
								Chamados <br /> 
								<br />
								<img src="imagens/Helpdesk.png" width="50%" alt="Chamado"/>
								
								<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu" role="menu">
								<a href="chamado.php?pg=abre_chamado"><li class="service " ><i class="fa fa-list"></i>&nbsp Abrir Chamado</li></a>
								<a href="chamado.php?pg=consulta"><li class="service " ><i class="fa fa-list"></i>&nbsp Consultar</li></a>
							</ul>
						</div>
                    </div>
					<!-- Fim Chamado -->
					<!-- Controle de Quebra-->
					<? if ($filt_ti_menu == 1){// filtro para aparecer o menu somente para perfil com TI menu liberado ?>
					<div class="col-md-3 ui-state-default" >
						<div class="service-block-light"> 
							<button type="button" class=" btn btn-primary dropdown-toggle rounded-2x" data-toggle="dropdown">
								Controle de Quebras <br />(Descontinuado)
								<br />
								<img src="imagens/flv.png" width="50%" alt="Controle de Quebra"/>
								
								<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu" role="menu">
								<a href="#"><li class="service " ><i class="fa fa-list "></i>&nbsp Lançamento Quebra</li></a>
								<a href="#"><li class="service" ><i class="fa fa-list "></i>&nbsp Consulta</li></a>
								<a href="#"><li class="service" ><i class="fa fa-list "></i>&nbsp Relatório</li></a>
								
							</ul>
						</div>
                    </div>
					<? }?>
					<!-- Fim Controle de quebra-->
					<!-- Controle de Qualidade-->
					<? if ($filt_ti_menu == 1){// filtro para aparecer o menu somente para perfil com TI menu liberado ?>
					<div class="col-md-3 ui-state-default" >
						<div class="service-block-light"> 
							<button type="button" class=" btn btn-primary dropdown-toggle rounded-2x" data-toggle="dropdown">
								Controle de Qualidade <br />
								<br />
								<img src="imagens/qualidade.png" width="50%" alt="Controle Qualidade"/>
								
								<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu" role="menu">
								<a href="tempcam.php?pg=cad">
									<li class="service ">
										<i class="fa fa-list "></i>
										&nbsp Temp. Cam. Frigorífica
									</li>
								</a>
								<a href="fbl.php?pg=cad"><li class="service" ><i class="fa fa-list "></i>&nbsp FBL</li></a>
								<a href="fcvp.php?pg=cad"><li class="service" ><i class="fa fa-list "></i>&nbsp CVP - Controle de Vida de Prateleira do produto (Em Breve)</li></a>
							</ul>							
						</div>
                    </div>
					<? }?>
					<!-- Fim Controle de Qualidade-->
					<!-- Carrinhos de FLores -->
					<? if ($mov_carrinho_menu == 1){// filtro para aparecer o menu somente para perfil com TI menu liberado ?>
                    <div class="col-md-3 ui-state-default" >
						<div class="service-block-light"> 
							<button type="button" class=" btn btn-primary dropdown-toggle rounded-2x" data-toggle="dropdown">
								Carrinhos de Flores <br />
								<br />
								<img src="imagens/carrinho.png" width="50%" alt="Outros Controles"/>
								
								<i class="fa fa-angle-down"></i>
							</button>						
							<ul class="dropdown-menu" role="menu">
								<? if ($mov_carrinho_inclui == 1){?>
									<a href="carrinho.php?pg=qt_carrinho"><li class="service " ><i class="fa fa-list"></i>&nbsp Lançar</li></a>
									<a href="carrinho.php?pg=comprovante"><li class="service " ><i class="fa fa-list"></i>&nbsp Gera Comprovante</li></a>
								<? }?>
								<? if ($mov_carrinho_consulta == 1){?>
									<a href="carrinho.php?pg=consulta_comprovante"><li class="service " ><i class="fa fa-list"></i>&nbsp Reimprimir Comprovante</li></a>
									<a href="carrinho.php?pg=consulta"><li class="service " ><i class="fa fa-list"></i>&nbsp Consulta</li></a>
									<a href="#"><li class="service " ><i class="fa fa-list"></i>&nbsp Relatórios</li></a>
								<? }?>
							</ul>
						</div>
                    </div>
					<? }?>
					<!-- Fim Carrinhos de FLores -->
					<!-- Pedido de compras -->
					<? if ($filt_ti_menu == 10){// filtro para aparecer o menu somente para perfil com TI menu liberado ?>
                    <div class="col-md-3 ui-state-default" >
						<div class="service-block-light"> 
							<button type="button" class=" btn btn-primary dropdown-toggle rounded-2x" data-toggle="dropdown">
								Pedido de Compras <br />(Descontinuado)
								<br />
								<img src="imagens/carrinho.png" width="50%" alt="Outros Controles"/>
								
								<i class="fa fa-angle-down"></i>
							</button>						
							<ul class="dropdown-menu" role="menu" id="sortable">
								<a href="#"><li class="service " ><i class="fa fa-list"></i>&nbsp Requisição de Compra</li></a>
								<a href="#"><li class="service " ><i class="fa fa-list"></i>&nbsp Orçamento</li></a>
								<a href="#"><li class="service " ><i class="fa fa-list"></i>&nbsp Aprovação</li></a>
							</ul>
						</div>
                    </div>
					<? }?>
					<!-- Fim Pedido de Compras -->
					<!-- Ramais -->
					<? if ($filt_ti_menu == 1){// filtro para aparecer o menu somente para perfil com TI menu liberado ?>
					<div class="col-md-3 ui-state-default"  >
						<div class="service-block-light"> 
							<a href="#">
								<button type="button" class=" btn btn-primary dropdown-toggle rounded-2x">
								Ramais <br />(Em Breve)
									<br />
									<img src="imagens/tel.png" width="50%"  alt="Lista de Ramais"/>
									
								</button>
							</a>
						</div>
                    </div>
					<? }?>
					<!-- Fim Ramais -->
					<!-- Controle de Devoluções-->
					<? if ($filt_ti_menu == 10){// filtro para aparecer o menu somente para perfil com TI menu liberado ?>
					<div class="col-md-3 ui-state-default" >
						<div class="service-block-light"> 
							<button type="button" class=" btn btn-primary dropdown-toggle rounded-2x" data-toggle="dropdown">
								Controle de Devoluções <br />
								<br />
								<img src="imagens/nfe.png" width="50%" alt="Controle Qualidade"/>
								
								<i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu" role="menu">
								<a href="xml_devolucoes.php?pg=con"><li class="service" ><i class="fa fa-list "></i>&nbsp Devoluções Itens</li></a>
								<a href="#"><li class="service" ><i class="fa fa-list "></i>&nbsp Devoluções Cab</li></a>
								<a href="classe/xml.php"><li class="service" ><i class="fa fa-list "></i>&nbsp Importar XML</li></a>
								<a target="_blank" href="relatorios/rel_devolucoes.php"><li class="service" ><i class="fa fa-list "></i>&nbsp Relatório Destinadas</li></a>
							</ul>
						</div>
                    </div>
					<? }?>
					<!-- Fim Controle de Devoluções-->

                </div>
                <!-- End Service Blcoks Sampe v3 -->
            </div>
            <!-- End Content -->       
	

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

<!-- Incio JqueryUI -->
<!-- Incio Jquery UI autocompletar -->
<!-- Jquery UI -->

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	

<script type="text/javascript">
    $(document).ready(function() {
		//Sortable
		$( "#sortable" ).sortable({
			placeholder: "ui-state-highlight"
		});
		$( "#sortable" ).disableSelection();
	});	
</script>
<!-- Fim JqueryUI -->
<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/placeholder-IE-fixes.js"></script>
    <script src="assets/plugins/sky-forms-pro/skyforms/js/sky-forms-ie8.js"></script>
<![endif]-->

</body>
</html>