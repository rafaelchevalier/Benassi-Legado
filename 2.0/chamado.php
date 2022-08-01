<? session_start();
require"include/verifica.php";// MÓDULO QUE VERIFICA SE O USUÁRIO ENCONTRA-SE LOGADA PARA ACESSO RESTRITO (PADRÃO EM PÁGINAS INTERNAR RESTRITAS)
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
	
	<link rel="stylesheet" href="assets/cleditor/jquery.cleditor.css" /><!-- Necessário para funcionamento do editor. -->
    
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
				<h1 class="pull-left">Chamado </h1>
				<ul class="pull-right breadcrumb">
					<li><a href="?pg=abre_chamado"><i class="fa fa-plus"></i> Abre Chamado</a></li>
					<li><a href="?pg=consulta"><i class="fa fa-eye"></i> Consulta</a></li>
				</ul>
			</div>
		</div>
		<!-- Fim Cabeçalho Conteudo -->

	
<!-- ************************************************************************************************************************************* 
											ABRE CHAMADO
					FORMULÁRIO DE ABERTURA DE CHAMADOS PARA OS COLABORADORES. 
****************************************************************************************************************************************** -->
	<? if ($pg == "abre_chamado" and $filt_chamado_inclui == "1") {//Abertura de Chamado?>
	<div class="container content">
		<!-- Login-Form -->
        <div class="col-md-20">
            <form id="sky-form4" class="sky-form" method="post" action="include/chamado.php?funcao=abre_chamado" >
                <header>Abre Chamado</header>            
                <fieldset>    
					<section>
						<div class="row">
							<label class="label col col-4">Nome Completo</label>
                            <div class="col col-8">
								<? //Nesse teste o usuário não pode ser trocado, sempre puxa o usuário logado.
									if ($filt_chamado_ti != 1){ 
								?>
									<label class="input">
										<i class="icon-append fa fa-user"></i>
										<input type="text" name="nome_apenas_exibe" value="<? echo utf8_encode($nome_usuario_logado);?>" disabled/>
										<input type="hidden" name="nome" value="<? echo $_SESSION['id_usuario'];?>" readonly="readonly"  />
									</label>
								<? }?>
								<? //Nesse caso o uruário tem permissão para abrir chamado para qualquer usuário cadastrado e ativo
								if($filt_chamado_ti == 1){ 
								?>
									<label class="select">
										<select name="nome" size="1" id="nome">
										<?
										//Varre o banco, procurando todos os usuários cadastrados
										//$sql_filtro = mysql_query("SELECT DISTINCT id,nome FROM login ORDER BY nome ");
										$sql_filtro = mysql_query("SELECT id,nome FROM login ORDER BY nome ");
										$cont_filtro = mysql_num_rows($sql_filtro);
										while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
											if ($linha_filtro['nome'] != ""){?>
												<option value="<? echo $linha_filtro['id'] ?>"<? if ($_SESSION['id_usuario'] == $linha_filtro['id']){?> selected="selected" <? }?> multiple ><? echo utf8_encode($linha_filtro['nome']) ?></option>
										   <? }
										}?>
										</select> 
										<i class="icon-append"></i>
									</label>
								<? }?>  
                            </div>
                        </div>
                    </section> 
					<section>
						<div class="row">
							<label class="label col col-4">Tipo Chamado</label>
                            <div class="col col-8">
								<label class="select">
									<select name="categoria" required id="categoria">
										<option value="">Selecione Uma Categoria</option>
										<option value="NFE">Nota Fiscal</option>
										<option value="Relogio de Ponto">Relógio de Ponto</option>
										<option value="e-mail">E-mail</option>
										<option value="impressora">Impressora</option>
										<option value="computador">Computador</option>
										<option value="rederede">Rede</option>
										<option value="mysoft">Sistema - MySoft</option>
										<option value="rm">Sistema - RM</option>
										<option value="spark">SPARK</option>
										<option value="solicitacoes">SOLICITAÇÕES</option>
										<option value="outros">OUTROS</option>
										<option value="cadastros">Cadastros</option>
									</select>
									<i class="icon-append"></i>
                                </label>
                            </div>
                        </div>
                    </section>        
					<section>
						<div class="row">
							<label class="label col col-4">Local Atendimento</label>
                            <div class="col col-8">
								<label class="select">
									<select name="local" required size="1"> 
										<option value="">Selecione Empresa para Atendimento</option>
										<? //Procura no banco lojas cadastradas na tabela "lojas"  
										require "include/conexao.php";
										$sql_login = mysql_query("SELECT * FROM lojas ORDER BY loja");
										$cont2 = mysql_num_rows($sql_login);
										while($linha2 = mysql_fetch_array($sql_login)){	
										?>									 								
											<option value="<? echo $linha2['loja'] ?>" onChange="<? $mercado = $linha2['loja']; ?>"> <? echo $linha2['loja'] ?></option>  
										<? }?>
									</select>
									<i class="icon-append"></i>
                                </label>
                            </div>
                        </div>
                    </section> 
					<section>
						<div class="row">
							<label class="label col col-4">Descrição</label>
                            <div class="col col-8">
								<label>
									<i class="icon-append fa fa-envelope"></i>
									<textarea id="cleditor" name="descricao" cols="26" rows="10" required></textarea>
                                </label>
                            </div>
                        </div>
                    </section>
				</fieldset>
                <footer> 
					<button type="submit" class="btn-u btn-u-green rounded-2x"><i class="icon-pencil"> Confirmar</i></button>
                </footer>
            </form>         
		</div>	
	</div>
	 <textarea id="input" name="input"></textarea>
	<? }?>
	<script>
        $(document).ready(function () { $("#input").cleditor(); });
    </script>
