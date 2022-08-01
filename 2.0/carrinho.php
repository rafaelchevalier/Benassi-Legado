<? session_start();
require"include/verifica.php";// MÓDULO QUE VERIFICA SE O USUÁRIO ENCONTRA-SE LOGADA PARA ACESSO RESTRITO (PADRÃO EM PÁGINAS INTERNAR RESTRITAS)
require"js/funcoes.jsp";//FUNÇÃO JAVA (PADRÃO TODAS AS PÁGINAS)
$data_atual = date("d/m/Y");// PUXA DATA ATUAL PARA UTILIZAÇÃO DURANTE A PÁGINA CASO NECESSÁRIO (PADRÃO TODAS AS PÁGINAS)
$hora_atual = date("H:i");//Puxa hora atual
?>
<!DOCTYPE html> 
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="pt-br"> <!--<![endif]-->  
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
	 <link rel="stylesheet" href="assets/plugins/glyphicons-pro/glyphicons/web/html_css/css/glyphicons.css">
    <link rel="stylesheet" href="assets/plugins/glyphicons-pro/glyphicons_halflings/web/html_css/css/halflings.css">
    <link rel="stylesheet" href="assets/plugins/glyphicons-pro/glyphicons_social/web/html_css/css/social.css">
    <link rel="stylesheet" href="assets/plugins/glyphicons-pro/glyphicons_filetypes/web/html_css/css/filetypes.css">

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
	
	<!-- Scripts Jquery -->
		<script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.maskedinput-1.3.min.js"></script>	<!-- Script para mascarar campos exemplo campo CPF ou CNPJ-->
	<!-- Fim Scripts Jquery -->	
	
	<!-- JS Customization -->
	<script type="text/javascript" src="js/verificaStatus.js"></script>
	<?require "js/verificaStatus.js"; ?>
		
<!-- Scripts antigos removidos manter apenas para regitros
		******** CSS *******
		<link href="css/default.css" rel="stylesheet" type="text/css"/ media="screen">
        <link href="css/print.css" rel="stylesheet" type="text/css" media="print"/>
		<link href="css/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
		******** JAVA *******
		<script type="text/javascript" src="js/jquery.click-calendario-1.0-min.js"></script>	
		<script type="text/javascript" src="js/exemplo-calendario.js"></script>

-->		
	<!-- Função Java para criar mascara dos campos a serem utilizados na página.
	Precisa integrar o script "jquery.maskedinput-1.3.min.js" que encontrasse na linha 52.
	-->
	<script>
	jQuery(function($){
	       $("#campoData").mask("99/99/9999");
		   $("#campoHora").mask("99:99");
	       $("#campoPlaca").mask("aaa-9999");
		   $("#campoNumeros").mask("999999999");
		   
	});
	</script>
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
				<h1 class="pull-left">Controle de Carrinho de Flores</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li><a href="?pg=qt_carrinho">Lança Carrinho</a></li>
					<li><a href="?pg=comprovante">Gera Comprovantes</a></li>
					<li><a href="?pg=consulta_comprovante">Consulta Comprovante</a></li>
					<li><a href="?pg=consulta">Consulta</a></li>
				</ul>
			</div>
		</div>
		<!-- Fim Cabeçalho Conteudo -->
		<!-- Fim Cabeçalho Conteudo -->

	
<!-- ************************************************************************************************************************************* 
											Quantidade de carrinhos e tipo movimento
								Formulário para informar quantidade de linhas de carrinho e Tipo da Operação entrada ou Saída. 
