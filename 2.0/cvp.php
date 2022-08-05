<? session_start();
require ("include/verifica.php");
?>
<!DOCTYPE html> 

<html lang="pt-br"> 
<head>
    <title>CVP - Controle de Vida de Prateleira do produto</title>
	
	    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Rafael Chevalier">

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
<!--=== Inicio Cabeçalho indivial ===-->   
<div class="wrapper">
     
    <div class="header">
        <div class="container">
            <!-- Logo -->
            <a class="logo" href="index.php">
                <img src="assets/img/logo1-default.png" alt="Logo">
            </a>
            <!-- End Logo -->
            <? 	//Carrega o topo da página padrão...
				require ("topo.php");
			?>
			<!-- Toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars"></span>
            </button>
            <!-- End Toggle -->
        </div><!--/end container-->
		<? //Carrega todo o menu da página padrão...
		require("menu.php");
		?>
	</div>
	<!--=== End Header ===-->
	<!-- Descrição página Conteudo -->
	<div class="breadcrumbs">
		<div class="container">
			<h1 class="pull-left">CVP -  Controle de Vida de Prateleira do produto</h1>
			<ul class="pull-right breadcrumb">		
				<? require_once('menu_subpagina.php'); ?>
			</ul>
		</div>
	</div>
<!--=== Fim Cabeçalho indivial ===-->   
<!-- ********************************************************************************************************************* 
											 Cadastro 