<!-- ************************************************************************************************************************************* 
											FIM ABRE CHAMADO
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											FECHA CHAMADOS
									FORMULÁRIO PARA FECHAR CHAMADO
****************************************************************************************************************************************** --> 
	<? 
	if ( $pg == "fecha_chamado") {//Fecha Chamado aberto
	$id = $_GET['id'];
	require "include/conexao.php";
	$sql = mysql_query("SELECT * FROM chamado Where id='$id' ");
	$cont = mysql_num_rows($sql);
	while($linha = mysql_fetch_array($sql)){	
	?>
		<div class="container content">
			<!-- Login-Form -->
			<div class="col-md-12">
				<form method="post" action="include/chamado.php?funcao=fecha_chamado&id=<? echo $id ?>" id="sky-form4" class="sky-form">
					<header>Finaliza Chamado</header>            
					<fieldset> 
						<section>
							<div class="row">
								<div class="col col-12">
									<label class="input">
										<span class="heading-md">
											Nome Técnico: <? echo utf8_encode($nome_usuario_logado)?>
										</span>
									</label>
								</div>
							</div>
						</section>  
						<section>
							<div class="row">
								<div class="col col-6">
									<label class="input">
										<span class="heading-md">
											<input type="hidden" name="nome_tecnico" id="nome_tecnico" value="<? echo utf8_encode($nome_usuario_logado)?>" readonly="readonly"  />
											<input type="hidden" name="email_usuario" id="email_usuario" value="<? echo $linha['email'];?>" readonly="readonly"  />
											<input type="hidden" name="num_chamado" id="num_chamado" value="<? echo $linha['id'];?>"readonly="readonly"  />
											<input type="hidden" name="nome_usuario" id="nome_usuario" value="<? echo $linha['nome_usuario'];?>" readonly="readonly"  />
										
											Chamado Aberto <br />
											Data: <? echo converte_data($linha['data_cad'])?> <br /> 
											Hora: <? echo $linha['hora_cad']?><br />
											Por: <? echo $linha['nome_usuario']?> 
										</span>
										
									</label>
								</div>
								<div class="col col-6">
									<label class="input">
										<span class="heading-md">
											<? if ($linha['solucao'] == 'Pendente'){?>
												Última alteração <br />
												Data: <? echo converte_data($linha['data_atendimento'])?> <br /> 
												Hora: <? echo $linha['hora_atendimento']?><br />
												Atendido por: <? echo utf8_encode($linha['atendido_por']);?>
											<? }?>
										</span>
									</label>
								</div>
							</div>
							<hr class="devider devider-db">
						</section>
						<section>
							<div class="row">
								<label class="label col col-4">
									<h4 class="heading-md">Descrição Chamado</h4>
								</label>
								<div class="col col-8">
									<label class="input">
									<? if ($filt_chamado_fecha == "1" || $nome_usuario_logado != $linha['nome_usuario']){?>
										<h4 class="heading-md">
										
										<textarea id="cleditor" readonly name="descricao" cols="26" rows="10" required><? echo utf8_encode($linha['descricao'])?></textarea>
										
										</h4>
									</label>
									<? }?>
									<? if ($filt_chamado_fecha != "1" and $nome_usuario_logado == $linha['nome_usuario']){?>
									<label class="textarea">
										<textarea id="cleditor" readonly name="descricao" cols="26" rows="10" required><? echo utf8_encode($linha['descricao'])?></textarea>
									</label>
									<? }?>
								</div>
							</div>
							<hr class="devider devider-db">
						</section>
						<section>
							<div class="row">
								<label class="label col col-4">Solução</label>
								<div class="col col-8">
									<? if ($filt_chamado_fecha == "1" || $nome_usuario_logado != $linha['nome_usuario']){?>
									<label class="textarea">
										<i class="icon-append fa fa-envelope"></i>
										<textarea id="cleditor2" readonly name="detalhe" cols="26" rows="10" required><? echo utf8_encode($linha['detalhe'])?></textarea>
									</label>
									<? }?>
									<? if ($filt_chamado_fecha != "1" and $nome_usuario_logado == $linha['nome_usuario']){?>
										<h4 class="heading-md">
										<? echo utf8_encode($linha['detalhe'])?>
										</h4>
									</label>
									<? }?>
								</div>
							</div>
						</section>
						<section>
							<div class="row">
								<label class="label col col-4">Situação</label>
								<div class="col col-8">
									<label class="select">
										<i class="icon-append fa fa-lock"></i>
										<select name="solucao" id="solucao">
										<? if ($filt_chamado_fecha == "1"){?>
											<option value="Concluido" selected="selected">Concluido</option>
											<option value="Não Concluido">Não Concluido</option>
											<option value="Em Andamento">Em Andamento</option>
											<option value="Pendente">Pendente</option>
											<option value="ABERTO">Aberto</option>
											<option value="REJEITADO">REJEITADO</option>
										<? }?>
										<? if ($nome_usuario_logado == $linha['nome_usuario']){?>
											<option value="RESPONDIDO" selected="selected">RESPONDIDO</option>
											<option value="Concluido" selected="selected">Concluido</option>
										<? }?>
										</select>
									</label>
								</div>
							</div>
						</section>
						
					</fieldset>
					<footer>
						<button type="submit" class="btn-u">Alterar</button>
						<input type="button" class="btn-u btn-u-default" value="Voltar" onClick="history.go(-1)"> 
					</footer>
				</form>         
			</div>	
		</div>
		<? }?>
	<? }?>
