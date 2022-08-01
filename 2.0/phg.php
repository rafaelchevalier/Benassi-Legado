<? session_start();
require ("include/verifica.php");
?>
<!DOCTYPE html> 
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Controles Interno Maça verde</title>

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
			<h1 class="pull-left">Controle de Quebra</h1>
			<ul class="pull-right breadcrumb">			
			</ul>
		</div>
	</div>
<!--===== Fim Cabeçalho Conteudo =====-->
<!-- ********************************************************************************************************************* 
											 Cadastro 
************************************************************************************************************************-->
<? if ($pg == "cad_dia" and $phg_inclui == "1") {//Cadastro Temperatura Camaras?>
	<div class="container content">
		<div class="panel panel-sea margin-bottom-12">
			<div class="panel-heading col-md-12">
				<span class="panel-title ">
					PHG - Cadastro
				</span>
			</div>
			<div class="alert alert-success fade in margin-bottom-40">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <h3>Legenda</h3>
                <p>SIM = Conforme | NÃO = Não Conforme</p>
            </div>
			<form action="include/phg.php?funcao=cad2" method="post" id="sky-form" class="sky-form" enctype="multipart/form-data">
				
				<input type="hidden" name="periodo" id="periodo" value="DIARIO" maxlength="30" size="31" readonly="readonly"  />
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
								<input type="text" name="nome_usuario" id="cadnome" value="<? echo utf8_encode($nome_usuario_logado)?>" maxlength="30" size="31" readonly="readonly"  />
							</label>
						</section>
						<section class="col col-4">
							<label>
								<p>Legendas</p>
								
							</label>
						</section>
					</div>
				</fieldset>
				<fieldset> 
					<div class="heading heading-v6">
                        <h3>EMBALAGEM</h3>
					</div>
				</fieldset>
				<fieldset> 
					<div class="row">
						<section class="col col-1">
							<label></label>
							<label class="input">
								
								
							</label>
						</section>
						<section class="col col-1">
							<label>PISO</label>
							<label class="input">
								<label class="toggle_conforme state-error">
									<input type="checkbox" name="piso_embalagem" value="1">
									<i class="rounded-4x"></i>
								</label>
							</label>
						</section>
						<section class="col col-1">
							<label>BANCADAS</label>
							<label class="toggle_conforme state-success">
								<input type="checkbox" name="bancadas_embalagem" value="1">
								<i class="rounded-4x"></i>
							</label>
						</section>
						<section class="col col-1">
							<label>BALANÇAS</label>
							<label class="toggle_conforme state-success">
								<input type="checkbox" name="balancas_embalagem" value="1">
								<i class="rounded-4x"></i>
							</label>
						</section>
						<section class="col col-1">
							<label>ESTEIRAS</label>
							<label class="toggle state-success">
								<input type="checkbox" name="esteiras_embalagem" value="1">
								<i class="rounded-4x"></i>
							</label>
						</section>
						<section class="col col-2">
							<label>SELADORA A</label>
							<label class="toggle_conforme state-success">
								<input type="checkbox" name="seladoraa_embalagem" value="1">
								<i class="rounded-4x"></i>
							</label>
						</section>
						<section class="col col-2">
							<label>SELADORA B</label>
							<label class="toggle_conforme state-success">
								<input type="checkbox" name="seladorab_embalagem" value="1">
								<i class="rounded-4x"></i>
							</label>
						</section>
						<section class="col col-1">
							<label>PIAS</label>
							<label class="toggle_conforme state-success">
								<input type="checkbox" name="pias_embalagem" value="1">
								<i class="rounded-4x"></i>
							</label>
						</section>
						<section class="col col-1">
							<label>LIXEIRA</label>
							<label class="toggle_conforme state-success">
								<input type="checkbox" name="lixeira_embalagem" value="1">
								<i class="rounded-4x"></i>
							</label>
						</section>
						<section class="col col-1">
							<label></label>
							<label class="input">
							</label>
						</section>
				</fieldset>
				<fieldset> 
					<div class="col col-5">
						<div class="row">
							<div class="heading heading-v6">
								<h3>COZINHA INDUSTRIAL</h3>
							</div>
						</div>
						<div class="row">
							<section class="col col-3">
								<label>PISO</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="piso_cozinhaind" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
							<section class="col col-3">
								<label>BANCADAS</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="bancada_cozinhaind" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
							<section class="col col-3">
								<label>BALANÇAS</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="balanca_cozinhaind" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
							<section class="col col-3">
								<label>LIXEIRA</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="lixeira_cozinhaind" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
						</div>
					</div>
					<div class="col col-4">
						<div class="row">
							<div class="heading heading-v6">
								<h3>GALPÃO</h3>
							</div>
						</div>
						<div class="row">
							<section class="col col-4">
								<label>PISO</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="piso_galpao" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
							<section class="col col-4">
								<label>LIXEIRA</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="lixeira_galpao" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
							<section class="col col-4">
								<label>BALANÇAS</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="balanca_galpao" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
						</div>
						
					</div>
					<div class="col col-3">
						<div class="row">
							<div class="heading heading-v6">
								<h3>ANTE-CÂMARA</h3>
							</div>
						</div>
						<div class="row">
							<section class="col">
								<label>PISO</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="piso_ante_camara" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
						</div>
					</div>
				</fieldset>
				<fieldset> 
					<div class="col col-5">
						<div class="row">
							<div class="heading heading-v6">
								<h3>CÂMARAS FRIA</h3>
							</div>
						</div>
						<div class="row">
							<section class="col col-3">
								<label>1 - PISO</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="piso1_camara_fria" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
							<section class="col col-3">
								<label>2 - PISO</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="piso2_camara_fria" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
							<section class="col col-3">
								<label>3 - PISO</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="piso3_camara_fria" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
							<section class="col col-3">
								<label>4 - PISO</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="piso4_camara_fria" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
						</div>
					</div>
					<div class="col col-1">
						<div class="row">
							<div class="heading heading-v6">
								<h3>CAIXARIA</h3>
							</div>
						</div>
						<div class="row">
							<section class="col col-1">
								<label>PISO</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="piso_caixaria" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
						</div>
					</div>
					<div class="col col-2">
						<div class="row">
							<div class="heading heading-v6">
								<h3>VESTIÁRIOS</h3>
							</div>
						</div>
						<div class="row">
							<section class="col col-6">
								<label>MASCULINO</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="masculino_vestiario" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
							<section class="col col-6">
								<label>FEMININO</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="feminino_vestiario" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
						</div>
					</div>
					<div class="col col-2">
						<div class="row">
							<div class="heading heading-v6">
								<h3>DESCARTE</h3>
							</div>
						</div>
						<div class="row">
							<section class="col col-6">
								<label>PISO</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="piso_descarte" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
							<section class="col col-6">
								<label>CAÇAMBA</label>
								<label class="toggle_conforme state-success">
									<input type="checkbox" name="cacamba_descarte" value="1">
									<i class="rounded-4x"></i>
								</label>
							</section>
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
<?	if ($pg =="alt" and $filt_quebra_consulta == 1) { 
	$id_quebra_cab = $_GET['id']; 
?>

<div class="container content">
	<form method="post" action="include/fbl.php?funcao=exclui_varios" id="sky-form4" class="sky-form">
		<? // Consulta cabeçalho
		$sql_cab = mysql_query("SELECT * FROM tab_quebra_cab  
								WHERE id='$id_quebra_cab'
								LIMIT  1");
		while($linha = mysql_fetch_array($sql_cab)){ 
		$obs = $linha['obs'];
		?>	
			<fieldset> 
				<div class="row">
					<section class="col col-4">
						<label>Data</label>
						<label class="input">
							<i class="icon-append fa fa-calendar"></i>
							<input type="text" name="data" id="" value="<? echo converte_data($linha['data_cad'])?>" readonly="readonly" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Chegada Carrinhos" title="Data Inicial">
						</label>
					</section>
					<section class="col col-8">
						<label>Loja</label>
						<label class="input">
							<i class="icon-append fa fa-asterisk"></i>
							<input type="text" name="nome" value="<? echo busca_nome_mercado($linha['id_mercado_cad']);?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" readonly="readonly" >
							<input type="hidden" name="cod_tab_mix" size="6" maxlength="10" readonly="readonly" value="<? echo $linha['cod_tab_mix']?>"/>
						</label>
					</section>
				</div>
			</fieldset>
		<? }?>
		<fieldset>  
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th class="col-md-1">Cod</th>
						<th class="col-md-2">Produto</th>
						<th class="col-md-1">Quebra em KG</th>
						<th class="col-md-1">Custo KG</th>
						<th class="col-md-1">Custo Total</th>
						<th class="col-md-1">Venda KG</th>
						<th class="col-md-1">Venda Total</th>							
					</tr>
				</thead>
				<tbody>
					<?
					$qt=0;
					$sql_prod = mysql_query("SELECT * 
											FROM tab_quebra_prod  
											WHERE id_cab ='$id_quebra_cab'
											ORDER BY descricao_prod");
					while($linha_prod = mysql_fetch_array($sql_prod)){ 
						$qt ++;
						$total_quebra = $total_quebra + $linha_prod['quebra'];
						$custo_prod = $linha_prod['custo'] * $linha_prod['quebra'];
						$custo_tot = $custo_tot + $custo_prod;
						$venda_prod = $linha_prod['venda'] * $linha_prod['quebra'];
						$venda_tot = $venda_tot + $venda_prod;
					?>
							<tr>
								<td>
									<input type="hidden" name="cod_produto<? echo $qt; ?>"value="<? echo $linha_prod['cod_prod']; ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
									<input type="hidden" name="custo<? echo $qt; ?>"value="<? echo $linha_prod['custo']; ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
									<? echo $linha_prod['cod_prod']; ?>									
								</td>
								<td>
									<input type="hidden" name="nome_produto<? echo $qt; ?>"value="<? echo utf8_decode($linha_prod['descricao_prod']); ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
									<? echo utf8_encode($linha_prod['descricao_prod']); ?>
								</td>
								<td>
									<input type="hidden" size="5" maxlength="5" name="quebra<? echo $qt;?>" value="<? echo $linha_prod['quebra']?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
									<? echo $linha_prod['quebra']; ?>
								</td>
								<td>
									<input type="hidden" size="5" maxlength="5" name="custo<? echo $qt;?>" value="<? echo $linha_prod['quebra']?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
									<? echo "R$ ".number_format($linha_prod['custo'],2,",","."); ?>
								</td>
								<td>
									<input type="hidden" size="5" maxlength="5" name="custo_tot<? echo $qt;?>" value="<? echo $linha_prod['quebra']?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
									<? echo "R$ ".number_format($custo_prod,2,",","."); ?>
								</td>
								<td>
									<input type="hidden" size="5" maxlength="5" name="venda<? echo $qt;?>" value="<? echo $linha_prod['venda']?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
									<? echo "R$ ".number_format($linha_prod['venda'],2,",","."); ?>
								</td>
								<td>
									<input type="hidden" size="5" maxlength="5" name="venda_tot<? echo $qt;?>" value="<? echo $venda_prod?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
									<? echo "R$ ".number_format($venda_prod,2,",","."); ?>
								</td>
								
							</tr>
						
					<? }?>
				</tbody>
			</table>
		</fieldset> 
		<fieldset>
			<div class="alert alert-warning fade in margin-bottom-40">
				<label>OBS.</label>
				<label><? echo $obs;?></label>		
			</div>
		</fieldset>
		<fieldset>
			<div class="row alert alert-warning fade in margin-bottom-40">
				<div class="row">
					<label class="col col-5">
					</label>
					<label class="col col-2">
						Resumo
					</label>
					<label class="col col-5">
					</label>
				</div>
				<div class="row">
					<label class="col col-3">
						<? echo $qt." Itens ";?>
					</label>		
					<label class="col col-3">
						<? echo "Total Quebra: ".$total_quebra." KG";?>
					</label>		
					<label class="col col-3">
						<? echo "Total Custo R$ ".number_format($custo_tot,2,",",".");?>
					</label>		
					<label class="col col-3">
						<? echo "Total Venda R$ ".number_format($venda_tot,2,",",".");?>
					</label>		
				</div>
			</div>
		</fieldset>
	</form>
</div>
<? }?>

<!-- ********************************************************************************************************************* 
											 Fim Altera 
************************************************************************************************************************-->
<!-- ********************************************************************************************************************* 
											 Consulta 
************************************************************************************************************************-->
<? if ($pg =="con" and $filt_quebra_consulta == 1) {//Consulta Temperatura Camaras ?>

	<div class="container content">
		<form method="post" action="quebra.php?pg=con" id="sky-form4" class="sky-form">
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
							<label>Tipo</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="tipo" size="1">
									<option value="" selected="selected">Todas</option>
									<option value="2" >Quebra</option>
									<option value="1" >Inventário</option>
								</select>
							</label>
						</div>	
						<div class="col col-6">
							<label>Loja</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="cod_mercado" size="1"  id="filt_mercado">
									<option value="" multiple>Todos</option>
									<? 
									
									
									//Conexão com banco puxar usuário único
									$sql_filtro = mysql_query("SELECT DISTINCT id_mercado_cad  FROM tab_quebra_cab ORDER BY id_mercado_cad ");
									$cont_filtro = mysql_num_rows($sql_filtro);
									while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
									$id_mercado_cad = $linha_filtro['id_mercado_cad'];
									?>
										<option value="<? echo $id_mercado_cad?>" multiple>
											<? echo utf8_decode(busca_nome_mercado($linha_filtro['id_mercado_cad'])) ?>
										</option>
									<? }?>
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
		<form method="post" action="include/quebra.php?funcao=exclui_varios" id="sky-form4" class="sky-form">
			<fieldset>
				<div class="panel panel-sea margin-bottom-40">
					<div class="panel-heading col-md-12">
						<button class="btn btn-warning btn-sm rounded-2x" onClick="history.go(0)">
								<i class="fa fa-refresh" title="ATUALIZA lISTA"></i>
						</button>		
						<button type="submit" class="btn btn-danger btn-sm rounded-2x glyphicon glyphicon-trash"></button>
					</div>
				</div>
			</fieldset>
			<fieldset>  
				<table class="table table-hover table-striped">
					<thead>
						<tr>			
							<th class="col-md-1">OPÇÕES</th>
							<th class="col-md-2">DATA</th>
							<th class="col-md-3">MERCADO</th>
							<th class="col-md-2">TOT. QUEBRA</th>
							<th class="col-md-1">TOT. CUSTO</th>
							<th class="col-md-1">TOT. VENDA</th>
							<th class="col-md-2">TIPO</th>
						</tr>
					</thead>
					<tbody>
						<!-- INICIO CONSULTA -->
							<? 
							require "include/conexao.php";
							//Filtra entre períodos com data inicila = data1 e data Final = data2
							if(!empty($_POST['data1']))
								$data1 = converte_data($_POST['data1']);
							if(empty($_POST['data1']))
								$data1 = $data_atual;
							if(!empty($_POST['data2']))
								$data2 = converte_data($_POST['data2']);
							if(empty($_POST['data2']))	
								$data2 = $data_atual;
							//Filtra Situação se é quebra ou inventário
							if(!empty($_POST['tipo'])){
								$tipo = "AND tipo ='".$_POST['tipo']."'";
								}
							if(empty($_POST['tipo'])){
								$tipo ="";
							}
							//Filtra Loja
							if(!empty($_POST['cod_mercado'])){
								$loja = "AND id_mercado_cad ='".$_POST['cod_mercado']."'";
							}
							if(empty($_POST['cod_mercado'])){
								$loja="";
							}
							$sql = mysql_query("
												SELECT * FROM tab_quebra_cab  
												WHERE data_cad BETWEEN ('$data1') AND ('$data2')
												$tipo
												$loja
												LIMIT 1000
											  ");
							$cont = mysql_num_rows($sql);
							while($linha = mysql_fetch_array($sql)){
							$id_loja = $linha['id'];
							$total_quebra = 0;
							$custo_tot = 0;
							$venda_tot = 0;
							
								$sql_prod = mysql_query("SELECT * 
											FROM tab_quebra_prod  
											WHERE id_cab ='$id_loja'
											ORDER BY descricao_prod");
								while($linha_prod = mysql_fetch_array($sql_prod)){ 
									$total_quebra = $total_quebra + $linha_prod['quebra'];
									$custo_prod = $linha_prod['custo'] * $linha_prod['quebra'];
									$custo_tot = $custo_tot + $custo_prod;
									$venda_prod = $linha_prod['venda'] * $linha_prod['quebra'];
									$venda_tot = $venda_tot + $venda_prod;
								}
								$total_quebra_consulta = $total_quebra_consulta + $total_quebra;
								$total_custo_consulta = $total_custo_consulta + $custo_tot;
								$total_venda_consulta = $total_venda_consulta + $venda_tot;
							?>
							<tr>
								<td>
									<div class="row">
										<div class="col col-4">
										<? if ($filt_quebra_exclui == 1){?>
											<label class="checkbox state-success">
												<input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>"><i></i>
											</label>
										<? }?>		
										</div>
										<div class="col col-8">
										<? if ($filt_quebra_consulta == 1){?>
											<a href="quebra.php?pg=alt&id=<? echo $linha['id']; ?>">
												<label type="button" class="btn btn-warning btn-sm rounded-2x">
														<i class="glyphicon glyphicon-search" title="ATUALIZA lISTA"></i>
												</label>
											</a>
										<? }?>			
										</div>
									</div>
								</td>
								<td><? echo converte_data($linha['data_cad'])." - ".$linha['hora_cad']?></td>
								<td><? echo busca_nome_mercado($linha['id_mercado_cad']);?></td>
								<td><? echo number_format($total_quebra,2,",",".")." KG";?></td>
								<td><? echo " R$".number_format($custo_tot,2,",",".");?></td>
								<td><? echo " R$".number_format($venda_tot,2,",",".");?></td>
								<td>
									<?switch($linha['tipo']){
										case 2:
											echo "Quebra";
										break;
										case 1:
											echo "Inventário";
										break;
										default:	
											echo "Erro Tipo não identificado.";
										break;
									}?>
								</td>
							</tr>
						<? }?>
					</tbody>
				</table>
			</fieldset> 
			<fieldset>
				<div class="panel panel-sea margin-bottom-40">
					<div class="panel-heading col-md-12">
						<button type="submit" class="btn btn-danger btn-sm rounded-2x glyphicon glyphicon-trash"></button>
					</div>
				</div>
			</fieldset>
			<fieldset>
			<div class="row alert alert-warning fade in margin-bottom-40">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<div class="row">
					<label class="col col-5">
					</label>
					<label class="col col-2">
						Resumo
					</label>
					<label class="col col-5">
					</label>
				</div>
				<div class="row">
					<label class="col col-3">
						<? echo $qt." Itens ";?>
					</label>		
					<label class="col col-3">
						<? echo "Total Quebra: ".$total_quebra_consulta." KG";?>
					</label>		
					<label class="col col-3">
						<? echo "Total Custo R$ ".number_format($total_custo_consulta,2,",",".");?>
					</label>		
					<label class="col col-3">
						<? echo "Total Venda R$ ".number_format($total_venda_consulta,2,",",".");?>
					</label>		
				</div>
			</div>
		</fieldset>
		</form>
	</div>
<? }?>
<!-- ********************************************************************************************************************* 
											 Fim Consulta 
************************************************************************************************************************-->
<!-- ********************************************************************************************************************* 
											 Relatório Quebra  
************************************************************************************************************************-->
<? if ($pg =="rel" and $filt_quebra_consulta == 1) {//Consulta Temperatura Camaras ?>

	<div class="container content">
		<form method="post" action="rel_quebra.php" id="sky-form4" class="sky-form">
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
				<section>
					<div class="row">
						<div class="col col-4">
							<label>Relatório</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="opcao_grupo" size="1">
									<option value="" selected="selected">Padrão</option>
									<option value="2" >Produto</option>
								</select>
							</label>
						</div>	
						<div class="col col-4">
							<label>Tipo</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="tipo" size="1">
									<option value="" selected="selected">Todas</option>
									<option value="2" >Quebra</option>
									<option value="1" >Inventário</option>
								</select>
							</label>
						</div>	
						<div class="col col-4">
							<label>Loja</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="cod_mercado" size="1"  id="filt_mercado">
									<option value="" multiple>Todos</option>
									<? 
									
									
									//Conexão com banco puxar usuário único
									$sql_filtro = mysql_query("SELECT DISTINCT id_mercado_cad  FROM tab_quebra_cab ORDER BY id_mercado_cad ");
									$cont_filtro = mysql_num_rows($sql_filtro);
									while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
									$id_mercado_cad = $linha_filtro['id_mercado_cad'];
									?>
										<option value="<? echo $id_mercado_cad?>" multiple>
											<? echo utf8_decode(busca_nome_mercado($linha_filtro['id_mercado_cad'])) ?>
										</option>
									<? }?>
								</select>
							</label>
						</div>
					</div>
				</section>
				<section>
					<div class="row">
						<div class="col col-6">
							<label>Produto</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="produto" size="1"  id="filt_mercado">
									<option value="" multiple>Todos</option>
									<? //Conexão com banco puxar Produtos únicos
									$sql_prod = mysql_query("SELECT DISTINCT cod_prod, descricao_prod  FROM tab_quebra_prod  ORDER BY cod_prod ");
									$cont_prdo = mysql_num_rows($sql_prod);
									while($linha_prod = mysql_fetch_array($sql_prod)){ 
										$cod_prod = $linha_prod['cod_prod'];
										?>
										<option value="<? echo $cod_prod ?>" multiple>
											<? echo utf8_encode($linha_prod['descricao_prod']) ?>
										</option>
									<? }?>
								</select>
							</label>
						</div>	
						<div class="col col-6">
							<label>Loja</label>
							<label class="select">
								<i class="icon-append fa fa-calendar"></i>
								<select name="cod_mercado" size="1"  id="filt_mercado">
									<option value="" multiple>Todos</option>
									<? 
									
									
									//Conexão com banco puxar usuário único
									$sql_filtro = mysql_query("SELECT DISTINCT id_mercado_cad  FROM tab_quebra_cab ORDER BY id_mercado_cad ");
									$cont_filtro = mysql_num_rows($sql_filtro);
									while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
									$id_mercado_cad = $linha_filtro['id_mercado_cad'];
									?>
										<option value="<? echo $id_mercado_cad?>" multiple>
											<? echo utf8_decode(busca_nome_mercado($linha_filtro['id_mercado_cad'])) ?>
										</option>
									<? }?>
								</select>
							</label>
						</div>
					</div>
				</section>	
				<section>
					<div class="row">
						<div class="col col-6">
							<label>E-mail</label>
							<label class="input">
								<i class="icon-append glyphicon glyphicon-envelope"></i>
								<input type="email" name="end_email" >
							</label>
						</div>	
						<div class="col col-6">
							<label>Loja</label>
							<label class="textarea">
								<i class="icon-append glyphicon glyphicon-comment"></i>
								<textarea name="msg_email"  maxlength="500" ></textarea>
							</label>
						</div>
					</div>
				</section>				
			</fieldset> 
			<footer>
					<button type="submit" class="btn-u  icon  icon-magnifier"> Gerar </button>
            </footer>
		</form>
	</div>
<? }?>
<!-- ********************************************************************************************************************* 
											 Fim Relatório Quebra 
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