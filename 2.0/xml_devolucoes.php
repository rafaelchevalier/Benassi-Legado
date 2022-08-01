<? session_start();
require ("include/verifica.php");
require ("include/funcoes_aux.php");
?>
<!DOCTYPE html> 
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Controles Interno Benassi</title>

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
	</div>
	<!--=== End Header ===-->
	<!-- Descrição página Conteudo -->
	<div class="breadcrumbs">
		<div class="container">
			<h1 class="pull-left">Devoluções Benassi</h1>
			<ul class="pull-right breadcrumb">			
			</ul>
		</div>
	</div>
<!--===== Fim Cabeçalho Conteudo =====-->
<!-- ********************************************************************************************************************* 
											 Cadastro 
************************************************************************************************************************-->
<? if ($pg == "cad") {//Cadastro ?>
	<div class="container content">
		<div class="panel panel-sea margin-bottom-12">
			<div class="panel-heading col-md-12">
				<span class="panel-title ">
					Cadastro
				</span>
			</div>
			<form action="include/tempcam.php?funcao=cad_tempcam" method="post" id="sky-form" class="sky-form" enctype="multipart/form-data">
				<fieldset> 
					<div class="row">
						<section class="col col-4">
							<label>Data</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="data" id="date" value="<? if (!empty($_REQUEST['data1'])){echo $_REQUEST['data1'];}if (empty($_REQUEST['data1'])){echo converte_data($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Chegada Carrinhos" title="Data Inicial">
							</label>
						</section>
						<section class="col col-4">
							<label>Nome Usuário</label>
							<label class="input">
								<i class="icon-append fa fa-asterisk"></i>
								<input type="text" name="nome" value="<? echo utf8_encode($nome_usuario_logado)?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" readonly="readonly" >
							</label>
						</section>
						<section class="col col-4">
							<label>Período</label>
							<label class="select ">
								<i class="icon-append fa fa-asterisk"></i>
								<select name="periodo" id="periodo">
									<option value="Manhã">Manhã</option>
									<option value="Tarde">Tarde</option>
									<option value="Noite">Noite</option>
								</select>
							</label>
						</section>
					</div>
				</fieldset>
				<fieldset> 
					<div class="row">
						<section class="col col-4">
							<label>Camara</label>
							<label class="select">
								<i class="icon-append fa fa-asterisk"></i>
								<select name="camara" id="camara">
									<?
									$sql_camara = mysql_query("SELECT *FROM cadcamaras ORDER BY nome ");
									$cont_camara = mysql_num_rows($sql_camara);
									while($linha_camara = mysql_fetch_array($sql_camara)){ 
									?>
										<option value="<? echo $linha_camara['id']?>"><? echo $linha_camara['nome']?></option>
									<? } ?>
								</select>
							</label>
						</section>
						<section class="col col-4">
							<label>Temperatura</label>
							<label class="input">
								<i class="icon-append fa fa-asterisk"></i>
								<input type="text" name="temperatura" onkeypress="autoTab(this, event); return event.keyCode != 13;" >
							</label>
						</section>
						<section class="col col-4">
							<label>Umidade</label>
							<label class="input">
								<i class="icon-append fa fa-asterisk"></i>
								<input type="text" name="umidade" onkeypress="autoTab(this, event); return event.keyCode != 13;" >
							</label>
						</section>
					</div>
				</fieldset>
				<fieldset> 
					<div class="row">
						<section >
							<label>Observação</label>
							<label class="textarea">
								<i class="icon-append fa fa-comment"></i>
								<textarea name="obs" cols="24" maxlength="450" ></textarea>
							</label>
						</section>
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
											 Altera 
************************************************************************************************************************-->
<?	if ($pg == "alt" /* and $filt_tempcam_consulta = "1" */) { ?>


	
<? }?>
<!-- ********************************************************************************************************************* 
											 Fim Altera 
************************************************************************************************************************-->
<!-- ********************************************************************************************************************* 
											 Consulta Itens NFE
************************************************************************************************************************-->
<? if ($pg == "con") {//Consulta 
require ("classe/combo.php");
$combo = new combo();
?>

	<div class="container content">
		<form method="post" action="xml_devolucoes.php?pg=con" id="sky-form4" class="sky-form">
			<header>Filtros </header>            
			<fieldset>      
				<section>
					<div class="row">
						<div class="col col-6">
							<label>Início</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="data1" id="start" value="<? if (!empty($_REQUEST['data1'])){echo $_REQUEST['data1'];}if (empty($_REQUEST['data1'])){echo converte_data($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Chegada Carrinhos" title="Data Inicial">
							</label>
						</div>	
						<div class="col col-6">
							<label>Fim</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="data2" id="finish"  value="<? if (!empty($_REQUEST['data2'])){echo $_REQUEST['data2'];}if (empty($_REQUEST['data2'])){echo converte_data($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Chegada Carrinhos" title="Data Final">
							</label>
						</div>
					</div>
				</section> 
			</fieldset> 
			<fieldset>      
				<section>
					<div class="row">
						<div class="col col-6">
							<label>Remetente</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="razao_emitente" size="1">
									<option value="" selected="selected">Todos</option>
									<? 
									$combo->ComboXmlDevolucoesCnpjRemetente($razao_emitente);
									if(empty($_REQUEST['razao_emitente']))
										$razao_emitente = "";
									if(!empty($_REQUEST['razao_emitente']))
										$razao_emitente = $_REQUEST['razao_emitente'];
									?>
								</select>
							</label>
						</div>
						<div class="col col-6">
							<label>Destinatario</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="razao_destinatario" size="1">
									<option value="" selected="selected">Todos</option>
									<? 
									$combo->ComboXmlDevolucoesCnpjDestinatario($razao_destinatario);
									if(empty($_REQUEST['razao_destinatario']))
										$razao_destinatario = "";
									if(!empty($_REQUEST['razao_destinatario']))
										$razao_destinatario = $_REQUEST['razao_destinatario'];
									?>
								</select>
							</label>
						</div>						
					</div>
				</section> 
			</fieldset> 
			<fieldset>      
				<section>
					<div class="row">
						<div class="col col-2">
							<label>Num. NFE</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="num_nfe" value="<? if (!empty($_REQUEST['num_nfe'])){echo $_REQUEST['num_nfe'];}?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Numero NFE">
							</label>
						</div>
						<div class="col col-2">
							<label>Serie. NFE</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="serie_nfe" value="<? if (!empty($_REQUEST['serie_nfe'])){echo $_REQUEST['serie_nfe'];}?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Serie NFE">
							</label>
						</div>	
						<div class="col col-2">
							<label>Inf. Adicional Pro.</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="inf_adicional_prod" size="1">
									<option value="" selected="selected">Todas</option>
									<? 
									$combo->ComboXmlDevolucoesInfAdcional($_REQUEST['inf_adicional_prod']);
									?>
								</select>
							</label>
						</div>	
						<div class="col col-6">
							<label>Chave de acesso</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="chave_nfe" value="<? if (!empty($_REQUEST['chave_nfe'])){echo $_REQUEST['chave_nfe'];}?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Numero NFE">
							</label>
						</div>
					</div>
				</section> 
			</fieldset> 
			<footer>
					<button type="submit" class="btn-u  icon  icon-magnifier"> Buscar </button>
            </footer>
		</form>
		<form method="post" action="include/xml_devolucoes.php?funcao=exclui_varios" id="sky-form4" class="sky-form">
			<fieldset>
				<div class="panel panel-sea margin-bottom-40">
					<div class="panel-heading col-md-12">
						<button class="btn btn-warning btn-sm rounded-2x" onClick="history.go(0)">
								<i class="fa fa-refresh" title="ATUALIZA lISTA"></i>
						</button>		
						<button type="submit" class="btn btn-danger btn-sm rounded-2x fa fa-trash-o"></button>
					</div>
				</div>
			</fieldset>
			<fieldset>  
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th class="col-md-1">OPÇÕES</th>
							<th class="col-md-1">DATA EMISSÃO</th>
							<th class="col-md-1">NUM. NFE</th>
							<th class="col-md-2">RAZÃO</th>
							<th class="col-md-1">COD. PROD</th>
							<th class="col-md-1">PRODUTO</th>
							<th class="col-md-1">QUANTIDADE</th>
							<th class="col-md-1">CUSTO</th>
							<th class="col-md-3">MOTIVO</th>							
						</tr>
						<tr>
							<th colspan="1">Filtros: </th>	
							<th colspan="8" ><?
								if(!empty($_REQUEST['num_nfe'])){
									echo "NFE: ".$_REQUEST['num_nfe']."<br />";		
								}
									
								if(!empty($_REQUEST['serie_nfe']))
									echo "Serie: ".$_REQUEST['serie_nfe']."<br />";
								
								if(!empty($_REQUEST['num_nfe'])){
									echo "Inf. Adicional: ".$_REQUEST['inf_adicional_prod']."<br />";
								}
																	
								if(!empty($_REQUEST['chave_nfe'])){
									echo "Chave: ".$_REQUEST['chave_nfe']."<br />";
								}
																	
								if(!empty($_REQUEST['razao_emitente'])){
									echo "Remetente: ".$linha['razao_emitente']."<br />";
								}
								
								if(!empty($_REQUEST['razao_destinatario'])){
									echo "Destinatário: ".$linha['razao_destinatario']."<br />";
								}
								?></th>
						</tr>
					</thead>
					<tbody>
						<?	
						//****************  Inicio Filtros **************************				
						//Filtro de consulta a tabela tampcam   razao_emitente
						$filt1 = converte_data($_REQUEST['data1']);
						$filt2 = converte_data($_REQUEST['data2']);
						//Filtra NFE
						if (empty($_REQUEST['num_nfe']))
							$num_nfe_filt = "";
						if (!empty($_REQUEST['num_nfe']))
						$num_nfe_filt = " AND num_nfe = '".$_REQUEST['num_nfe']."' ";
						//Filtra informações adicionais 
						if (empty($_REQUEST['inf_adicional_prod']))
							$num_nfe_filt = "";
						if (!empty($_REQUEST['inf_adicional_prod']))
						$num_inf_adicional_prod = " AND inf_adicional_prod = '".$_REQUEST['inf_adicional_prod']."' ";
						//Filtra Serie de NFE
						if (empty($_REQUEST['serie_nfe']))
							$num_nfe_filt = "";
						if (!empty($_REQUEST['serie_nfe']))
						$num_serie_filt = " AND serie_nfe = '".$_REQUEST['serie_nfe']."' ";
						//Filtra pela Chave da FNE
						if (empty($_REQUEST['chave_nfe']))
							$chave_nfe_filt = "";
						if (!empty($_REQUEST['chave_nfe']))
						$chave_nfe_filt = " AND chave = '".$_REQUEST['chave_nfe']."' ";
						//Filtra pela Razao Emitente
						if (empty($_REQUEST['razao_emitente']))
							$razao_emitente_filt = "";
						if (!empty($_REQUEST['razao_emitente']))
							$razao_emitente_filt = " AND cnpj_emitente = '".$_REQUEST['razao_emitente']."' ";
						//Filtra pela Razao Destinatario
						if (empty($_REQUEST['razao_destinatario']))
							$razao_destinatario_filt = "";
						if (!empty($_REQUEST['razao_destinatario']))
							$razao_destinatario_filt = " AND cnpj_destinatario = '".$_REQUEST['razao_destinatario']."' ";
						
						$sql = mysql_query("
							SELECT * FROM xml_devolucoes 
							WHERE 
								data_emissao BETWEEN ('$filt1') AND ('$filt2')  
								$num_nfe_filt
								$num_inf_adicional_prod
								$num_serie_filt
								$chave_nfe_filt
								$razao_emitente_filt
								$razao_destinatario_filt
							ORDER BY data_emissao DESC  ");
						
						
						//$cont = mysql_num_rows($sql);
						//****************  Fim Filtros **************************
						$contagem_qtd = 0;
						while($linha = $combo->listar($sql)){
						$contagem_qtd ++;
						?>
							<tr>
								<td>
									<? if ($filt_tempcam_exclui == 1){?>
										<label class="checkbox state-success">
											<input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>"><i></i>
										</label>
									<? }?>							
								</td>
								<td><? echo converte_data($linha['data_emissao']); ?></td>
								<td><? echo $linha['num_nfe']."-".$linha['serie_nfe']; ?></td>
								<td><? echo $linha['razao_emitente']; ?></td>
								<td><? echo utf8_encode($linha['cod_prod']) ?></td>
								<td><? echo utf8_encode($linha['descricao_prod']) ?></td>
								<td><? echo number_format($linha['quantidade_prod'], 2) ?></td>
								<td><? echo "R$".number_format($linha['valor_unit_prod'], 2) ?></td>
								<td><? echo utf8_encode($linha['inf_adicional_prod']) ?></td>
							</tr>
						<? }?>
					</tbody>
				</table>
			</fieldset> 
			<fieldset>
				<div class="panel panel-sea margin-bottom-40">
					<div class="panel-heading col-md-12">
						<button type="submit" class="btn btn-danger btn-sm rounded-2x fa fa-trash-o"></button>
						<label><? echo "Total de produtos: ". $contagem_qtd;?></label>		
					</div>
				</div>
			</fieldset>
		</form>
	</div>
<? }?>
<!-- ********************************************************************************************************************* 
											 Fim Consulta Itens NFE
************************************************************************************************************************-->
<!-- ********************************************************************************************************************* 
											 Consulta NFE Cab
************************************************************************************************************************-->
<? if ($pg == "conNfe") {//Consulta 
require ("classe/combo.php");
$combo = new combo();
?>

	<div class="container content">
		<form method="post" action="xml_devolucoes.php?pg=conNfe" id="sky-form4" class="sky-form">
			<header>Filtros </header>            
			<fieldset>      
				<section>
					<div class="row">
						<div class="col col-6">
							<label>Início</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="data1" id="start" value="<? if (!empty($_REQUEST['data1'])){echo $_REQUEST['data1'];}if (empty($_REQUEST['data1'])){echo converte_data($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Chegada Carrinhos" title="Data Inicial">
							</label>
						</div>	
						<div class="col col-6">
							<label>Fim</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="data2" id="finish"  value="<? if (!empty($_REQUEST['data2'])){echo $_REQUEST['data2'];}if (empty($_REQUEST['data2'])){echo converte_data($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Chegada Carrinhos" title="Data Final">
							</label>
						</div>
					</div>
				</section> 
			</fieldset> 
			<fieldset>      
				<section>
					<div class="row">
						<div class="col col-2">
							<label>Num. NFE</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<?	$combo->combo(); ?>
							</label>
						</div>
						<div class="col col-2">
							<label>Serie. NFE</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<? $combo->ComboXmlDevolucoesSerieNfe();?>
							</label>
						</div>	
						<div class="col col-2">
							<label>Inf. Adicional Pro.</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<? $combo->ComboXmlDevolucoesInfAdcional();?>
							</label>
						</div>							
					</div>
				</section> 
			</fieldset> 
			<footer>
					<button type="submit" class="btn-u  icon  icon-magnifier"> Buscar </button>
            </footer>
		</form>
		<form method="post" action="include/xml_devolucoes.php?funcao=exclui_varios" id="sky-form4" class="sky-form">
			<fieldset>
				<div class="panel panel-sea margin-bottom-40">
					<div class="panel-heading col-md-12">
						<button class="btn btn-warning btn-sm rounded-2x" onClick="history.go(0)">
								<i class="fa fa-refresh" title="ATUALIZA lISTA"></i>
						</button>		
						<button type="submit" class="btn btn-danger btn-sm rounded-2x fa fa-trash-o"></button>
					</div>
				</div>
			</fieldset>
			<fieldset>  
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th class="col-md-1">OPÇÕES</th>
							<th class="col-md-1">DATA EMISSÃO</th>
							<th class="col-md-1">NUM. NFE</th>
							<th class="col-md-2">RAZÃO</th>
							<th class="col-md-1">COD. PROD</th>
							<th class="col-md-1">PRODUTO</th>
							<th class="col-md-1">QUANTIDADE</th>
							<th class="col-md-1">CUSTO</th>
							<th class="col-md-3">MOTIVO</th>							
						</tr>
					</thead>
					<tbody>
						<?	
						//****************  Inicio Filtros **************************				
						require"include/conexao.php";
						//Filtro de consulta a tabela tampcam 
						$filt1 = converte_data($_REQUEST['data1']);
						$filt2 = converte_data($_REQUEST['data2']);
						$num_nfe_filt = $_REQUEST['num_nfe'];
						$sql = mysql_query("SELECT * FROM xml_devolucoes 
							ORDER by data_emissao ");
						if ($num_nfe_filt != "0"){
							$sql = mysql_query("SELECT * FROM xml_devolucoes WHERE data_emissao BETWEEN ('$filt1') AND ('$filt2')  $num_nfe_filt  ORDER BY data_emissao DESC  ");
						}
						
						$cont = mysql_num_rows($sql);
						//****************  Fim Filtros **************************
						$contagem_qtd = 0;
						while($linha = mysql_fetch_array($sql)){
						$contagem_qtd ++;
						?>
							<tr>
								<td>
									<? if ($filt_tempcam_exclui == 1){?>
										<label class="checkbox state-success">
											<input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>"><i></i>
										</label>
									<? }?>							
								</td>
								<td><? echo converte_data($linha['data_emissao']); ?></td>
								<td><? echo utf8_encode($linha['num_nfe']); ?></td>
								<td><? echo $linha['razao_emitente']; ?></td>
								<td><? echo utf8_encode($linha['cod_prod']) ?></td>
								<td><? echo utf8_encode($linha['descricao_prod']) ?></td>
								<td><? echo number_format($linha['quantidade_prod'], 2) ?></td>
								<td><? echo "R$".number_format($linha['valor_unit_prod'], 2) ?></td>
								<td><? echo utf8_encode($linha['inf_adicional_prod']) ?></td>
							</tr>
						<? }?>
					</tbody>
				</table>
			</fieldset> 
			<fieldset>
				<div class="panel panel-sea margin-bottom-40">
					<div class="panel-heading col-md-12">
						<button type="submit" class="btn btn-danger btn-sm rounded-2x fa fa-trash-o"></button>
						<label><? echo "Total de produtos: ". $contagem_qtd;?></label>		
					</div>
				</div>
			</fieldset>
		</form>
	</div>
<? }?>
<!-- ********************************************************************************************************************* 
											 Fim Consulta NFE CAB
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
<script type="text/javascript" src="assets/js/forms/order.js"></script>
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
		Datepicker.initDatepicker();
        });
</script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
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