<!-- ************************************************************************************************************************************* 
										FIM FECHA CHAMADOS
****************************************************************************************************************************************** --> 
<!-- ************************************************************************************************************************************* 
											EXIBE CHAMADOS ABERTOS TODOS 
EXIBE TODOS OS CHAMADOS QUE NA COLUNA (SITUAÇÃO DA TABELA CHAMADO) IGUAL A ABERTO DE TODOS OS USUÁRIOS
****************************************************************************************************************************************** -->
<? 
if ($pg == "consulta" and $filt_chamado_rel_aberto = "1") {//Abertura de Chamado 
$data_atual = date("d/m/Y");
  require"include/conexao.php";
?>
<!-- tabela filtros-->
<div class="col-md-12">
            <form method="post" action="chamado.php?pg=consulta" id="sky-form4" class="sky-form">
                <header>Filtros </header>            
                <fieldset>      
					<section>
						<div class="row">
							<label class="label col col-1">Período</label>
							<label class="radio label col col-1">
								<label>Sim</label>
								<input type="radio" name="ativa_periodo" <? if($_REQUEST['ativa_periodo'] == "1" )echo "checked"?> value="1"><i class="rounded-x"></i>
							</label>
							<label class="radio label col col-1">
								<label>Não</label>
								<input type="radio" name="ativa_periodo" <? if($_REQUEST['ativa_periodo'] != "1" )echo "checked"?> value=""><i class="rounded-x"></i>
							</label>
							<div class="col col-4">
								<label class="input">
									<i class="icon-append fa fa-calendar"></i>
									<input type="text" name="data1" id="start" value="<? if (!empty($_REQUEST['data1'])){echo $_REQUEST['data1'];}if (empty($_REQUEST['data1'])){echo converte_data($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Chegada Carrinhos" title="Data Inicial">
								</label>
							</div>	
							<div class="col col-4">
								<label class="input">
									<i class="icon-append fa fa-calendar"></i>
									<input type="text" name="data2" id="finish"  value="<? if (!empty($_REQUEST['data2'])){echo $_REQUEST['data2'];}if (empty($_REQUEST['data2'])){echo converte_data($data_atual);}?>" required onkeypress="autoTab(this, event); return event.keyCode != 13;" placeholder="Data Chegada Carrinhos" title="Data Final">
								</label>
							</div>
						</div>
                    </section> 
				</fieldset>  
				<fieldset>  
					<? if ($filt_chamado_rel_aberto_completo == '1'){//Filtro para mostrar apenas o usuário que estiver logado quando ele não tiver perfil para consultar todos. ?>
						<section>
							<div class="row">
								<label class="label col col-1">Técnico</label>
								<label class="radio label col col-1">
									<label>Sim</label>
									<input type="radio" name="Filt_tecnico" <? if($_REQUEST['Filt_tecnico'] == "1" )echo "checked"?> value="1"><i class="rounded-x"></i>
								</label>
								<label class="radio label col col-1">
									<label>Não</label>
									<input type="radio" name="Filt_tecnico" <? if($_REQUEST['Filt_tecnico'] != "1" )echo "checked"?> value=""><i class="rounded-x"></i>
								</label>
									</label>
								<div class="col col-9">
									<label class="select">
										<i class="icon-append fa fa-user"></i>
										<select name="filt_tecnico" size="1"  id="filt_tecnico">
											<option value="" multiple>Todos</option>
											<? 
											//Conexão com banco puxar usuário único
											$sql_filtro = mysql_query("SELECT DISTINCT atendido_por FROM chamado ORDER BY atendido_por ");
											$cont_filtro = mysql_num_rows($sql_filtro);
												
											while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
												if ($linha_filtro['atendido_por'] != "" ){
												?>
													<option <? if($_REQUEST['filt_tecnico'] == utf8_decode($linha_filtro['atendido_por']) ){?>selected="selected"<? }?> value="<? echo utf8_decode($linha_filtro['atendido_por']) ?>" multiple><? echo utf8_encode($linha_filtro['atendido_por']) ?></option>
												<? }
											}?>
										</select>
									</label>
								</div>
							</div>
						</section> 
					<? }?>
				</fieldset>  
				<fieldset>  
					<section>
						<div class="row">
							<label class="label col col-1">Usuário</label>
							<label class="label col col-1">
								<label class="radio">
									<input type="radio" name="opcao_filt"  value="1"><i class="rounded-x"></i>
								</label>
							</label>
							<div class="col col-10">
								<label class="select">
									<i class="icon-append fa fa-user"></i>
									<select name="filt_usuario" size="1"  id="filt_usuario">
										<? 
										//Conexão com banco puxar usuário único
										$sql_filtro = mysql_query("SELECT DISTINCT nome_usuario FROM chamado WHERE situacao = 'ABERTO'  ORDER BY nome_usuario ");
										$cont_filtro = mysql_num_rows($sql_filtro);
										while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
											if ($filt_chamado_rel_aberto_completo != '1'){//Filtro para mostrar apenas o usuário que estiver logado quando ele não tiver perfil para consultar todos.
												 if ($linha_filtro['nome_usuario'] != "" and $linha_filtro['nome_usuario'] == $nome_usuario_logado){
												 ?>
												<option value="<? echo utf8_decode($linha_filtro['nome_usuario']) ?>" multiple><? echo utf8_encode($linha_filtro['nome_usuario']) ?></option>
											<? }
											}
											if ($filt_chamado_rel_aberto_completo == '1'){//Filtro para mostrar apenas o usuário que estiver logado quando ele não tiver perfil para consultar todos.
												 if ($linha_filtro['nome_usuario'] != "" ){
												 ?>
												<option value="<? echo utf8_decode($linha_filtro['nome_usuario']) ?>" multiple><? echo utf8_encode($linha_filtro['nome_usuario']) ?></option>
											<? }
											}
										}?>
									</select>
                                </label>
                            </div>
                        </div>
                    </section> 
					<section>
						<div class="row">
							<label class="label col col-1">Tipo de Erro</label>
							<label class="label col col-1">
								<label class="radio">
									<input type="radio" name="opcao_filt" value="2"><i class="rounded-x"></i>
								</label>
							</label>
							<div class="col col-10">
								<label class="select">
									<i class="icon-append fa fa-user"></i>
									<select name="filt_categoria" size="1" id="filt_categoria">
										<? 
										$sql_filtro = mysql_query("SELECT DISTINCT categoria FROM chamado where situacao ='ABERTO' ORDER BY categoria ");
										$cont_filtro = mysql_num_rows($sql_filtro);
										while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
											?>
											<? if ($linha_filtro['categoria'] != ""){?>
											<option value="<? echo $linha_filtro['categoria'] ?>" multiple ><? echo utf8_encode($linha_filtro['categoria']) ?></option>
										 <? }}?>
									</select>
                                </label>
                            </div>
                        </div>
                    </section>	
				</fieldset>  
				<fieldset>  
					<section>
						<div class="row" >
							<label class="label col col-3">
								<label class="radio">
									Abertos<input type="radio" name="opcao_filt" value="3"><i class="rounded-x"></i>
								</label>
							</label>
							<label class="label col col-3">
								<label class="radio">
									Pendentes<input type="radio" name="opcao_filt" value="4"><i class="rounded-x"></i>
								</label>
							</label>
							<label class="label col col-3">
								<label class="radio">
									Em Andamento<input type="radio" name="opcao_filt" value="5"><i class="rounded-x"></i>
								</label>
							</label>
							<label class="label col col-3">
								<label class="radio">
									FInalizados<input type="radio" name="opcao_filt" value="6"><i class="rounded-x"></i>
								</label>
							</label>
                        </div>
                    </section>						
                </fieldset>
                <footer>
					<button type="submit" class="btn-u  icon  icon-magnifier"> Buscar</button>
					<button type="reset" class="btn-u  icon  icon-magnifier"> Limpa Filtros</button>
                </footer>
            </form>         
		</div>