************************************************************************************************************************-->
<? if ($pg == "cad" and $filt_qualidade_inclui == true) {//Cadastra?>
	<div class="container content">
		<div class="panel panel-sea margin-bottom-12">
			<div class="panel-heading col-md-12">
				<span class="panel-title ">
					Cadastro
				</span>
			</div>
			<form action="include/cvp.php?funcao=cad" method="post" id="sky-form" class="sky-form" enctype="multipart/form-data">
				<fieldset> 
					<div class="row">
						<div class="col col-6">
							<label>Produto</label>
							<label class="input">
								<i class="icon-append fa fa-barcode"></i>
								<input type="text" name="produto" id="prod" value="" onkeypress="autoTab(this, event); return event.keyCode != 13;"  >
							</label>
						</div>
						<div class="col col-6">
							<label>Codigo Rastreio</label>
							<label class="input">
								<i class="icon-append fa fa-barcode"></i>
								<input type="text" name="cod_rastreio" id="cod_rastreio" value="<? if (!empty($_REQUEST['cod_rastreio'])){echo $_REQUEST['cod_rastreio'];} ?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;">
							</label>
						</div>							
					</div>
				</fieldset>
				<fieldset>
					<div class="row">
						<section class="col col-4">
							<label>Embalagem</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" autocomplete="off" name="embalagem" id="start" value="<? if (!empty($_REQUEST['embalagem'])){echo $_REQUEST['embalagem'];}if (empty($_REQUEST['embalagem'])){echo converte_data2($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Embalagem">
							</label>
						</section>
						<section class="col col-4">
							<label>Validade</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" autocomplete="off" name="validade" id="finish" value="<? if (!empty($_REQUEST['validade'])){echo $_REQUEST['validade'];}if (empty($_REQUEST['validade'])){echo converte_data2($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Validade">
							</label>
						</section>
						<div class="col col-4">
							<label>Responsável</label>
							<label class="input">
								<i class="icon-append fa fa-user"></i>
								<input type="text" name="responsavel" id="responsavel" value="<? if (!empty($_REQUEST['responsavel'])){echo $_REQUEST['responsavel'];} ?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;">
							</label>
						</div>
					
					</div>
				</fieldset>
				
				<footer> 
					<button type="submit" class="btn-u btn-u-green rounded-2x">
						<i class="icon-pencil">Cadastrar</i>
					</button>
                </footer>
			</form>
		</div>
	</div>
<? }?>
<!-- ********************************************************************************************************************* 
											 Fim Cadastro 
************************************************************************************************************************-->

<!-- ********************************************************************************************************************* 
											  Cadastro Avaliação
************************************************************************************************************************-->
<? if ($pg == "cad_avaliacao" and $filt_qualidade_inclui == true ) {//Cadastra Itens
	$id = $_GET['id'];
	
	$sql = mysql_query("SELECT * FROM cvp_cab 
		WHERE id = $id 
	");

	while($linha = mysql_fetch_array($sql)){
		$produto 		= $linha['produto'];
		$embalagem 		= $linha['embalagem'];
		$validade 	 	= $linha['validade'];
		$cod_rastreio 	= $linha['cod_rastreio'];
		$responsavel 	= $linha['responsavel'];
		$data_cad 		= $linha['embalagem'];
		$aberto 		= $linha['aberto'];
	}	
?>
	
	<div class="container content">
		<div class="panel panel-sea margin-bottom-12">
			<div class="panel-heading col-md-12">
				<span class="panel-title col-md-11">
					  Cadastro avaliação
				</span>
				<span class="panel-title col-md-1 justify-content-end">
					<? if($aberto == true){?>
						<a class="btn-u btn-u-red" type="button" href="include/cvp.php?funcao=fechaAvaliacao&id=<?echo $id?>"><i class="fa fa-power-off"></i></a>
					<? } 
					if($aberto == false){?>
						<a class="btn-u btn-u-green" type="button" href="include/cvp.php?funcao=AbreAvaliacao&id=<?echo $id?>"><i class="fa fa-power-off"></i></a>
					<? }?>
				</span>
			</div>			
			<div class="container content">
				<form id="sky-form" class="sky-form" enctype="multipart/form-data">
					<div class="col col-2">
						<label>Data</label>
						<label class="input">
							<i class="icon-append fa fa-calendar"></i>
							<input type="text" readonly="true" name="data"  value="<? echo converte_data($data_cad); ?>">
						</label>
					</div>
					<div class="col col-3">
						<label>Produto</label>
						<label class="input">
							<i class="icon-append fa fa-barcode"></i>
							<input type="text" readonly="true" name="produto" id="prod" value="<? echo $produto; ?>">
						</label>
					</div>
					<div class="col col-3">
						<label>Codigo Rastreio</label>
						<label class="input">
							<i class="icon-append fa fa-barcode"></i>
							<input type="text" readonly="true" name="cod_rastreio" id="cod_rastreio" value="<? echo $cod_rastreio; ?>">
						</label>
					</div>	
					<div class="col col-2">
						<label>Embalagem</label>
						<label class="input">
							<i class="icon-append fa fa-calendar"></i>
							<input type="text" readonly="true" name="embalagem" value="<? echo converte_data($embalagem); ?>">
						</label>
					</div>
					<div class="col col-2">
						<label>Validade</label>
						<label class="input">
							<i class="icon-append fa fa-calendar"></i>
							<input type="text" readonly="true" name="validade" value="<? echo converte_data($validade); ?>">
						</label>
					</div>
				</form>
			</div>
			<!-- Avaliações -->
		</div>
		
		<div class="panel panel-sea margin-bottom-12">
			<div class="panel-heading col-md-12">
				<span class="panel-title ">
					Avaliações Realizadas 
				</span>
			</div>
			<div class="container content">
				<?
				$cont_avaliacao = 0;
				$sql_avaliacao = mysql_query("SELECT * FROM cvp_avaliacoes 
					WHERE id_cvp_cab = $id 
					ORDER BY data
				");
				
				while($linha_itens = mysql_fetch_array($sql_avaliacao)){
					$cont_avaliacao ++;
					$avaliacao = "";
					switch ($linha_itens['avaliacao']){
						case 0:
							$avaliacao = "BOM";
						break;
						case 1:
							$avaliacao = "REGULAR";
						break;
						case 2:
							$avaliacao = "RUIM";
						break;
						default:
						$avaliacao = "";
					}
				?>
					
					
				<div class="col-md-2 col-sm-3">
					<? if($avaliacao == "BOM") {?>
						<div class="service-block service-block-sea service-or">
							<div class="service-bg"></div>
							<i class="icon-custom icon-color-light rounded-x fa fa-thumbs-o-up"></i>
					<? }?>
					<? if($avaliacao == "REGULAR") {?>
						<div class="service-block service-block-yellow service-or">
							<div class="service-bg"></div>
							<i class="icon-custom icon-color-light rounded-x fa fa-lightbulb-o"></i>
					<? }?>
					<? if($avaliacao == "RUIM") {?>
						<div class="service-block service-block-red service-or">
							<div class="service-bg"></div>
							<i class="icon-custom icon-color-light rounded-x fa fa-thumbs-o-down"></i>
					<? }?>
							<p><?php echo "Dia: ",$cont_avaliacao; ?></p>
							<h2 class="heading-md"><? echo converte_data($linha_itens['data']) ?></h2>
							<p><? echo $avaliacao ?></p>
							<? if ($aberto == true){?>
							<a href="include/cvp.php?funcao=exclui_avaliacao&id=<?echo $linha_itens['id']?>"><span class="badge badge-red rounded-2x"><i class="fa fa-times"></i></span></a>
							<? }?>
						</div>
						
					</div>
					<? }?>
					
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<? if ($aberto == true){?>
	<div class="container content">
		<div class="panel panel-sea margin-bottom-12">
			<div class="panel-heading col-md-12">
				<span class="panel-title ">
					Nova Avaliação
				</span>
			</div>
			<div class="container content">
				<form action="include/cvp.php?funcao=cad_itens&id=<? echo $_GET['id']?>" method="post" id="sky-form" class="sky-form" enctype="multipart/form-data">
					<div class="col col-2">
						<label>Data</label>
						<label class="input">
							<i class="icon-append fa fa-user"></i>
							<input type="text" autocomplete="off" name="data" id="finish" value="<? echo converte_data2($data_atual) ?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;">
						</label>
					</div>
					<div class="col col-2">
						<label class="select">
						<label>Avaliação</label>
							<select name="avaliacao">
								<option value="0">BOM</option>
								<option value="1">REGULAR</option>
								<option value="2">RUIM</option>
								
							</select>
						</label>
					</div>
					<div class="col col-8">
						<br />
						<button type="submit" class="btn-u btn-u-green rounded-2x">
							<i class="icon-pencil"> Cadastrar</i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<? }?>
	
	
<? }?>
<!-- ********************************************************************************************************************* 
											 Fim Cadastro Avaliação
************************************************************************************************************************-->


<!-- ********************************************************************************************************************* 
											 Consulta 
************************************************************************************************************************-->
<? if ($pg == "con" and $filt_fbl_consulta = "1") {//Consulta  
	$selected = 'selected="selected"';
	?>
	<div class="container content">
		<form method="post" action="cvp.php?pg=con" id="sky-form4" class="sky-form">
			<header>Consulta CVP - Filtros </header>            
			<fieldset>      
				<section>
					<div class="row">
						<div class="col col-6">
							<label>Início</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" autocomplete="off" name="data1" id="start" required value="<? if (!empty($_REQUEST['data1'])){echo $_REQUEST['data1'];}if (empty($_REQUEST['data1'])){echo converte_data2($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" title="Data Inicial">
							</label>
						</div>	
						<div class="col col-6">
							<label>Fim</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" autocomplete="off" name="data2" id="finish" required value="<? if (!empty($_REQUEST['data2'])){echo $_REQUEST['data2'];}if (empty($_REQUEST['data2'])){echo converte_data2($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" title="Data Final">
							</label>
						</div>
					</div>
				</section> 
			</fieldset> 
			<fieldset>      
				<section>
					<div class="row">
						<div class="col col-3">
							<label>Produtos</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="produto" id="produto"  value="<? if (!empty($_REQUEST['produto'])){echo $_REQUEST['produto'];}?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Produtos">
								
							</label>
						</div>	
						<div class="col col-3">
							<label>Cod. Rastreio</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="cod_rastreio" id="cod_rastreio"  value="<? if (!empty($_REQUEST['cod_rastreio'])){echo $_REQUEST['cod_rastreio'];}?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Cod. Rastreio">
								
							</label>
						</div>	
						<div class="col col-3">
							<label>Responsável</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="responsavel" id="responsavel"  value="<? if (!empty($_REQUEST['responsavel'])){echo $_REQUEST['responsavel'];}?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Responsável">
								
							</label>
						</div>	
						<div class="col col-3">
							<label>Situação</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="aberto" size="1" id="aberto">
									<option value="" selected="selected">Todos</option>
									<option value="true" <? if (!empty($_REQUEST['aberto']) AND $_REQUEST['aberto'] == true ){echo $selected;} ?>>
										Aberto
									</option>
									<option value="false" <? if (!empty($_REQUEST['aberto']) AND $_REQUEST['aberto'] == false ){echo $selected;} ?>>
										Fechado
									</option>
								</select> 
							</label>
						</div>	
					</div>
				</section> 
			</fieldset> 
			<footer>
					<button type="submit" class="btn-u  icon  icon-magnifier"> Buscar </button>
            </footer>
		</form>
		<form method="post" action="include/cvp.php?funcao=exclui_varios" id="sky-form4" class="sky-form">
			<fieldset>
				<div class="panel panel-sea margin-bottom-40">
					<div class="panel-heading col-md-12">
						<button class="btn btn-warning btn-sm rounded-2x" onClick="history.go(0)">
								<i class="fa fa-refresh" title="ATUALIZA lISTA"></i>
						</button>		
						<? if ($filt_qualidade_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
							<button type="submit" class="btn btn-danger btn-sm rounded-2x fa fa-trash-o"></button>
						<? }?>
					</div>
				</div>
			</fieldset>
			<fieldset>  
				<table class="table table-hover table-striped" id="myTable">
					<thead>
						<tr>
							<th class="col-md-1">OPÇÕES</th>
							<th class="col-md-1">DATA LANÇAMENTO</th>
							<th class="col-md-3">PRODUTO</th>
							<th class="col-md-1">EMBALAGEM</th>
							<th class="col-md-1">VALIDADE</th>
							<th class="col-md-2">COD. RASTREIO</th>
							<th class="col-md-2">RESPONSÁVEL</th>
							<th class="col-md-1">SITUAÇÃO</th>
													
						</tr>
					</thead>
					<tbody>
						<?
						$data_atual = date("d/m/Y");
						  require"include/conexao.php";
						//****************  Inicio Filtros **************************
						//Filtro de consulta a tabela  
						//Filtro Data inicio
						
					
						if(!empty($_REQUEST['data1'])){
							$filt1 = converte_data2($_REQUEST['data1']);
						}else{
							$filt1 = converte_data($data_atual);
						}
						
						//Filtro data Final
						if(!empty($_REQUEST['data2'])){
							$filt2 = converte_data2($_REQUEST['data2']);
						}else{
							$filt2 = converte_data($data_atual);
						}
						
						if(!empty($_REQUEST['produto'])){
							$produto_filt = "AND produto LIKE '%".$_REQUEST['produto']."%'";
						}else{
							$produto_filt = "";
						}
						
						if(!empty($_REQUEST['cod_rastreio'])){
							$cod_rastreio_filt = "AND cod_rastreio like '%".$_REQUEST['cod_rastreio']."%'";
						}else{
							$cod_rastreio_filt = "";
						}
						
						if(!empty($_REQUEST['responsavel'])){
							$responsavel_filt = "AND responsavel like '%".$_REQUEST['responsavel']."%'";
						}else{
							$responsavel_filt = "";
						}
						
						$sql = mysql_query("SELECT * FROM cvp_cab 
						WHERE data_cad BETWEEN ('$filt1') AND ('$filt2') 
						$produto_filt
						$cod_rastreio_filt
						$responsavel_filt
						ORDER BY data_cad DESC ");

						//$cont = mysql_num_rows($sql);
						//****************  Fim Filtros **************************
						while($linha = mysql_fetch_array($sql)){
						?>
							<tr>
								<td>
								<? 	if ($filt_qualidade_exclui == true){?>
										<input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>">
										<a href="http://rasp.net.br/benassi/2.0/cvp.php?pg=cad_avaliacao&id=<? echo $linha['id']?>" ><button class="btn-u btn-u-dark-green"  type="button"><i class="fa fa-pencil"></i></button></a>
								<? 	}?>	
								</td>
								<td><? echo converte_data($linha['embalagem'])?></td>
								<td><? echo $linha['produto']?></td>
								<td><? echo converte_data($linha['embalagem'])?></td>
								<td><? echo converte_data($linha['validade'])?></td>
								<td><? echo $linha['cod_rastreio']?></td>
								<td><? echo $linha['responsavel']?></td>
								<td>
									<? if ($linha['aberto'] == true){
										echo "Aberto";
									}
									else{
										echo "Fechado";	
									}
									?>
								</td>
							</tr>
					<?	}?>
					</tbody>
				</table>
			</fieldset> 
			<fieldset>
					<div class="alert alert-warning fade in margin-bottom-40">
						<!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Botão para fechar o Alerta -->
						<button type="submit" class="btn btn-danger btn-sm rounded-2x fa fa-trash-o"></button>
					</div>
			</fieldset>
		</form>
	</div>
<? }?>
<!-- ********************************************************************************************************************* 
											 Fim Consulta 
************************************************************************************************************************-->
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
<script type="text/javascript" src="assets/js/forms/order.js"></script><!--Necessário para funcionar o calendário  -->
<script type="text/javascript" src="assets/js/forms/reg.js"></script>
<script type="text/javascript" src="assets/js/forms/login.js"></script>
<script type="text/javascript" src="assets/js/forms/contact.js"></script>
<script type="text/javascript" src="assets/js/forms/comment.js"></script>
<script type="text/javascript" src="assets/js/plugins/masking.js"></script>
<script type="text/javascript" src="assets/js/plugins/datepicker.js"></script>
<script type="text/javascript" src="assets/js/plugins/validation.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        RegForm.initRegForm();
        LoginForm.initLoginForm();
        ContactForm.initContactForm();
        CommentForm.initCommentForm();
		OrderForm.initOrderForm();        
        ReviewForm.initReviewForm();        
        CheckoutForm.initCheckoutForm(); 
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