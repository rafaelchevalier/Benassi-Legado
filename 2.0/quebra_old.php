<? session_start();
require ("include/verifica.php");
require ("include/funcoes.php");
$pg = $_REQUEST['pg'];
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
			<h1 class="pull-left">Controle de Quebra / Inventário</h1>
			<ul class="pull-right breadcrumb">			
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
	</div>
<? }?>
<!-- ********************************************************************************************************************* 
											 Fim Cadastro 
************************************************************************************************************************-->
<!-- ********************************************************************************************************************* 
											 Altera 
************************************************************************************************************************-->
<?	if ($pg =="alt" and $filt_quebra_consulta == 1) { 

	if(!empty($_GET['id'] ))
		{$id_quebra_cab = $_GET['id']; }
	else {
		echo"

			<script type=\"text/javascript\">	
				alert(\"Quebra/Inventário não identificar, você será redirecionado para página anterior\");
				history.go(-1);
			</script>
		";
	}
?>

<div class="container content">
	<form method="post" action="include/quebra.php?funcao=alt" id="sky-form4" class="sky-form">
		<? // Consulta cabeçalho
		$sql_cab = mysql_query("SELECT * FROM tab_quebra_cab  
								WHERE id='$id_quebra_cab'
								LIMIT  1");
		while($linha = mysql_fetch_array($sql_cab)){ 
		$obs = $linha['obs'];
		
		?>	
			<fieldset> 
				<div class="row">
					<section class="col col-3">
						<label>Tipo</label>
						<label class="select">
							<i class="icon-append fa fa-asterisk"></i>
							<select name="tipo">
								<option value="2" <? if($linha['tipo'] == 2){?> selected <? }?> >Quebra</option>
								<option value="1" <? if($linha['tipo'] == 1){?> selected <? }?>>Inventário</option>
							</select>								
						</label>
					</section>
					<section class="col col-3">
						<input type="hidden" name="id_quebra_cab" size="6" maxlength="10" readonly="readonly" value="<? echo $id_quebra_cab?>"/>
						<label>Data</label>
						<label class="input">
							<i class="icon-append fa fa-calendar"></i>
							<input type="text" name="data" id="date" value="<? echo converte_data($linha['data_cad'])?>" onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Chegada Carrinhos" title="Data Inicial">
						</label>
					</section>
					<section class="col col-6">
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
						<th class="col-md-1">Quebra/Inventário em KG</th>
						<th class="col-md-1">Custo KG</th>
						<th class="col-md-1">Custo Total</th>
						<th class="col-md-1">Venda KG</th>
						<th class="col-md-1">Venda Total</th>							
					</tr>
				</thead>
				<tbody>
					<?
					$total_quebra=0;
					$custo_tot=0;
					$venda_tot =0;
					$qt=0;
					$sql_prod = mysql_query
					("
						SELECT * 
						FROM 
							tab_quebra_prod  
						WHERE 
							id_cab ='$id_quebra_cab'
						ORDER BY 
							descricao_prod
						LIMIT 500
					");
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
									<input type="hidden" name="id_produto<? echo $qt; ?>"value="<? echo $linha_prod['id']; ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
									<input type="hidden" name="cod_produto<? echo $qt; ?>"value="<? echo $linha_prod['cod_prod']; ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
									<? echo $linha_prod['cod_prod']; ?>									
								</td>
								<td>
									<input type="hidden" name="nome_produto<? echo $qt; ?>"value="<? echo utf8_decode($linha_prod['descricao_prod']); ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
									<? echo utf8_encode($linha_prod['descricao_prod']); ?>
								</td>
								<td>
									<input type="text" size="5" maxlength="5" name="quebra<? echo $qt;?>" value="<? echo $linha_prod['quebra']?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
									<? //echo $linha_prod['quebra']; ?>
								</td>
								<td>
									<input type="text" size="5" maxlength="5" name="custo<? echo $qt;?>" value="<? echo $linha_prod['custo']?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
									<? //echo "R$ ".number_format($linha_prod['custo'],2,",","."); ?>
								</td>
								<td>
									<input type="hidden" size="5" maxlength="5" name="custo_tot<? echo $qt;?>" value="<? echo $linha_prod['quebra']?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
									<? echo "R$ ".number_format($custo_prod,2,",","."); ?>
								</td>
								<td>
									<input type="text" size="5" maxlength="5" name="venda<? echo $qt;?>" value="<? echo $linha_prod['venda']?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
									<? //echo "R$ ".number_format($linha_prod['venda'],2,",","."); ?>
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
		<button type="submit" class="btn-u btn-u-green rounded-2x">
			<i class="icon-pencil">Alterar</i>
		</button>
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
							<th class="col-md-3">OPÇÕES</th>
							<th class="col-md-2">DATA</th>
							<th class="col-md-3">MERCADO</th>
							<th class="col-md-1">TOT. QUEBRA/Inventário</th>
							<th class="col-md-1">TOT. CUSTO</th>
							<th class="col-md-1">TOT. VENDA</th>
							<th class="col-md-1">TIPO</th>
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
												SELECT 
													* 
												FROM 
													tab_quebra_cab  
												WHERE 
													data_cad BETWEEN ('$data1') AND ('$data2')
													$tipo
													$loja
												LIMIT 1000
											  ");
							$cont = mysql_num_rows($sql);
							while($linha = mysql_fetch_array($sql)){
							$id_loja = $linha['id'];
							$tipo = $linha['tipo'];
							$id_quebra = $linha['id'];
							$id_mercado_cad = $linha['id_mercado_cad'];
							$total_quebra = 0;
							$custo_tot = 0;
							$venda_tot = 0;
							
								$sql_prod = mysql_query
									("
										SELECT * 
										FROM 
											tab_quebra_prod  
										WHERE 
											id_cab ='$id_loja'
										ORDER BY 
											descricao_prod
										LIMIT 1000
									");
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
													<i class="glyphicon glyphicon-search" title="Consulta Lançamento"></i>
												</label>
											</a>
											<a href="quebra.php?pg=atualiza_custo&id_quebra=<? echo $id_quebra; ?>&id_mercado_cad=<? echo $id_mercado_cad; ?>&tipo=<? echo $tipo; ?>">
												<label type="button" class="btn btn-warning btn-sm rounded-2x" data-toggle="modal" data-target="#modal_altera_custo">
													<i class="fa fa-exchange" title="Altera Custo Puxando de qualquer tabela de MIX "></i>
												</label>
											</a>
											<a href="quebra.php?pg=altera_cabecalho_produtos&id_quebra=<? echo $id_quebra; ?>&id_mercado_cad=<? echo $id_mercado_cad; ?>&tipo=<? echo $tipo; ?>">
												<label type="button" class="btn btn-warning btn-sm rounded-2x">
													<i class="fa fa-exchange" title="Unifica Lançamento"></i>
												</label>
											</a>
											<!--
											<label class="btn btn-warning btn-sm rounded-2x" data-toggle="modal" data-target="#modal_altera_custo">
												<i class="fa fa-exchange" title="ATUALIZA lISTA"></i>
											</label>
											-->
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
<? if($pg == "atualiza_custo" and $filt_quebra_consulta == 1)
{
	$id_mercado_cad = $_REQUEST['id_mercado_cad'];
	$tipo 			= $_REQUEST['tipo'];
	$id_quebra		= $_REQUEST['id_quebra'];
	
?>
	<!-- ********************************************************************************
									MODAL_ALTERA_CUSTO 
	********************************************************************************* -->
	<div class="container content">
		<form method="post" action="include/quebra.php?funcao=atualiza_custo_tab_mix&id_quebra_prod=<? echo $id_quebra?>" id="sky-form4" class="sky-form">
			<fieldset> 
				<div class="row">
					<section class="col col-1">
					</section>
					<section class="col col-10">
						<p>Selecione a tabela que deseja puxar custos.</p>
					</section>
					<section class="col col-1">
					</section>
				</div>
				<div class="row">
					<section class="col col-1">
					</section>
					<section class="col col-10">
						<p>Mercado: <? echo busca_nome_mercado($id_mercado_cad);?></p>
						<p>
							<?switch($tipo){
								case 2:
									echo "Quebra";
								break;
								case 1:
									echo "Inventário";
								break;
								default:	
									echo "Erro Tipo não identificado.";
								break;
							}
							echo ": ".$id_quebra;
							?>
						</p>
					</section>
					<section class="col col-1">
					</section>
				</div>
				<div class="row">
					<section class="col col-1">
					</section>
					<section class="col col-10">
						<label>Tabela</label>
						<label class="select">
							<i class="icon-append fa fa-asterisk"></i>
							<select name="id_mix" id="id_mix">
								<?
								$sql = mysql_query("SELECT * FROM tab_mix_produtos_cab ORDER BY descricao_tab LIMIT 1000");
								while($linha = mysql_fetch_array($sql)){ 
								?>
									<option value="<? echo $linha['id']?>"><? echo utf8_encode($linha['descricao_tab'])." - ".$linha['cod_tab'];?></option>
								<? } ?>
							</select>
						</label>
					</section>
					<section class="col col-1">
					</section>
				</div>
			</fieldset>
			<fieldset>
				<button class="btn-u" type="submit">Atualizar</button>
			</fieldset>
		</form>
	</div>


<? 
}
?>

<!-- ********************************************************************************
									Unifica dois Lançamento
********************************************************************************* -->
<? if($pg == "altera_cabecalho_produtos" and $filt_quebra_consulta == 1)
{
	$id_mercado_cad = mysql_query("SELECT id_mercado_cad FROM tab_quebra_cab WHERE id='$id_quebra'");
	$tipo 			= $_REQUEST['tipo'];
	$id_quebra		= $_REQUEST['id_quebra'];
	//$data_cad 		= mysql_query("select data_cad from tab_quebra_prod where id='$id_quebra'");
?>
<!-- ********************************************************************************
								MODAL_ALTERA_CUSTO 
********************************************************************************* -->
	<div class="container content">
		<form method="post" action="include/quebra.php?funcao=altera_cabecalho_produtos&d=<? echo $id_quebra?>" id="sky-form4" class="sky-form">
			<fieldset> 
				<div class="row">
					<section class="col col-1">
					</section>
					<section class="col col-10">
						<p>Origem.</p>
					</section>
					<section class="col col-1">
					</section>
				</div>
				<div class="row">
					<section class="col col-1">
					</section>
					<section class="col col-10">
						<p>Mercado: <? echo busca_nome_mercado($id_mercado_cad);?></p>
						<p>
							<?switch($tipo){
								case 2:
									echo "Quebra";
								break;
								case 1:
									echo "Inventário";
								break;
								default:	
									echo "Erro Tipo não identificado.";
								break;
							}
							echo ": ".$id_quebra;
							?>
						</p>
					</section>
					<section class="col col-1">
					</section>
				</div>
				<div class="row">
					<section class="col col-1">
					</section>
					<section class="col col-10">
						<label>Tabela</label>
						<label class="select">
							<i class="icon-append fa fa-asterisk"></i>
							<select name="o" id="o">
								<?
								$sql = mysql_query("SELECT * FROM tab_quebra_cab 
									WHERE 
										data_cad = (SELECT data_cad FROM tab_quebra_cab WHERE id='$id_quebra') 
									AND 
										id_mercado_cad = (SELECT id_mercado_cad FROM tab_quebra_cab WHERE id='$id_quebra')
									AND 
										tipo = (SELECT tipo FROM tab_quebra_cab WHERE id='$id_quebra')
									AND
										id<>'$id_quebra'
									LIMIT 100");
								while($linha = mysql_fetch_array($sql)){ 
								?>
									<option value="<? echo $linha['id']?>"><? echo "Cod: ". $linha['id'] ." - ".utf8_encode(busca_nome_mercado($linha['id_mercado_cad']));?></option>
								<? } ?>
							</select>
						</label>
					</section>
					<section class="col col-1">
					</section>
				</div>
			</fieldset>
			<fieldset>
				<button class="btn-u" type="submit">Atualizar</button>
			</fieldset>
		</form>
	</div>
<? } ?>
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
<!-- ********************************************************************************************************************* 
											Copia tabela  
************************************************************************************************************************-->
<?	if($pg == "copiaPrecoTabela" /* and $filt_quebra_consulta == 1*/) 
{ 
	require "include/conexao.php";
?>
	<div class="container content">
		<div class="panel panel-sea margin-bottom-12">
			<div class="panel-heading col-md-12">
				<span class="panel-title ">
				 Copia Preço Tabela MIX
				</span>
			</div>
			<form method="post" action="include/quebra.php?funcao=copiaTabela" id="sky-form4" class="sky-form">
				<fieldset> 
					<div class="row">
						<section class="col col-6">
							<label>Origem</label>
							<label class="select">
								<i class="icon-append fa fa-asterisk"></i>
								<select name="o" id="o">
									<? // Consulta
									$sql_cab = mysql_query("SELECT * FROM tab_mix_produtos_cab");
									while($linha = mysql_fetch_array($sql_cab)){ ?>
									<option value="<? $linha['id']?>">
										<? echo $linha['cod_tab']." - ".utf8_encode($linha['descricao_tab'])?>
									</option>
									<?}?>
								</select>
							</label>
						</section>
						<section class="col col-6">
							<label>Destino</label>
							<label class="select">
								<i class="icon-append fa fa-asterisk"></i>
								<select name="d" id="d">
									<? // Consulta
									$sql_cab = mysql_query("SELECT * FROM tab_mix_produtos_cab");
									while($linha = mysql_fetch_array($sql_cab)){ ?>
										<option value="<? $linha['id']?>">
											<? echo $linha['cod_tab']." - ".utf8_encode($linha['descricao_tab'])?>
										</option>
									<? }?>
								</select>
							</label>
						</section>
					</div>
				</fieldset>
				<footer>
					<button type="submit" class="btn-u rounded-2x  icon  icon-magnifier"> Copiar </button>
				</footer>
			</form>
		</div>
	</div>
<? }?>
<!-- ********************************************************************************************************************* 
											 Fim Copia tabela MIX
************************************************************************************************************************-->
<!-- ********************************************************************************************************************* 
											Copia Custo e venda de quebra  
************************************************************************************************************************-->
<?	if($pg == "copiaPrecoQuebra" /* and $filt_quebra_consulta == 1*/) 
{ 
	require "include/conexao.php";
?>
	<div class="container content">
		<div class="panel panel-sea margin-bottom-12">
			<div class="panel-heading col-md-12">
				<span class="panel-title ">
				 Copia Preço Tabela MIX
				</span>
			</div>
			<form method="post" action="" id="sky-form4" class="sky-form">
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
				<footer>
					<button type="submit" class="btn-u rounded-2x  icon  icon-magnifier"> Atualiza Período </button>
				</footer>
			</form>
		</div>
	</div>
	<? if($_REQUEST['data1'] != "" AND $_REQUEST['data2'])	
	{
	$data1 = converte_data($_REQUEST['data1']);
	$data2 = converte_data($_REQUEST['data2']);
	?>
		<div class="container content">
			<div class="panel panel-sea margin-bottom-12">
				<div class="panel-heading col-md-12">
					<span class="panel-title ">
					 Copia Custo e venda Quebra/Inventátio
					</span>
				</div>
				<form method="post" action="include/quebra.php?funcao=copiaQuebra" id="sky-form4" class="sky-form">
					<fieldset> 
						<div class="row">
							<section class="col col-6">
								<label>Origem</label>
								<label class="select">
									<i class="icon-append fa fa-asterisk"></i>
									<select name="o" id="o">
										<? // Consulta
										$sql_cab = mysql_query("SELECT * FROM tab_quebra_cab WHERE data_cad BETWEEN ('$data1') AND ('$data2')");
										while($linha = mysql_fetch_array($sql_cab)){ ?>
										<option value="<? $linha['id']?>">
											<? echo $linha['id']." - ".busca_nome_mercado($linha['id_mercado_cad'])?>
										</option>
										<?}?>
									</select>
								</label>
							</section>
							<section class="col col-6">
								<label>Destino</label>
								<label class="select">
									<i class="icon-append fa fa-asterisk"></i>
									<select name="d" id="d">
										<? // Consulta
										$sql_cab = mysql_query("SELECT * FROM tab_quebra_cab WHERE data_cad BETWEEN ('$data1') AND ('$data2')");
										while($linha = mysql_fetch_array($sql_cab)){ ?>
											<option value="<? $linha['id']?>">
												<? echo $linha['id']." - ".busca_nome_mercado($linha['id_mercado_cad'])?>
											</option>
										<? }?>
									</select>
								</label>
							</section>
						</div>
					</fieldset>
					<footer>
						<button type="submit" class="btn-u rounded-2x  icon  icon-magnifier"> Copiar </button>
					</footer>
				</form>
			</div>
		</div>
	<? }?>
<? }?>
<!-- ********************************************************************************************************************* 
											 Fim Custo e venda de quebra
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