<? session_start();
require ("include/verifica.php");
?>
<!DOCTYPE html> 
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Temperatura Camaras</title>

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
			<h1 class="pull-left">Temperatura de Câmaras Frigoríficas</h1>
			<ul class="pull-right breadcrumb">	
				<? require_once('menu_subpagina.php'); ?>
			</ul>
		</div>
	</div>
<!--===== Fim Cabeçalho Conteudo =====-->
<!-- ********************************************************************************************************************* 
											 Cadastro 
************************************************************************************************************************-->
<? if ($pg == "cad" /* and $filt_tempcam_inclui == "1" */) {//Cadastro Temperatura Camaras?>
	<div class="container content">
		<div class="panel panel-sea margin-bottom-12">
			<div class="panel-heading col-md-12">
				<span class="panel-title ">
					Cadastro Temperatura
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
<?	if ($pg == "consulta_tempcam" /* and $filt_tempcam_consulta = "1" */) { ?>


	
<? }?>
<!-- ********************************************************************************************************************* 
											 Fim Altera 
************************************************************************************************************************-->
<!-- ********************************************************************************************************************* 
											 Consulta 
************************************************************************************************************************-->
<? if ($pg == "con" /* and $filt_tempcam_consulta = "1" */) {//Consulta Temperatura Camaras ?>

	<div class="container content">
		<form method="post" action="tempcam.php?pg=con" id="sky-form4" class="sky-form">
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
						<div class="">
							<label>Camaras</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="camara" size="1">
									<option value="" selected="selected">Todas</option>
									<? // Consulta para buscar os tipos únicos de camaras lançadas no sistema. 
									$sql_filtro = mysql_query("SELECT DISTINCT camara FROM tempcam ORDER BY camara ");
									$cont_filtro = mysql_num_rows($sql_filtro);
									while($linha_filtro = mysql_fetch_array($sql_filtro)){ ?>
										<? if ($linha_filtro['camara'] != ""){?>
										<option value="<? echo "AND camara = '".$linha_filtro['camara']."'" ?>" multiple <? if( $_REQUEST['camara'] == $linha_filtro['camara'] ){?> selected="selected" <? }?> ><? echo utf8_encode($linha_filtro['camara']) ?></option>
										<? }
									}?>
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
		<form method="post" action="include/tempcam.php?funcao=exclui_varios" id="sky-form4" class="sky-form">
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
				<table class="table table-hover table-striped" id="myTable">
					<thead>
						<tr>
							<th class="col-md-1">OPÇÕES</th>
							<th class="col-md-2">DATA MEDIÇÃO</th>
							<th class="col-md-1">PERÍODO</th>
							<th class="col-md-2">USUÁRIO</th>
							<th class="col-md-2">CAMARA</th>
							<th class="col-md-1">TEMPERATURA</th>
							<th class="col-md-1">UMIDADE</th>
							<th class="col-md-2">OBS</th>							
						</tr>
					</thead>
					<tbody>
						<?	
						//****************  Inicio Filtros **************************				
						require"include/conexao.php";
						//Filtro de consulta a tabela tampcam 
						$filt1 = converte_data($_REQUEST['data1']);
						$filt2 = converte_data($_REQUEST['data2']);
						$camara_filt = $_REQUEST['camara'];
						$sql = mysql_query("SELECT * FROM cad_tipo_patrimonio 
							ORDER by nome ");
						if ($camara_filt != "0"){
							$sql = mysql_query("SELECT * FROM tempcam WHERE data_medicao BETWEEN ('$filt1') AND ('$filt2')  $camara_filt  ORDER BY data_medicao DESC  ");
						}
						
						$cont = mysql_num_rows($sql);
						//****************  Fim Filtros **************************
						$contagem_qtd = 0;
						while($linha = mysql_fetch_array($sql)){
						$contagem_qtd ++;
						?>
							<tr>
								<td>
									<? /*if ($filt_tempcam_altera == 1){ ?>
										<label class="checkbox state-success">
										<a href="tempcam.php?pg=altera_tempcam&id=<? echo $linha['id'] ?>">
											<button class="btn btn-warning btn-sm rounded-2x icon icon-magnifier"></button>
										</a>
									<? } */?>
									<? if ($filt_tempcam_exclui == 1){?>
										
										<input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>"><i></i>
										
									<? }?>							
								</td>
								<td><? echo converte_data($linha['data_medicao'])." / ".$linha['hora_medicao']; ?></td>
								<td><? echo utf8_encode($linha['periodo']); ?></td>
								<td><? echo $linha['nome_usuario'] ?></td>
								<td><? echo utf8_encode($linha['camara']) ?></td>
								<td><? echo utf8_encode($linha['temperatura']) ?></td>
								<td><? echo utf8_encode($linha['umidade']) ?></td>
								<td><? echo utf8_encode($linha['obs']) ?></td>
							</tr>
						<? }?>
					</tbody>
				</table>
			</fieldset> 
			<fieldset>
				<div class="panel panel-sea margin-bottom-40">
					<div class="panel-heading col-md-12">
						<button type="submit" class="btn btn-danger btn-sm rounded-2x fa fa-trash-o"></button>
						<label><? echo "Total de Medições: ". $contagem_qtd;?></label>		
					</div>
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
<!-- Inicio data table -
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<!-- Fim data table 
<script type="text/javascript">
//Data Table	
	$(document).ready( function () {
		$('#myTable').DataTable({
			stateSave: true,
			dom: 'Bfrtip',
			buttons: [
				'csv', 'excel', 'pdf', 'print'
			]
		});
		
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