****************************************************************************************************************************************** -->
<!-- -->
	<? if ( $pg == "qt_carrinho" ) {?>
		<div class="container content">
			<!-- Login-Form -->
			<div class="col-md-12">
				<form id="sky-form4" class="sky-form" method="post" action="carrinho.php?pg=cad_carrinho&qt=<? echo $qtd; ?>" >
					<header>Operação Carrinho</header>            
					<fieldset>    
						<section>
							<div class="row">
								<label class="label col col-3">Operação</label>
									<label class="select col col-9">
										<select name="tipo_mov" size="1" id="tipo_mov">
											<!-- <option value="1" multiple  SELECTED>(1) - Chegada SP / CD</option> -->
											<option value="SAIDA" multiple >(2) - Saída</option><!-- QUANDO O CARRINHO É ENVIADO DO CD PARA O CLIENTE -->
											<option value="RETORNO" multiple >(3) - Retorno</option> <!-- QUANDO O CARRINHO RETORNA DO CLIENTE PARA BENASSI CD -->
											<option value="DEVOLUCAO" multiple >(4) - Devolução</option><!-- QUANDO O CARRINHO É DEVOLVIDO PARA BENASSI SP -->
											<!-- 
											<option value="ENTRADA" multiple >(1) - Entrada (Holambra -> Benassi CD)</option>
											<option value="SAIDA" multiple >(2) - Saída (Benassi CD -> Cliente)</option>
											<option value="RETORNO" multiple >(3) - Retorno (Cliente -> Benassi CD)</option>
											<option value="DEVOLUCAO" multiple >(4) - Devolução (Benassi CD Holambra)</option>
											-->
										</select> 
										<i class="icon-append"></i>
									</label>
								</label>
							</div>
						</section> 
						<section>
							<div class="row">
								<label class="label col col-3">Quantidade</label>
								<label class="select col col-9">
									<select name="qtd" size="1" id="qtd">
										<? for ($i=1;$i<101;$i++){?>
										<option value="<? echo $i;?>"<? if ($i == 10 ){ echo "SELECTED"; } ?> multiple ><? echo $i;?></option>
										<? }?>
									</select> 
									<i class="icon-append"></i>
								</label>
							</div>
						</section> 
					</fieldset>
					<footer> 
						<button type="submit" class="btn-u btn-u-green rounded-2x">Próximo  <i class="fa fa-angle-double-right"></i></button>
					</footer>
				</form>         
			</div>	
		</div>
	<? }?>
<!-- ************************************************************************************************************************************* 
											Fim Quantidade de carrinhos e tipo movimento
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											Entrada de carrinhos
									FORMULÁRIO PARA FECHAR CHAMADO
