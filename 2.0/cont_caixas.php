<? session_start();
require ("include/verifica.php");
require ("include/funcoes.php");
require ("include/funcoes_aux.php");
?>
<!DOCTYPE html> 
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Benassi Outros Controles - Caixas Plasticas</title>

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
	
	<!-- JS Customization -->
	<script type="text/javascript" src="js/verificaStatus.js"></script>
	<?require "js/verificaStatus.js"; ?>
	
	
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
			<h1 class="pull-left">Contagem Caixas Plásticas</h1>
			<ul class="pull-right breadcrumb">	
				<li><a href="?pg=cad">Cadastro</a></li>
				<li><a href="?pg=con">Consulta</a></li>
			</ul>
		</div>
	</div>
<!--===== Fim Cabeçalho Conteudo =====-->
<!-- ********************************************************************************************************************* 
											 Cadastro 
************************************************************************************************************************-->
<? if ($pg == "cad") {//Cadastro Temperatura Camaras ?>
	<div class="container content">
		<div class="panel panel-sea margin-bottom-12">
			<div class="panel-heading col-md-12">
				<span class="panel-title ">
					Selecione uma rede para lançamento
				</span>
			</div>
			<form action="?pg=cad2" method="post" id="sky-form" class="sky-form" enctype="multipart/form-data">
				<fieldset> 
					<div class="row">
						<section class="col col-4">
							<label>Data</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="data" id="date" value="<? if (!empty($_REQUEST['data'])){echo $_REQUEST['data'];}if (empty($_REQUEST['data'])){echo converte_data($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Chegada Carrinhos" title="Data Inicial">
							</label>
						</section>
						<section class="col col-4">
							<label>Tipo De Caixa</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="cod_caixa" size="1">
									<!-- <option value="" selected="selected">Tipo de caixa</option> -->
									<? // Consulta para buscar os tipos únicos de camaras lançadas no sistema. 
										$sql_filtro = mysql_query("SELECT * FROM caixas ORDER BY cod DESC LIMIT 1000 ");
										$cont_filtro = mysql_num_rows($sql_filtro);
										while($linha_filtro = mysql_fetch_array($sql_filtro)){ ?>
											<? if ($linha_filtro['cod'] != ""){?>
												<option value="<? echo utf8_decode($linha_filtro['cod']) ?>" multiple ><? echo $linha_filtro['cod']." - ".utf8_encode($linha_filtro['descricao']) ?></option>
											<? }
										}?>
								</select>
							</label>
						</section>
						<section class="col col-4">
							<label>Rede</label>
							<label class="select">
								<select name="cod_rede" size="1" >
									<!-- <option value="" selected="selected">Todas</option>-->
									<? // Consulta para buscar os tipos únicos de camaras lançadas no sistema. 
										$sql_filtro = mysql_query("SELECT DISTINCT razao_social,cod FROM mercado WHERE cont_caixa = 1  AND ativo = 1  ORDER BY cod ");
										$cont_filtro = mysql_num_rows($sql_filtro);
										while($linha_filtro = mysql_fetch_array($sql_filtro)){ ?>
											<? if ($linha_filtro['cod'] != ""){?>
												<option value="<? echo utf8_decode($linha_filtro['cod']) ?>" multiple ><? echo $linha_filtro['cod']." - ".utf8_encode($linha_filtro['razao_social']) ?></option>
											<? }
										}?>
								</select>
							</label>
						</section>						
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
<? 	
if ($pg == "cad2" and empty($_POST['cod_rede'])){
		echo"
			<META HTTP-EQUIV=REFRESH content='0; URL=cont_caixas.php?pg=cad'>
			<script type=\"text/javascript\">	
			alert(\" Rede de Clientes não selecionado! Favor escolher uma rede para carregar os dados.\");
			</script>
		";
	}
if ($pg == "cad2" and !empty($_POST['cod_rede'])) {//Cadastro Temperatura Camaras
?>
		<div class="panel panel-sea margin-bottom-12">
			<div class="panel-heading col-md-12">
				<span class="panel-title ">
					Contagem de caixas plásticas
				</span>
			</div>
			<form action="include/cont_caixas.php?funcao=cad&qt=<? echo $qt;?>" method="post" id="sky-form" class="sky-form" enctype="multipart/form-data">
				<fieldset> 
					<div class="row">
						<section class="col col-6">
							<label>Data</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="data" readonly="readonly" value="<? if (!empty($_POST['data'])){echo $_POST['data'];}if (empty($_POST['data'])){echo "Data não informada";}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Chegada Carrinhos" title="Data Inicial">
							</label>
						</section>
						<section class="col col-6">
							<label>Nome Usuário</label>
							<label class="input">
								<i class="icon-append fa fa-asterisk"></i>
								<input type="text" name="usuario" value="<? echo utf8_encode($nome_usuario_logado)?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" readonly="readonly" >
							</label>
						</section>
					</div>
				</fieldset>
				<?
				require"include/conexao.php";
				$sql = mysql_query("SELECT * FROM mercado WHERE cod = $cod_rede AND cont_caixa = 1 AND ativo = 1 ORDER BY nome_fantasia LIMIT 500  ");
				$cont = mysql_num_rows($sql);
				$i = 0;
				while($linha = mysql_fetch_array($sql)){
					if(bloqueia_lancamento_no_mesmo_dia_cont_caixa($linha['id'],$_POST['data'],$_POST['cod_caixa']) > 0){
						$cont --;
						if($cont == 0){
							?>
							<fieldset>
								<div class="alert alert-danger fade in">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4>Todas as Filias já foram lançadas.</h4>
									<p>
										<a class="btn-u btn-u-red" href="cont_caixas.php?pg=cad">Voltar</a>
										<a class="btn-u btn-u-red" href="cont_caixas.php?pg=con">Consultar Lançamentos</a>
									</p>
								</div>
							</fieldset>
							<?
						}
						continue;
					}
				?>
					<fieldset> 
						<div class="row">
							<section class="col col-3">
								<label class="input">
									<i class="icon-append fa fa-asterisk"></i>
									<input type="hidden" name="id_mercado<?echo $i?>" value="<?echo $linha['id']?>">
									<input type="hidden" name="cod_mercado<?echo $i?>" value="<?echo $linha['cod']?>">
									<input type="hidden" name="filial_mercado<?echo $i?>" value="<?echo $linha['filial']?>">
									<input type="hidden" name="fantasia_mercado<?echo $i?>" value="<?echo $linha['nome_fantasia']?>">
									<input type="text" 	 name="razao_mercado<?echo $i?>" value="<?echo $linha['nome_fantasia']?>" readonly  onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Filial" >
								</label>
							</section>
							<section class="col col-2">
								<label class="select">
									<i class="icon-append fa fa-calendar"></i>
									<select name="caixa<?echo $i?>" size="1">
										<!-- <option value="" selected="selected">Tipo de caixa</option> -->
										<? // Consulta para buscar os tipos únicos de camaras lançadas no sistema. 
											$sql_filtro = mysql_query("SELECT * FROM caixas ORDER BY cod LIMIT 1000 ");
											$cont_filtro = mysql_num_rows($sql_filtro);
											while($linha_filtro = mysql_fetch_array($sql_filtro)){ ?>
												<? if ($linha_filtro['cod'] != ""){?>
													<option value="<? echo $linha_filtro['cod'] ?>" multiple <? if($_POST['cod_caixa'] == $linha_filtro['cod']){?>selected="selected"<?};?> ><? echo $linha_filtro['cod']." - ".utf8_encode($linha_filtro['descricao']) ?></option>
												<? }
											}?>
									</select>
								</label>
							</section>
							<section class="col col-1">
								<label class="input">
									<!-- <i class="icon-append fa fa-asterisk"></i> -->
									<input type="number" name="saldo_oficial<?echo $i?>" value="<? echo busca_ultimo_lancamento_cont_caixa($linha['id'],$_POST['cod_caixa']);?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Saldo Real">
									<!-- <input type="number" name="saldo_oficial<?echo $i?>" value="<? echo busca_ultimo_lancamento_cont_caixa($linha['id']);?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Saldo Real">-->
								</label>
							</section>
							<section class="col col-2">
								<label class="input">
									<!-- <i class="icon-append fa fa-asterisk"></i> -->
									<input type="number" name="recebido<?echo $i?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Recebido">
								</label>
							</section>
							<section class="col col-2">
								<label class="input">
									<!-- <i class="icon-append fa fa-asterisk"></i> -->
									<input type="number" name="enviado<?echo $i?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Enviado">
								</label>
							</section>
							<section class="col col-2">
								<label class="input">
									<input type="number" name="contagem<?echo $i?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Contagem">
								</label>
							</section>
						</div>
					</fieldset>
					<? $i ++;?>
				<? }//Fim while($linha = mysql_fetch_array($sql))?>
				<input type="hidden" name="qt" value="<?echo $i; ?>"><!-- Resultado total do Somatório de linhas  -->
				<footer> 
					<button type="button" class="btn-u btn-u-default rounded-2x" onclick="window.history.back();">
						<i class="fa fa-reply"> Voltar</i>
					</button>
					<button type="submit" class="btn-u btn-u-green rounded-2x">
						<i class="icon-pencil"> Cadastrar</i>
					</button>
                </footer>
			</form>
		</div>
<? }//Fim if ($pg == "cad2" and !empty($_POST['cod_rede']))?>
<!-- ********************************************************************************************************************* 
											 Fim Cadastro 
************************************************************************************************************************-->
<!-- ********************************************************************************************************************* 
											 Altera 
************************************************************************************************************************-->

<!-- ********************************************************************************************************************* 
											 Fim Altera 
************************************************************************************************************************-->
<!-- ********************************************************************************************************************* 
											 Consulta 
************************************************************************************************************************-->
<? if ($pg == "con") {//Consulta Temperatura Camaras 
?>
	<div class="container content">
		<form method="post" action="cont_caixas.php?pg=con" id="sky-form4" class="sky-form">
			<header>Filtros</header>            
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
						<div class="col col-3">
							<label>Tipo de Caixa</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="caixa" size="1">
									<option value="" selected="selected">Todas</option>
									<? // Tipos de caixas Plasticas
										$sql_filtro = mysql_query("SELECT * FROM caixas ORDER BY cod ");
										$cont_filtro = mysql_num_rows($sql_filtro);
										while($linha_filtro = mysql_fetch_array($sql_filtro)){ ?>
											<? if ($linha_filtro['cod'] != ""){?>
												<option value="<? echo utf8_decode($linha_filtro['cod']) ?>"  <? if($_POST['caixa'] == $linha_filtro['cod']){echo 'selected="selected"';}?>  multiple ><? echo $linha_filtro['cod']." - ".utf8_encode($linha_filtro['descricao']) ?></option>
											<? }
										}?>
								</select>
							</label>
						</div>
						<div class="col col-3">
							<label>Situação Contagem</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="situacao" size="1">
									<option value="" selected="selected">Todas</option>
									<option value="errada" <? if($_POST['situacao'] == errada){echo 'selected="selected"';}?> >Errada</option>
									<option value="errada_acima" <? if($_POST['situacao'] == errada_acima){echo 'selected="selected"';}?> >Errada Acima</option>
									<option value="errada_abaixo" <? if($_POST['situacao'] == errada_abaixo){echo 'selected="selected"';}?> >Errada Abaixo</option>
									<option value="correta" <? if($_POST['situacao'] == correta){echo 'selected="selected"';}?> >Correta</option>
								</select>
							</label>
						</div>							
						<div class="col col-6">
							<label>Mercado</label>
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="fantasia_mercado" <? if(!empty($_POST['fantasia_mercado'])){echo "value='".$_POST['fantasia_mercado']."'";}?> placeholder="Digite nome fantasia do mercado que deseja buscar" title="Busca Mercado">
							</label>
						</div>	
					</div>
				</section> 
			</fieldset> 
			<footer>
					<button type="submit" class="btn-u  icon  icon-magnifier">Buscar</button>
            </footer>
		</form>
		<form method="post" action="include/cont_caixas.php?funcao=exclui_varios" id="sky-form4" class="sky-form">
			<fieldset>
				<div class="panel panel-sea margin-bottom-40">
					<div class="panel-heading col-md-12">
						<div class="col-md-1">
							<label class="checkbox state-success">
								<input type="checkbox" name='tudo' onclick='verificaStatus(this)'><i></i>
							</label>
						</div>
						<div class="col-md-10">
							<button class="btn btn-warning btn-sm rounded-2x" onClick="history.go(0)">
									<i class="fa fa-refresh" title="ATUALIZA lISTA"></i>
							</button>
							<button type="submit" class="btn btn-danger btn-sm rounded-2x fa fa-trash-o"></button>
						</div>
					</div>
				</div>
			</fieldset>
			<fieldset>  
				<table class="table table-hover table-striped">
					<thead>
						
						<tr>
							<th class="col-md-1">OPÇÕES</th>
							<th class="col-md-1">DATA CAD</th>
							<th class="col-md-2">TIPO DE CAIXA</th>
							<th class="col-md-4">MERCADO</th>
							<th class="col-md-1">OFICIAL</th>
							<th class="col-md-1">RECEBIDO</th>
							<th class="col-md-1">ENVIADO</th>
							<th class="col-md-1">CONTAGEM</th>
						</tr>
					</thead>
					<tbody>
						<?
						$data_atual = date("d/m/Y");
						  require"include/conexao.php";
						//****************  Inicio Filtros **************************
						//Filtro de consulta a tabela FBL 
						if(!empty($_REQUEST['data1'])){
							$filt1 = converte_data($_REQUEST['data1']);
						}
						if(empty($_REQUEST['data1'])){
							$filt1 = converte_data($data_atual);
						}
						if(!empty($_REQUEST['data2'])){
							$filt2 = converte_data($_REQUEST['data2']);
						}
						if(empty($_REQUEST['data2'])){
							$filt2 = converte_data($data_atual);
						}
						if(!empty($_REQUEST['fantasia_mercado'])){
							$fantasia_mercado_filt = "AND fantasia_mercado LIKE '%".$_REQUEST['fantasia_mercado']."%'";
						}
						if(empty($_POST['caixa'])){
							$tipo_caixa_filt = "";
						}
						if(!empty($_POST['caixa'])){
							$tipo_caixa_filt = "AND cod_caixa = '".$_POST['caixa']."'";
						}
						$contagem_qtd =0;
						$cont_conforme =0;
						$cont_nao_conforme =0;
						$sql = mysql_query("SELECT * FROM cont_caixas 
						WHERE data_cad BETWEEN ('$filt1') AND ('$filt2') 
						$fantasia_mercado_filt
						$tipo_caixa_filt
						ORDER BY data_cad DESC  ");

						$cont = mysql_num_rows($sql);
						//****************  Fim Filtros **************************
						while($linha = mysql_fetch_array($sql)){
							$contagem_qtd ++;
							
							//Filtro para gerar icones e situacao da contagem na loja... 
							if ($linha['contagem'] < $linha['saldo_oficial']){//Contagem abaixo da oficial
								$title_contagem = 'title="Contagem abaixo do saldo oficial"';
								$icone_situacao = '<i class="icon-custom icon-sm rounded-4x icon-bg-red fa fa-level-down"></i>';			
								$situacao = "errada_abaixo";
							}
							if ($linha['contagem'] > $linha['saldo_oficial']){//Contagem acima da oficial
								$title_contagem = 'title="Contagem acima do saldo oficial"';
								$icone_situacao = '<i class="icon-custom icon-sm rounded-4x icon-bg-red fa fa-level-up"></i>';
								$situacao = "errada_acima";
							}
							if ($linha['contagem'] == $linha['saldo_oficial']){//Contagem Correta
								 $icone_situacao = '<i class="icon-custom icon-sm rounded-4x icon-bg-green fa fa-thumbs-o-up"></i>';
								 $title_contagem = 'title="Contagem correta, igual a oficial"';
								 $situacao = "correta";
							}
							
							
							//Filtro situacao
							if($_POST['situacao'] == errada_abaixo){
								if($situacao != "errada_abaixo"){
									continue;
								}
							}
							if($_POST['situacao'] == errada_acima){
								if($situacao != "errada_acima"){
									continue;
								}
							}
							if($_POST['situacao'] == correta){
								if($situacao != "correta"){
									continue;
								}
							}
							if($_POST['situacao'] == errada){
								
								if($situacao != "errada_abaixo" and $situacao != "errada_acima" ){
									continue;
								}
							}
							if($linha['saldo_oficial'] > 0 ){
								$saldo_positivo = 'class="text-highlights text-highlights-red rounded-2x"';
								$title_saldo = 'title="Saldo Positivo!"';
							}
							else{
								$saldo_positivo = '';
								$title_saldo = '';
							}
						?>
							<tr>
								<td>
									<? if ($filt_qualidade_exclui == "1" or $filt_qualidade_altera == "1"){?>
										<label class="checkbox state-success">
											<input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>"><i></i>
										</label>
									<? }?>							
								</td>
								<td><? echo converte_data($linha['data_cad']); ?></td>
								<td><? echo busca_nome_caixas($linha['cod_caixa']); ?></td>
								<td><? echo utf8_encode($linha['fantasia_mercado']); ?></td>
								<td <? echo $saldo_positivo.$title_saldo?> ><? echo $linha['saldo_oficial']; ?></td>
								<td><? echo $linha['recebido']; ?></td>
								<td><? echo $linha['enviado']; ?></td>
								<td>
									<div class="col col-6">
										<? echo $linha['contagem']; ?>
									</div>
									<div class="col col-6" <? echo $title_contagem ?>>
										<? echo $icone_situacao; ?>
									</div>
								</td>
								<td></td>
								
							</tr>
						<? 	}?>
					</tbody>
				</table>
			</fieldset> 
			<fieldset>
					<div class="alert alert-warning fade in margin-bottom-40">
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