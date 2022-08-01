<? session_start();
require ("include/verifica.php");
$title = "PIR - Planilha de Inspeção de Recebimento de Insumos";
$selected = 'selected="selected"';
require "classe/ComboBox.php";
require "classe/BuscaDados.php";
$combo_basico = new ComboBox();
$buscaDados = new BuscaDados();

$filtro_combo_loja = "AND id IN('1','17','13')";
?>
<!DOCTYPE html> 

<html lang="pt-br"> 
<head>
    <title><? echo $title;?></title>
	
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
			<h1 class="pull-left"><? echo $title;?></h1>
			<ul class="pull-right breadcrumb">		
				<? require_once('menu_subpagina.php'); ?>
			</ul>
		</div>
	</div>
<!--=== Fim Cabeçalho indivial ===-->   
<!-- ********************************************************************************************************************* 
											 Cadastro 
************************************************************************************************************************-->
<? if ($pg == "cad" and $filt_qualidade_inclui == true) {?>
	<div class="container content">
		<div class="panel panel-sea margin-bottom-12">
			<div class="panel-heading col-md-12">
				<span class="panel-title ">
					Cadastro
				</span>
			</div>
			<form action="include/pir.php?funcao=cad" method="post" id="sky-form" class="sky-form" enctype="multipart/form-data">
				<fieldset>      
					<div class="row">
						<div class="col col-2">
							<label>Data</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" autocomplete="off" name="data" id="date1" required value="<? if (!empty($_REQUEST['data'])){echo $_REQUEST['data'];}if (empty($_REQUEST['data'])){echo converte_data2($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" title="Data">
							</label>
						</div>	
						<div class="col col-5">
							<label>Empresa</label>
							<label class="select">
								<i class="icon-append fa fa-bars"></i>
								<select name="loja" size="1">
									<? 
									$combo_basico->comboLoja("id","loja",$_REQUEST['loja'],$filtro_combo_loja);
									?>
								</select> 
							</label>
						</div>	
						<div class="col col-5">
							<label>Produtos</label>
							<label class="input">
								<i class="icon-append fa fa-barcode"></i>
								<input type="text" name="produto" value="<? if (!empty($_REQUEST['produto'])){echo $_REQUEST['produto'];}?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Produtos" required>
								
							</label>
						</div>
					</div>
					<div class="row">
						<div class="col col-3">
							<label>Quantidade</label>
							<label class="input">
								<i class="icon-append fa fa-bars"></i>
								<input type="number" name="quantidade" value="<? if (!empty($_REQUEST['quantidade'])){echo $_REQUEST['quantidade'];}?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Quantidade">
								
							</label>
						</div>
						<div class="col col-6">
							<label>Fornecedor</label>
							<label class="input">
								<i class="icon-append fa fa-bars"></i>
								<input type="text" name="fornecedor" value="<? if (!empty($_REQUEST['fornecedor'])){echo $_REQUEST['fornecedor'];}?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Fornecedor" required>
								
							</label>
						</div>
						<div class="col col-3">
							<label>Lote</label>
							<label class="input">
								<i class="icon-append fa fa-barcode"></i>
								<input type="number" name="lote" value="<? if (!empty($_REQUEST['lote'])){echo $_REQUEST['lote'];}?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="lote">
							</label>
						</div>
					</div>
				</fieldset> 
				<fieldset>
					<div class="row">
						<div class="col col-3">
							<label>Resistência</label>
							<label class="select">
								<i class="icon-append fa fa-bars"></i>
								<select name="av_resistencia" size="1">
									<option value="1" <? if (!empty($_REQUEST['av_resistencia']) AND $_REQUEST['av_resistencia'] == true ){echo $selected;} ?>>
										C
									</option>
									<option value="0" <? if (!empty($_REQUEST['av_resistencia']) AND $_REQUEST['av_resistencia'] == false ){echo $selected;} ?>>
										N/C
									</option>
								</select> 
							</label>
						</div>	
						<div class="col col-3">
							<label>Coloração</label>
							<label class="select">
								<i class="icon-append fa fa-bars"></i>
								<select name="av_coloracao" size="1">
									<option value="1" <? if (!empty($_REQUEST['av_coloracao']) AND $_REQUEST['av_coloracao'] == true ){echo $selected;} ?>>
										C
									</option>
									<option value="0" <? if (!empty($_REQUEST['av_coloracao']) AND $_REQUEST['av_coloracao'] == false ){echo $selected;} ?>>
										N/C
									</option>
								</select> 
							</label>
						</div>	
						<div class="col col-3">
							<label>Higiene</label>
							<label class="select">
								<i class="icon-append fa fa-bars"></i>
								<select name="av_higiene" size="1">
									<option value="1" <? if (!empty($_REQUEST['av_higiene']) AND $_REQUEST['av_higiene'] == true ){echo $selected;} ?>>
										C
									</option>
									<option value="0" <? if (!empty($_REQUEST['av_higiene']) AND $_REQUEST['av_higiene'] == false ){echo $selected;} ?>>
										N/C
									</option>
								</select> 
							</label>
						</div>	
						<div class="col col-3">
							<label>Dizeres</label>
							<label class="select">
								<i class="icon-append fa fa-bars"></i>
								<select name="av_dizeres" size="1">									
									<option value="1" <? if (!empty($_REQUEST['av_dizeres']) AND $_REQUEST['av_dizeres'] == true ){echo $selected;} ?>>
										C
									</option>
									<option value="0" <? if (!empty($_REQUEST['av_dizeres']) AND $_REQUEST['av_dizeres'] == false ){echo $selected;} ?>>
										N/C
									</option>
								</select> 
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
											 Altera 
************************************************************************************************************************-->
<? if ($pg == "alt" and $filt_qualidade_inclui == true and isset($_GET['id'])) {?>
	<div class="container content">
		<div class="panel panel-sea margin-bottom-12">
			<div class="panel-heading col-md-12">
				<span class="panel-title ">
					Altera
				</span>
			</div>
			<?	//Consulta Item 
			if(isset($_GET['id'])){
				$id = $_GET['id'];
			}
			$sql = mysql_query("SELECT * FROM pir 
					WHERE id = $id
					LIMIT 1
					");
					//****************  Fim Filtros **************************
			while($linha = mysql_fetch_array($sql)){
			
			?>
				<form action="include/pir.php?funcao=alt&id=<?echo $linha['id']?>" method="post" id="sky-form" class="sky-form" enctype="multipart/form-data">
					<fieldset>      
						<div class="row">
							<div class="col col-2">
								<label>Data</label>
								<label class="input">
									<i class="icon-append fa fa-calendar"></i>
									<input type="text" autocomplete="off" name="data" id="date1" required value="<? echo converte_data2($linha['data'])?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" title="Data">
								</label>
							</div>	
							<div class="col col-5">
								<label>Empresa</label>
								<label class="select">
									<i class="icon-append fa fa-bars"></i>
									<select name="loja" size="1">
										<? 
										$combo_basico->comboLoja("id","loja",$linha['id_loja'],$filtro_combo_loja);
										?>
									</select> 
								</label>
							</div>	
							<div class="col col-5">
								<label>Produtos</label>
								<label class="input">
									<i class="icon-append fa fa-barcode"></i>
									<input type="text" name="produto" value="<? echo $linha['produto'] ?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Produtos" required>
									
								</label>
							</div>
						</div>
						<div class="row">
							<div class="col col-3">
								<label>Quantidade</label>
								<label class="input">
									<i class="icon-append fa fa-bars"></i>
									<input type="number" name="quantidade" value="<? echo $linha['quantidade']?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Quantidade">
									
								</label>
							</div>
							<div class="col col-6">
								<label>Fornecedor</label>
								<label class="input">
									<i class="icon-append fa fa-bars"></i>
									<input type="text" name="fornecedor" value="<? echo $linha['fornecedor']?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Fornecedor" required>
									
								</label>
							</div>
							<div class="col col-3">
								<label>Lote</label>
								<label class="input">
									<i class="icon-append fa fa-barcode"></i>
									<input type="number" name="lote" value="<? echo $linha['lote']?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="lote">
								</label>
							</div>
						</div>
					</fieldset> 
					<fieldset>
						<div class="row">
							<div class="col col-3">
								<label>Resistência</label>
								<label class="select">
									<i class="icon-append fa fa-bars"></i>
									<select name="av_resistencia" size="1">
										<option value="1" <? if ($linha['av_resistencia'] == 1 ){echo $selected;} ?>>
											C
										</option>
										<option value="0" <? if ($linha['av_resistencia'] == 0 ){echo $selected;} ?>>
											N/C
										</option>
									</select> 
								</label>
							</div>	
							<div class="col col-3">
								<label>Coloração</label>
								<label class="select">
									<i class="icon-append fa fa-bars"></i>
									<select name="av_coloracao" size="1">
										<option value="1" <? if ($linha['av_coloracao'] == 1 ){echo $selected;} ?>>
											C
										</option>
										<option value="0" <? if ($linha['av_coloracao'] == 0 ){echo $selected;} ?>>
											N/C
										</option>
									</select> 
								</label>
							</div>	
							<div class="col col-3">
								<label>Higiene</label>
								<label class="select">
									<i class="icon-append fa fa-bars"></i>
									<select name="av_higiene" size="1">
										<option value="1" <? if ($linha['av_higiene'] == 1 ){echo $selected;} ?>>
											C
										</option>
										<option value="0" <? if ($linha['av_higiene'] == 0 ){echo $selected;} ?>>
											N/C
										</option>
									</select> 
								</label>
							</div>	
							<div class="col col-3">
								<label>Dizeres</label>
								<label class="select">
									<i class="icon-append fa fa-bars"></i>
									<select name="av_dizeres" size="1">									
										<option value="1" <? if ($linha['av_dizeres'] == 1 ){echo $selected;} ?>>
											C
										</option>
										<option value="0" <? if ($linha['av_dizeres'] == 0 ){echo $selected;} ?>>
											N/C
										</option>
									</select> 
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
			<? }?>
		</div>
	</div>
<? }?>
<!-- ********************************************************************************************************************* 
											 Fim Altera 
************************************************************************************************************************-->
<!-- ********************************************************************************************************************* 
											 Consulta 
************************************************************************************************************************-->
<? if ($pg == "con" and $filt_fbl_consulta = "1") {//Consulta  
	
	?>
	<div class="container content">
		<form method="post" action="pir.php?pg=con" id="sky-form4" class="sky-form">
			<header>Consulta</header>            
			<fieldset>      
				<div class="row">
					<div class="col col-2">
						<label>Início</label>
						<label class="input">
							<i class="icon-append fa fa-calendar"></i>
							<input type="text" autocomplete="off" name="data1" id="start" required value="<? if (!empty($_REQUEST['data'])){echo $_REQUEST['data'];}if (empty($_REQUEST['data'])){echo converte_data2($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" title="Data">
						</label>
					</div>	
					<div class="col col-2">
						<label>Fim</label>
						<label class="input">
							<i class="icon-append fa fa-calendar"></i>
							<input type="text" autocomplete="off" name="data2" id="finish" required value="<? if (!empty($_REQUEST['data'])){echo $_REQUEST['data'];}if (empty($_REQUEST['data'])){echo converte_data2($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" title="Data">
						</label>
					</div>	
					<div class="col col-4">
						<label>Empresa</label>
						<label class="select">
							<i class="icon-append fa fa-bars"></i>
							<select name="loja" size="1">
								<? 
								$combo_basico->comboLoja("id","loja",$_REQUEST['loja'],$filtro_combo_loja);
								?>
							</select> 
						</label>
					</div>
					<div class="col col-4">
						<label>Produtos</label>
						<label class="input">
							<i class="icon-append fa fa-barcode"></i>
							<input type="text" name="produto" id="produto"  value="<? if (!empty($_REQUEST['produto'])){echo $_REQUEST['produto'];}?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Produtos">
							
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col col-4">
						<label>Fornecedor</label>
						<label class="input">
							<i class="icon-append fa fa-barcode"></i>
							<input type="text" name="fornecedor" value="<? if (!empty($_REQUEST['fornecedor'])){echo $_REQUEST['fornecedor'];}?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Fornecedor">
							
						</label>
					</div>
					<div class="col col-2">
						<label>Lote</label>
						<label class="input">
							<i class="icon-append fa fa-barcode"></i>
							<input type="number" name="lote" value="<? if (!empty($_REQUEST['lote'])){echo $_REQUEST['lote'];}?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="lote">
						</label>
					</div>
				</div>
			</fieldset> 
			<footer>
					<button type="submit" class="btn-u  icon  icon-magnifier"> Buscar </button>
            </footer>
		</form>
		<form method="post" action="include/pir.php?funcao=exclui" id="sky-form4" class="sky-form">
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
							<th class="col-md-1">EMPRESA</th>
							<th class="col-md-2">PRODUTO</th>
							<th class="col-md-1">LOTE</th>
							<th class="col-md-1">FORNECEDOR</th>
							<th class="col-md-1">RESISTÊNCIA</th>
							<th class="col-md-1">COLORAÇÃO</th>
							<th class="col-md-1">HIGIENE</th>
							<th class="col-md-1">DIZERES</th>
													
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
						if(!empty($_REQUEST['fornecedor'])){
							$fornecedor_filt = "AND fornecedor LIKE '%".$_REQUEST['fornecedor']."%'";
						}else{
							$fornecedor_filt = "";
						}
						if(!empty($_REQUEST['lote'])){
							$lote_filt = "AND lote LIKE '%".$_REQUEST['lote']."%'";
						}else{
							$lote_filt = "";
						}
						
						if(!empty($_REQUEST['loja'])){
							$loja_filt = "AND id_loja = '".$_REQUEST['loja']."'";
						}else{
							$loja_filt = "";
						}
						
						$sql = mysql_query("SELECT * FROM pir 
						WHERE data BETWEEN ('$filt1') AND ('$filt2') 
						$produto_filt
						$fornecedor_filt
						$lote_filt
						$loja_filt
						ORDER BY data DESC ");

						//$cont = mysql_num_rows($sql);
						//****************  Fim Filtros **************************
						while($linha = mysql_fetch_array($sql)){
							
						?>
							<tr>
								<td>
								<? 	if ($filt_qualidade_exclui == true){?>
										<ul class="list-inline badge-lists badge-icons margin-bottom-30">
											<li>
												<input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>">
											</li>
											<li>
												<a href="pir.php?pg=alt&id=<? echo $linha['id']?>"><i class="fa fa-pencil"></i></a>
											</li>
										</ul>
								<? 	}?>	
								</td>
								<td><? echo converte_data($linha['data'])?></td>
								<td><? echo $buscaDados->buscaNomeLoja($linha['id_loja'])?></td>
								<td><? echo utf8_encode($linha['produto'])?></td>
								<td><? echo $linha['lote']?></td>
								<td><? echo utf8_encode($linha['fornecedor'])?></td>
								<td><? 
									if($linha['av_resistencia'] == 1){
										echo '<span class="badge badge-green">C</span>';
									}
									if($linha['av_resistencia'] == 0){
										echo '<span class="badge badge-red">N/C</span>';
									}
									?>
								</td>
								<td>
									<? 
									if($linha['av_coloracao'] == 1){
										echo '<span class="badge badge-green">C</span>';
									}
									if($linha['av_coloracao'] == 0){
										echo '<span class="badge badge-red">N/C</span>';
									}
									?>
								</td>
								<td>
									<? 
									if($linha['av_higiene'] == 1){
										echo '<span class="badge badge-green">C</span>';
									}
									if($linha['av_higiene'] == 0){
										echo '<span class="badge badge-red">N/C</span>';
									}
									?>
								</td>
								<td>
									<? 
									if($linha['av_dizeres'] == 1){
										echo '<span class="badge badge-green">C</span>';
									}
									if($linha['av_dizeres'] == 0){
										echo '<span class="badge badge-red">N/C</span>';
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