****************************************************************************************************************************************** --> 
	<? if ( $pg == "cad_carrinho" ) { 
	if ($_POST['tipo_mov'] != "SAIDA" OR $_POST['tipo_mov'] != "RETORNO" OR $_POST['tipo_mov'] != "DEVOLUCAO"){
		$tipo_mov = $_POST['tipo_mov'];
	}
	else{
		echo"
			<script type=\"text/javascript\">	
				alert(\" Houve um erro, operação Inválida. Favor tentar novamente. Se o problema persistir, favor entrar em contato com suporte.\");
				history.back(-1);
			</script>
		";
	}
	?>
		<div class="container content">
			<form action="include/carrinho.php?funcao=cad2&qt=<? echo $_POST['qtd']; ?>" method="post" enctype="multipart/form-data" id="sky-form1" class="sky-form">
                    <header>Lançameno de Carrinhos</header>
                    <fieldset>  
						<div class="row">
							<section class="col col-12">
                                <label class="input">
									Operação :<?echo $_POST['tipo_mov'];?>
									<input type="hidden" name="usuario" value="<? echo $nome_usuario_logado?>" readonly="readonly"  /></td></td>
									<input type="hidden" name="tipo_mov" value="<?echo $_POST['tipo_mov'];?>" title=""/>
								</label>
                            </section>
						</div>
						<? if ($_POST['tipo_mov'] == "RETORNO"){
							//Puxa clientes na origem e empresa no retorno.Utilizado apenas quando o tipo de movimento é retorno. 	
								?>
							<div class="row">
								<section class="col">
									<label class="select">
										<select name="destino" size="1" id="nome" title="Destino">
											<? //Varre a tabela de empresas cadastradas 
											$sql_login = mysql_query("SELECT * FROM empresa order by nome_fantasia ");
											$cont2 = mysql_num_rows($sql_login);
											while($linha2 = mysql_fetch_array($sql_login)){	?>
												<option value="<? echo $linha2['nome_fantasia'] ?>" onChange="<? $mercado = $linha2['nome_fantasia']; ?>"> <? echo utf8_encode($linha2['nome_fantasia']); ?></option>  
											<? }?>
										</select> 
										<i class="icon-append"></i>
									</label>
								</section>
							</div>
						<? }?>
						<? if ($_POST['tipo_mov'] == "SAIDA" OR $_POST['tipo_mov'] == "DEVOLUCAO"){
							//Puxa Emrpesas na origem e Clientes no retorno. Utilizado Quando o tipo de movimento é Saída ou Devolução. 	
							if ($_POST['tipo_mov'] == "SAIDA"){$mysql_filt_consulta_cliente = "WHERE nome_fantasia<>'BENASSI SP' ";}//Filtro para consultar todos os clientes com execeção da empresa Benassi SP
							if ($_POST['tipo_mov'] == "DEVOLUCAO"){$mysql_filt_consulta_cliente = "WHERE nome_fantasia='BENASSI SP' ";}//Filtro para consultar apenas Benassi SP na saída.
						?>
							<div class="row">
								<section class="col col-6">
									<label class="select">
										<select name="origem" title="origem">
											<? //Varre a tabela de empresas cadastradas 
											$sql_login = mysql_query("SELECT * FROM empresa order by nome_fantasia ");
											$cont2 = mysql_num_rows($sql_login);
											while($linha2 = mysql_fetch_array($sql_login)){	?>
												<option value="<? echo $linha2['nome_fantasia'] ?>" onChange="<? $mercado = $linha2['nome_fantasia']; ?>"> <? echo utf8_encode($linha2['nome_fantasia']); ?></option>  
											<? }?>
										</select> 
										<i class="icon-append"></i>
									</label>
								</section>
								<section class="col col-6">
									<label class="select">
										<select name="destino" size="1" id="nome" title="Destino">
											<?   
												//Varre a tabela de Clientes cadastrados 
												$sql_login = mysql_query("SELECT * FROM mercado $mysql_filt_consulta_cliente order by nome_fantasia ");
												$cont2 = mysql_num_rows($sql_login);
												while($linha2 = mysql_fetch_array($sql_login)){	
											?>
											 <option value="<? echo $linha2['nome_fantasia'] ?>" onChange="<? $mercado = $linha2['nome_fantasia']; ?>"> <? echo utf8_encode($linha2['nome_fantasia']); ?></option>  
											<?  } ?>
										</select> 
										<i class="icon-append"></i>
									</label>
								</section>
							</div>
						<? }?>
                        <div class="row">
                           <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-calendar"></i>
                                    <input type="text" name="data_saida" id="start"   value="<? echo converte_data($data_atual);?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Chegada Carrinhos" title="Data">
                                </label>
                            </section>
							 <section class="col col-6">
								<label class="input">
                                    <i class="icon-append icon icon-clock"></i>
                                    <input type="text" name="hora_saida" id="campoHora" value="<? echo $hora_atual;?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Hora Chegada 00:00" title="Hora">
                                </label>
                            </section>
                        </div>
                    </fieldset>
					<header><i class="fa fa-truck"></i> Transporte</header>
                    <fieldset>
                        <div class="row">
                            <section class="col col-2">
                                <label class="input">
									<input type="number" name="cod_transporte" title="Código Motorista" placeholder="Código" maxlength="12" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
								</label>
                            </section>
							<section class="col col-4">
                                <label class="input">
									<input type="text" name="placa_transporte" id="campoPlaca" title="Placa Caminhão" placeholder="Placa Transportador" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
								</label>
                            </section>
							<section class="col col-6">
                                <label class="input">
									<input type="text" name="motorista" title="Nome Motorista" placeholder="Nome Motorista " onkeypress="autoTab(this, event); return event.keyCode != 13;"/>
								</label>
                            </section>
                        </div>
					</fieldset>
					<header><i class="fa fa-cog"></i> Outras Informações</header>
                    <fieldset>
                        <div class="row">
                            <section class="col col-11">
								<label class="input">
									<input type="number" name="prateleiras" maxlength="6" placeholder="Numero de prateleiras" onkeypress="autoTab(this, event); return event.keyCode != 13;"/>
								</label>
							</section>
                        </div>
                    </fieldset>
					<header>Códigos de Barras</header>
                    <fieldset>
						<? 
						for($i=0; $i < $_POST['qtd']; $i++){
						$qt ++;
						?>
							<div class="row">
								<section class="col col-11">
									<label class="input col col-1">
										<p> <? echo $i+1?> </p>
									</label>
									<label class="input col col-11">
										<i class="icon-append fa fa-barcode"></i>
										<input type="text" name="num_serie<? echo $i?>" placeholder="Número de Série" onkeypress="autoTab(this, event); return event.keyCode != 13;" />
									</label>
								</section>
							</div>
						<? }?>
                    </fieldset>
					<footer>
						<button type="submit" class="btn-u btn-u-green rounded-2x"><i class="icon-pencil">Confirmar</i></button>
					</footer>               
                </form>         
                <!-- End Order Form -->
		</div>
	<? }?>
	
<!-- ************************************************************************************************************************************* 
										FIM ENTRADA DE CARRINHOS
****************************************************************************************************************************************** --> 
<!-- ************************************************************************************************************************************* 
											COMPROVANTE
****************************************************************************************************************************************** --> 
<? if ($pg == "comprovante" /*and $mov_carrinho_inclui == "1"*/) {//GERA COMPROVANTE ?>
<div class="container content">
	<form id="sky-form1" class="sky-form" method="post"action="mov_carrinho_rel.php">
		<header>Gera Comprovante</header>
		<fieldset>  
			<div class="row">
				<section class="col col-12">
					<label class="input">
						<input type="hidden" name="usuario" id="usuario" value="<? echo $nome_usuario_logado?>" />
						<input type="text" name="num_serie" value="<? echo $_GET['num']?>" id="num_serie"/>
					</label>
				</section>
			</div>
		</fieldset>
		<fieldset>  
			<div class="row">
				<section class="col col-12">
					<label class="input">
						
					</label>
				</section>
			</div>
		</fieldset>
		<footer>
			<button type="submit" class="btn-u btn-u-green rounded-2x"><i class="icon-pencil">Confirmar</i></button>
		</footer>  
	</form>
</div>

<? } ?>
<!-- ************************************************************************************************************************************* 
										FIM COMPROVANTE
****************************************************************************************************************************************** --> 
<!-- ************************************************************************************************************************************* 
										CONSULTA COMPROVANTE
****************************************************************************************************************************************** --> 
<? if ($pg == "consulta_comprovante" and $mov_carrinho_consulta = "1") {//Consulta Aferição Balança ?>
	<div class="container content">
		<div class="panel panel-blue margin-bottom-40">
			<div class="panel-heading col-md-12">
				<span class="panel-title ">
					Filtros
				</span>
			</div>
			<form action="carrinho.php?pg=consulta_comprovante" method="post" enctype="multipart/form-data" id="sky-form1" class="sky-form">
				<table class="table table-hover table-striped">
					<tbody>
						<tr>
							<td>
								<label class="input">
									<i class="icon-append fa fa-calendar"></i>
									<input type="text" name="data1" id="start" value="<? if (!empty($_REQUEST['data1'])){echo $_REQUEST['data1'];}if (empty($_REQUEST['data1'])){echo converte_data($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Chegada Carrinhos" title="Data">
								</label>
							</td>
							<td>
								<label class="input">
									<i class="icon-append fa fa-calendar"></i>
									<input type="text" name="data2" id="finish" value="<? if (!empty($_REQUEST['data2'])){echo $_REQUEST['data2'];}if (empty($_REQUEST['data2'])){echo converte_data($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Chegada Carrinhos" title="Data">
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td>
								<button type="submit" class="btn-u btn-u-green rounded-2x"><i class="icon-pencil"> Confirmar</i></button>
							</td>
						<tr>
					</tfoot>
				</table>
			</form>
			<div class="panel-heading col-md-12">
				<button class="btn btn-warning btn-sm rounded-2x" onClick="history.go(0)">
						<i class="fa fa-refresh" title="ATUALIZA lISTA"></i>
				</button>
				</button>
				<span class="panel-title ">
					&nbsp;&nbsp;Consulta Comprovantes
				</span>
			</div>
		</div>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th class="col-md-2">Opções</th>
					<th class="col-md-2">Tipo Mov.</th>
					<th class="col-md-1">Data</th>
					<th class="col-md-1">Localizador</th>
					<th class="col-md-3">Origem</th>
					<th class="col-md-3">Destino</th>
				</tr>
			</thead>
			<?
				$data_atual = date("d/m/Y");
				require"include/conexao.php";
				//****************  Inicio Filtros **************************
				//Filtro de consulta a tabela FBL 
				if(!empty($_REQUEST['data1'])){
					$filt1 = converte_data($_REQUEST['data1']);
				}
				if(empty($_REQUEST['data1'])){
					$filt1 = $data_atual;
				}
				if(!empty($_REQUEST['data2'])){
					$filt2 = converte_data($_REQUEST['data2']);
				}
				if(empty($_REQUEST['data2'])){
					$filt2 = $data_atual;
				}

				$num_serie = $_REQUEST['num_serie'];

					$sql = mysql_query("SELECT * FROM comprovante_mov_carrinho WHERE data_saida BETWEEN ('$filt1') AND ('$filt2') GROUP BY localizador ORDER BY localizador DESC   ");
					//$sql = mysql_query("SELECT * FROM comprovante_mov_carrinho GROUP BY localizador ORDER BY localizador DESC  LIMIT 100 ");
					// Fim teste 

				$cont = mysql_num_rows($sql);
				//****************  Fim Filtros **************************
				while($linha = mysql_fetch_array($sql)){
				?>
				<tr>
					<td> 

						<a href="mov_carrinho_reimp_comprovante.php?loc=<?echo $linha['localizador']?>">
							<button class="btn btn-warning btn-sm rounded-2x icon-line icon-printer">
							</button>						 
						</a>
						<!-- <button class="btn btn-warning btn-sm rounded-2x icon-line icon-magnifier-add"> -->
						</button>
					</td>
					<td><? echo $linha['tipo_mov'];?></td>
					<td ><? echo converte_data($linha['data_saida']); ?></td>
					<td ><? echo $linha['localizador']; ?></td>
					<td ><? echo utf8_encode($linha['origem']); ?></td> 
					<td ><? echo utf8_encode($linha['destino']); ?></td>
				</tr>
				<? }?>
			<tbody>
			</tbody>
		</table>
	</div>
<? }?>

<!-- ************************************************************************************************************************************* 
										FIM CONSULTA COMPROVANTE
****************************************************************************************************************************************** --> 
<!-- ************************************************************************************************************************************* 
										CONSULTA CONSULTA LANCAMENTOS DE CARRINHOS
****************************************************************************************************************************************** --> 
<? if ($pg == "consulta" and $mov_carrinho_consulta = "1") { ?>
	<div class="content row">
		<header class="text-center"><h2>Filtros</h2></header>  
		<form action="carrinho.php?pg=consulta" method="post" enctype="multipart/form-data" id="sky-form1" class="sky-form">
			<fieldset>    
				<section>
					<div class="row">
						<div class="col col-6">
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="data1" id="start" value="<? if (!empty($_REQUEST['data1'])){echo $_REQUEST['data1'];}if (empty($_REQUEST['data1'])){echo converte_data($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Chegada Carrinhos" title="Data Inicial">
							</label>
						</div>	
						<div class="col col-6">
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="data2" id="finish"  value="<? if (!empty($_REQUEST['data2'])){echo $_REQUEST['data2'];}if (empty($_REQUEST['data2'])){echo converte_data($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Chegada Carrinhos" title="Data Final">
							</label>
						</div>
					</div>
				</section>        
				<section>
					<div class="row">
						<div class="col col-4">
							<label class="input">
								<i class="icon-append fa fa-barcode"></i>
								<input type="text" name="num_serie" <? if(isset($_POST['num_serie'])){echo "value='".$_POST['num_serie']."'";}?> placeholder="Número de Série Carrinho" Title="Número de série dos Carrinhos"/>
							</label>
						</div>
						<div class="col col-4">
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="tipo_mov" Title="Situação do carrinho">
									<option value="" selected="selected" multiple >Movimento</option>
									<option value="SAIDA" 		<? if ($_POST['tipo_mov'] == "SAIDA"){?>	 selected="selected" <? }?> multiple >Saída</option>
									<option value="RETORNO" 	<? if ($_POST['tipo_mov'] == "RETORNO"){?>	 selected="selected" <? }?> multiple >Retorno</option>
									<option value="DEVOLUCAO" 	<? if ($_POST['tipo_mov'] == "DEVOLUCAO"){?> selected="selected" <? }?> multiple >Devolução</option>
								</select>
							</label>
						</div>
						<div class="col col-4">
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="ativo" Title="Situação do carrinho">
									<option value="" selected="selected" multiple >Situação</option>
									<option value="1" <? if ($_POST['ativo'] == "1"){?>selected="selected" <? }?> multiple >Pendente</option>
									<option value="0" <? if ($_POST['ativo'] == "0"){?>selected="selected" <? }?> multiple >Baixado</option>
								</select>
							</label>
						</div>
					</div>
				</section> 
				<section>
					<!-- //Código comentado pois ainda não está aplicada a lógica para consulta 
					<div class="row">
						<div class="col col-6">
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="origem" Title="Origem">
									<?
									//Varre o banco, procurando todos os usuários cadastrados
									$sql_filtro = mysql_query("SELECT DISTINCT origem FROM mov_carrinho ORDER BY origem DESC LIMIT 10 ");
									$cont_filtro = mysql_num_rows($sql_filtro);
									while($linha_filtro = mysql_fetch_array($sql_filtro)){ ?>
											<option value="<? echo $linha_filtro['origem'] ?>" <? if($linha_filtro['origem']  == $_POST['origem']){?>selected="selected"<? }?> multiple ><? echo utf8_encode($linha_filtro['origem']) ?></option>
									   <? }?>
										<option value="" selected="selected" multiple >Origem</option>
								</select>
							</label>
						</div>
						<div class="col col-6">
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="destino" Title="Destino">
									<?
									//Varre o banco, procurando todos os usuários cadastrados
									$sql_filtro = mysql_query("SELECT DISTINCT destino FROM mov_carrinho ORDER BY destino DESC LIMIT 10 ");
									$cont_filtro = mysql_num_rows($sql_filtro);
									while($linha_filtro = mysql_fetch_array($sql_filtro)){ ?>
											<option value="<? echo $linha_filtro['destino'] ?>"<? if($_POST['destino'] == $linha_filtro['destino']){?>selected="selected"<?}?> multiple ><? echo utf8_encode($linha_filtro['destino']) ?></option>
									   <? }?>
										<option value="" selected="selected" multiple >Destino</option>
								</select>
							</label>
						</div>
					</div>
					-->
				</section> 
				<footer> 
					<button type="submit" class="btn-u btn-u-green rounded-2x"><i class="icon-pencil"> Confirmar</i></button>
				</footer> 
			</fieldset>
		</form>
		<form method="post" action="include/carrinho.php?funcao=exclui_varios" id="sky-form4" class="sky-form">
			<fieldset>
				<div class="panel panel-sea margin-bottom-40">
					<div class="panel-heading col-md-12">
						<div class="col-md-2">
							<div class="col-md-2">
								<label class="checkbox state-success">
									<input type="checkbox" name='tudo' onclick='verificaStatus(this)'><i></i>
								</label>
							</div>
							<div class="col-md-9">
								<button class="btn btn-warning btn-sm rounded-2x" onClick="history.go(0)">
										<i class="fa fa-refresh" title="ATUALIZA lISTA"></i>
								</button>
								<button type="submit" class="btn btn-danger btn-sm rounded-2x fa fa-trash-o"></button>
							</div>
						</div>
						<div class="col-md-10 text-right">
							<span>
									&nbsp;&nbsp;Consulta Carrinhos
								</span>
						</div>
							
					</div>
				</div>
			</fieldset>
			<fieldset>
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th class="col-md-1">Opções.</th>
							<th class="col-md-2">Mov.</th>
							<th class="col-md-2.5">Origem.</th>   
							<th class="col-md-2.5">Destino.</th>
							<th class="col-md-1">DATA.</th>
							<th class="col-md-1">Hora.</th>
							<th class="col-md-1">Num. Serie.</th> 
							<th class="col-md-1">Comprovante.</th> 
						</tr>
					</thead>
					<?
						$data_atual = date("d/m/Y");
						require"include/conexao.php";
						//**************** Inicio Filtros **************************
						//Filtro de consulta a tabela FBL 
						if(!empty($_REQUEST['data1'])){
							$filt1 = converte_data($_REQUEST['data1']);
						}
						if(empty($_REQUEST['data1'])){
							$filt1 = $data_atual;
						}
						if(!empty($_REQUEST['data2'])){
							$filt2 = converte_data($_REQUEST['data2']);
						}
						if(empty($_REQUEST['data2'])){
							$filt2 = $data_atual;
						}
						if(!empty($_REQUEST['num_serie'])){
							$num_serie = "AND num_serie LIKE'%".$_REQUEST['num_serie']."%'";
						}
						if(empty($_REQUEST['num_serie'])){
							$num_serie = "";
						}		
						if(!empty($_REQUEST['ativo'])){
							$ativo = "AND ativo ='".$_REQUEST['ativo']."'";
						}
						if(empty($_REQUEST['ativo'])){
							$ativo = "";
						}	
						if(!empty($_REQUEST['tipo_mov'])){
							$tipo_mov = "AND tipo_mov ='".$_REQUEST['tipo_mov']."'";
						}
						if(empty($_REQUEST['tipo_mov'])){
							$tipo_mov = "";
						}					
						

							$sql = mysql_query("SELECT * FROM mov_carrinho
							WHERE data_saida BETWEEN ('$filt1') AND ('$filt2') 
							$num_serie	
							$ativo	
							$tipo_mov					
							ORDER BY data_saida DESC  ");
							// Fim teste 

						$cont = mysql_num_rows($sql);
						//****************  Fim Filtros **************************
						while($linha = mysql_fetch_array($sql)){
						?>
						<tr>
							<td>
								<div class="col-md-3">
									<label class="checkbox state-success">
										<input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>"><i></i>
									</label>
								</div>
								<div class="col-md-3">
									<a href="include/carrinho.php?funcao=alt_carrinho&id=<? echo $linha['id'] ?>">
										<? if($linha['ativo'] == 1){?>
											<i class="icon-custom icon-sm rounded-2x icon-bg-red fa fa-minus-square-o"></i>
										<? }?>
										<? if($linha['ativo'] == 0){?>
											<i class="icon-custom icon-sm rounded-2x icon-bg-green fa fa-check-square"></i>
										<? }?>
									</a>
								</div>
								<div class="col-md-12">
									<? $dif = dif_data(converte_data($data_atual),$linha['data_saida']);?>
									<? if ($dif > -3 and $dif < 1 and $linha['situacao'] == 1 and $linha['tipo_mov'] == "SAIDA"){?>
										<span class="label label-success"><small class="color-dark-blue"><? echo $dif." Dias"; ?></small></span>
									<? }?>
									<? if ($dif < -3 and $dif > -6  and $linha['situacao'] == 1 and $linha['tipo_mov'] == "SAIDA"){?>
										<span class="label label-yellow"><small class="color-dark-blue"><? echo $dif." Dias"; ?></small></span>
									<? }?>
									<? if ($dif < -6  and $linha['situacao'] == 1 and $linha['tipo_mov'] == "SAIDA"){?>
										<span class="label label-danger"><small class="color-sea"><? echo $dif." Dias"; ?></small></span>
									<? }?>
								</div>
								
							</td>
							<td ><h5><? echo utf8_encode($linha['tipo_mov']); ?></h5></td>
							<td ><h5><? echo utf8_encode($linha['origem']); ?></h5></td>
							<td ><h5><? echo utf8_encode($linha['destino']); ?></h5></td> 
							<td ><h5><? echo converte_data($linha['data_saida']); ?></h5></td>
							<td ><h5><? echo $linha['hora_saida']; ?></h5></td> 
							<td ><h5><? echo utf8_encode($linha['num_serie']); ?></h5></td>
							<td ><h5><?  if($linha['comprovante'] != 0) {echo $linha['comprovante'];} else{ echo "N&Atilde;O";} ?></h5></td> 
						</tr>
						<? }?>
					<tbody>
					</tbody>
				</table>
			</fieldset>
		</form>	
	</div>
<? }?>

<!-- ************************************************************************************************************************************* 
										FIM  CONSULTA LANCAMENTOS DE CARRINHOS
****************************************************************************************************************************************** --> 

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
<script type="text/javascript" src="assets/js/forms/order.js"></script>
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