<!-- tabela resultado-->
<div class="col-md-12">
	<div class="panel panel-blue margin-bottom-40">
		<div class="panel-heading col-md-12">
			<button class="btn btn-warning btn-sm rounded-2x" onClick="history.go(0)">
					<i class="fa fa-refresh" title="ATUALIZA lISTA"></i>
			</button>
			<span class="panel-title ">
				&nbsp;&nbsp;Chamados Abertos 
			</span>
			
        </div>
	</div>
        <table class="table table-hover table-striped">
			<thead>
				<tr >
					
					<th class="col-md-2">Opções</th>
                    <th class="col-md-1">Num.</th>
                    <th class="col-md-1">Status</th>
					<th class="col-md-1">Usuário</th>
					<th class="col-md-1">Tipo Chamado</th>
					<th class="col-md-1">Local</th>
					<th class="col-md-4">Descrição</th>
					<th class="col-md-2">data/hora</th>
				</tr>
            </thead>
			<tbody>
			<? 
				if (!empty($_REQUEST['data1']) and !empty($_REQUEST['data2']) and $_REQUEST['ativa_periodo'] == "1"){
					$filt_periodo = "AND data_cad BETWEEN ('".converte_data($_REQUEST['data1'])."') and ('".converte_data($_REQUEST['data2'])."')";
				}
				if($_REQUEST['filt_tecnico'] == "1"){
					$filt_tecnico = "AND atendido_por = '".$_REQUEST['filt_usuario']."'";
				}
				if($_REQUEST['filt_tecnico'] != "1"){
					$filt_tecnico = "";
				}
				
				switch ($_POST['opcao_filt']){// Teste qual filtro utiizado
						case '1'://FILTRA CHAMADO POR NOME DE USUÁRIO TANTO ABERTO QUANTO FECHADO
						$sql = mysql_query("SELECT * FROM chamado 
						WHERE situacao='ABERTO' 
						$filt_periodo
						AND nome_usuario LIKE ('$filt_usuario') 
						ORDER BY id DESC 
						LIMIT 1000");		
						break;
						case '2'://FILTRA CHAMADO POR CATEGORIA TANTO ABERTO QUANTO FECHADO
							if ($filt_chamado_rel_aberto_completo != '1'){//Só aparece chamado so próprio usuario.
								$sql = mysql_query("SELECT * FROM chamado 
								WHERE situacao='ABERTO'
								$filt_periodo								
								AND categoria LIKE ('$filt_categoria') 
								AND nome_usuario LIKE ('$nome_usuario_logado') 
								ORDER BY id DESC 
								LIMIT 1000");		
							}
							if ($filt_chamado_rel_aberto_completo == '1'){//Só aparece chamado so próprio usuario.
								$sql = mysql_query("SELECT * FROM chamado 
								WHERE situacao='ABERTO' 
								$filt_periodo
								AND categoria LIKE ('$filt_categoria') 
								ORDER BY id DESC 
								LIMIT 1000");		
							}
						break;
						case '3'://MOSTRA SOMENTE ABERTO
						if ($filt_chamado_rel_aberto_completo == '1'){//Só aparece chamado so próprio usuario.
							$sql = mysql_query("SELECT * FROM chamado 
							WHERE situacao='ABERTO'
							$filt_periodo
							and solucao='ABERTO'
							ORDER BY id DESC
							LIMIT 1000");		
						}
						break;
						case '4'://MOSTRA SOMENTE CHAMADO PENDENTE
						if ($filt_chamado_rel_aberto_completo != '1'){//Só aparece chamado so próprio usuario.
							$sql = mysql_query("SELECT * FROM chamado 
							WHERE situacao ='ABERTO' 
							$filt_periodo
							AND solucao='Pendente'
							AND nome_usuario LIKE ('$nome_usuario_logado') 
							ORDER BY id DESC
							LIMIT 1000");		
						}
						if ($filt_chamado_rel_aberto_completo == '1'){//Só aparece chamado so próprio usuario.
							$sql = mysql_query("SELECT * FROM chamado 
							WHERE situacao ='ABERTO' 
							$filt_periodo
							AND solucao='Pendente'
							ORDER BY id DESC
							LIMIT 1000");		
						}
						break;
						case '5'://MOSTRA SOMENTE CHAMADO Em Andamento
						if ($filt_chamado_rel_aberto_completo != '1'){//Só aparece chamado so próprio usuario.
							$sql = mysql_query("SELECT * FROM chamado 
							WHERE situacao ='ABERTO' 
							$filt_periodo
							AND solucao='andamento'
							AND nome_usuario LIKE ('$nome_usuario_logado') 
							ORDER BY id DESC
							LIMIT 1000");		
						}
						if ($filt_chamado_rel_aberto_completo == '1'){//Só aparece chamado so próprio usuario.
							$sql = mysql_query("SELECT * FROM chamado 
							WHERE situacao ='ABERTO' 
							$filt_periodo
							AND solucao='andamento'
							ORDER BY id DESC
							LIMIT 1000");		
						}
						break;
						case '6'://MOSTRA SOMENTE CHAMADO Em Andamento
						if ($filt_chamado_rel_aberto_completo != '1'){//Só aparece chamado so próprio usuario.
							$sql = mysql_query("SELECT * FROM chamado 
							WHERE situacao ='FECHADO' 
							$filt_periodo
							$filt_tecnico
							AND nome_usuario LIKE ('$nome_usuario_logado') 
							ORDER BY id DESC
							LIMIT 1000");		
						}
						if ($filt_chamado_rel_aberto_completo == '1'){//Só aparece chamado so próprio usuario.
							$sql = mysql_query("SELECT * FROM chamado 
							WHERE situacao ='FECHADO' 
							$filt_periodo
							$filt_tecnico
							ORDER BY id DESC
							LIMIT 1000");		
						}
						break;
						default:
						if ($filt_chamado_rel_aberto_completo != '1'){//Só aparece chamado so próprio usuario.
							$sql = mysql_query("SELECT * FROM chamado 
							WHERE nome_usuario LIKE ('$nome_usuario_logado') 
							AND situacao='ABERTO'
							$filt_periodo
							ORDER BY data_cad DESC 
							LIMIT 1000");
						}
						if ($filt_chamado_rel_aberto_completo == '1'){//Só aparece chamado so próprio usuario.
							$sql = mysql_query("SELECT * FROM chamado 
							WHERE situacao='ABERTO'
							$filt_periodo
							ORDER BY data_cad DESC 
							LIMIT 1000");
						}
						break;
							
				}
				$cont = mysql_num_rows($sql);
				//****************  Fim Filtros **************************
				while($linha = mysql_fetch_array($sql)){
					$num_chamado = $linha['id'];
					$nome_usuario_chamado = utf8_decode($linha['nome_usuario']);
					$descricao = $linha['descricao'];
					$data_cad = $linha['data_cad'];
					$hora_cad = $linha['hora_cad'];
					$situacao = $linha['situacao'];
					$solucao = $linha['solucao'];
					
					if ($solucao == ""){ 
					$solucao = "ABERTO";
					}
					?>
					<tr>
						<td>
							<? if($situacao != "FECHADO"){ ?>
								<? if ($nome_usuario_logado == $nome_usuario_chamado || $filt_chamado_fecha == 1){?>
									<a href="chamado.php?pg=fecha_chamado&id=<? echo $num_chamado ?>" >
										<button class="btn btn-warning btn-sm rounded-2x">
											<i class="fa fa-pencil" title="Atualiza Chamado"></i>
										</button>
									</a>
								<? }?> 
								<? if ($filt_chamado_fecha == 1){?>
									<a href="mailto:<? echo $linha['email'];?>
										?subject=TI Benassi Rio - Chamado: <? print $num_chamado;?>
										&body=Descrição Chamado: <? $descricao;?>
										">
										<button class="btn btn-warning btn-sm rounded-2x">
											<i class="fa fa-at" title="Envia e-mail"></i>
										</button>
									</a>
								<? }?> 
							<? }?>
							<? if($situacao == "FECHADO" and $filt_chamado_ti == 1){ ?>
								<a href="chamado.php?pg=fecha_chamado&id=<?  $num_chamado ?>" >
									<button class="btn btn-warning btn-sm rounded-2x">
										<i class="fa fa-pencil" title="Atualiza Chamado"></i>
									</button>
								</a>
								<span class="">Finalizado Por: <? echo $linha['atendido_por'];?></span>
							<? } ?>
						</td>
						<td><? echo $num_chamado; ?></td>
						<td>
							<?
								switch ($linha['solucao']) {//Switch para Exibir os status do chamado.
									case "ABERTO":
										?><span class="label label-success btn-sm "><?
											echo $linha['solucao'];
										?></span><?
									break;
									case "Em Andamento":
										?><span class="label label-blue btn-sm "><?
											echo $linha['solucao'];
										?></span><?
									break;
									case "Pendente":
										?><span class="label label-dark btn-sm "><?
											echo $linha['solucao'];
										?></span>'<?
									break;
									case "Concluido":
										if ( $linha['situacao'] == "FECHADO"){
											?><span class="label label-success btn-sm "><?
												echo $linha['solucao'];
											?></span><?
										}
									break;
									case "Não Concluido":
										if ( $linha['situacao'] == "FECHADO"){
											?><span class="label label-danger btn-sm "><?
												echo $linha['solucao'];
											?></span><?
										}
									break;
									case "REJEITADO":
										if ( $linha['situacao'] == "FECHADO"){
											?><span class="label label-danger btn-sm "><?
												echo $linha['solucao'];
											?></span><?
										}
									break;
									default:
										?><span class="label label-dark btn-sm "><?
											echo $linha['solucao'];
										?></span><?
									break;
								}
							?>
						</td>
						<td><? echo utf8_encode($nome_usuario_chamado) ?></td>
						<td><? echo utf8_encode($linha['categoria']) ?></td>
						<td><? echo utf8_encode($linha['local_atendimento']) ?></td>
						<td><? echo utf8_encode($descricao) ?></td>
						<td><? echo converte_data($data_cad)." <br /> ". $hora_cad ?></td>
						
					</tr>
				<? 	
				}//fecha while($linha = mysql_fetch_array($sql)) e if situacao aberto  ?>
					
			</tbody>
        </table>
                      
</div>

<!--Fim tabela resultado-->
<?  }?>


<!-- ************************************************************************************************************************************* 
											FIM EXIBE CHAMADOS ABERTOS TODOS 
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
<script type="text/javascript" src="assets/js/forms/order.js"></script><!--Necessário para funcionar o calendário  -->
<script type="text/javascript" src="assets/js/forms/reg.js"></script>
<script type="text/javascript" src="assets/js/forms/login.js"></script>
<script type="text/javascript" src="assets/js/forms/contact.js"></script>
<script type="text/javascript" src="assets/js/forms/comment.js"></script>

<script src="assets/cleditor/jquery.min.js"></script><!-- Necessário para funcionamento do editor. -->
<script src="assets/cleditor/jquery.cleditor.min.js"></script><!-- Necessário para funcionamento do editor. -->

<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        RegForm.initRegForm();
        LoginForm.initLoginForm();
        ContactForm.initContactForm();
        CommentForm.initCommentForm();
		OrderForm.initOrderForm(); //Necessário para funcionar o calendário   
        });
		 $(document).ready(function () { $("#cleditor").cleditor(); });<!-- Necessário para funcionamento do editor. -->
		 $(document).ready(function () { $("#cleditor2").cleditor(); });<!-- Necessário para funcionamento do editor. -->
</script>

<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/placeholder-IE-fixes.js"></script>
    <script src="assets/plugins/sky-forms-pro/skyforms/js/sky-forms-ie8.js"></script>
<![endif]-->

</body>
</html>