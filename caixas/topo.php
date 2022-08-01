<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-language" content="pt-br" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="tibenassirio, controle caixas benassi, controle benassi"  />
<meta name="description" content="Sistema para controle de caixas plásticas empresa Benassi" />
<meta name="robots" content="index,follow" />
<title>Controle de Caixas</title>
<link rel="stylesheet" type="text/css" href="css/style1.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/print_contagem.css" media="print"/>
<link rel="stylesheet" type="text/javascript" href="js/funcoes.jsp" />
</head>
<body>
<div id="principal_topo">
		<div id="text_topo" class="style1">
    		Controle de caixas 
            	<div id="versao">
                	<a href="atualizacoes.php">Versão 1.2</a>	
                </div>
        </div>
    	<div id="text_topo_print" class="style1">
        	Relatório Caixas Plástica
    	</div>
    
	<div id="logo">
    <img src="img/logo.png" alt="Logo Benassi"  />
    </div>
    <div id="imgtopo1">
    <img src="img/caixa.png" alt="Caixa" width="121" height="115"  />
    </div>
  <div id="text_topo2" class="style2">
<!-- ************************Menu***************************** -->
    <?
	require('fpdf/fpdf.php');
    if(isset($_SESSION['login_usuario_caixa']) AND isset($_SESSION['senha_usuario_caixa'])){
		$nome_completo = $_SESSION['nome_completo_caixa'];
	?>
    <div id="principal_menu_caixas" >

    |<!-- Aparece para qualquer usuário que estiver logado-->
	<? if ($_SESSION['nivel_usuario_caixa'] < "2"){ //Filtro para liberar o menu apenas para usuários com nivel menor que 2 
	if ($_SESSION['nivel_usuario_caixa'] == "0"){
	?>
    <a class="Texto_menu" onclick="showit(0)" onMouseover="showit(0)" onMouseout="resetit(event)">&nbsp;Usuários&nbsp;</a>|
    <a class="Texto_menu" onclick="showit(2)" onmouseover="showit(2)" onMouseout="resetit(event)">&nbsp;Caixas&nbsp;</a>|
    <a class="Texto_menu" onclick="showit(1)" onmouseover="showit(1)" onMouseout="resetit(event)">&nbsp;Mercado&nbsp;</a>| <? }?>
    <a class="Texto_menu" onclick="showit(3)" onmouseover="showit(3)" onMouseout="resetit(event)">Contagem</a>|
    <a href="ocorrencia.php?pg=1" class="Texto_menu" onclick="showit(5)" onmouseover="showit(5)" onMouseout="resetit(event)">Ocorrencia</a>|
    
	
	<? }?><!-- So aparece para usuario nivel 1 ou menor -->
    
    <? if ($_SESSION['nivel_usuario_caixa'] == "2"){ ?>
    <a href="contagem.php?pg=contfunc" class="Texto_menu" onclick="showit(4)" onmouseover="showit(4)" onMouseout="resetit(event)">&nbsp;Contagem&nbsp;</a>|<? }?><!-- So aparece para usuario nivel 2 -->
<!-- ************************Fim Menu***************************** -->
<!-- ************************Deslogar e trocar senha ***************************** -->
 <span class="style3">Bem Vindo:&nbsp;<? echo $nome_completo; ?>.&nbsp;&nbsp;&nbsp;|&nbsp;<a href="include/logout.php">Sair</a>&nbsp;|&nbsp;<a href="usuario.php?pg=alteraadm&id=<? echo $_SESSION['id_usuario_caixa'];?>">Trocar senha</a>&nbsp;|</span>
    </div>
    <?
	}else{
	?>
    <span class="style4">&nbsp;&nbsp;Você precisa efetuar o login para acessar esta página&nbsp;&nbsp;</span>
    </div>
    <? }?>
<!-- ************************Fim Deslogar e trocar senha ***************************** --> 
    </div>
   
</div><!-- Fecha Principal Topo -->

    <div id="describe"  onMouseover="clear_delayhide()" onMouseout="resetit(event)"></div>
<br /><br /><br />
<!-- Função para menu Dropdown Topo -->

<script language="JavaScript1.2">

/*
Tabs Menu (mouseover)- By Dynamic Drive
For full source code and more DHTML scripts, visit http://www.dynamicdrive.com
This credit MUST stay intact for use
*/

var submenu=new Array()

//Set submenu contents. Expand as needed. For each content, make sure everything exists on ONE LINE. Otherwise, there will be JS errors.
 
//SubMenu Usuários
submenu[0]='<span class="style7"><a href="usuario.php?pg=cadadm">Cadastro Usuário</a> | <a href="usuario.php?pg=relusuario">Relatórios Usuário</a></span>'
//Submenu Mercados
submenu[1]='<span class="style7"><a href="mercado.php?pg=cadmercado">Cadastro Mercado</a> | <a href="mercado.php?pg=relmercado">Relatórios Mercado</a></span>'
//Submenu caixas
submenu[2]='<span class="style7"><a href="caixas.php?pg=cadcaixa">Cadastro Caixa</a> | <a href="caixas.php?pg=relcaixas">Relatórios Caixas</a></span>'
//Submenu Contagem
submenu[3]='<span class="style7"><a href="contagem.php?pg=contfunc">Cadastro Contagem</a> | <a href="pesq_cont.php">Relatórios Contagem</a></span>'
//Submenu Contagem Usuário
submenu[4]='<span class="style7"><a href="contagem.php?pg=contfunc">Cadastro Contagem</a> | <a href="contagem.php?pg=relcont">Código</a></span>'
//Submenu Ocorrencia Caixas
submenu[5]='<span class="style7"><a href="ocorrencia.php?pg=1">CADASTRO </a> | <a href="ocorrencia.php?pg=2">CONSULTA</a>| <a href="contagem.php?pg=consulta_erro">CONSULTA ERRO</a></span>'



//Tempo que o menu some depois que o tira o mause de cima (em milisegundos)
var delay_hide=1000

/////No need to edit beyond here

var menuobj=document.getElementById? document.getElementById("describe") : document.all? document.all.describe : document.layers? document.dep1.document.dep2 : ""

function showit(which){
clear_delayhide()
thecontent=(which==-1)? "" : submenu[which]
if (document.getElementById||document.all)
menuobj.innerHTML=thecontent
else if (document.layers){
menuobj.document.write(thecontent)
menuobj.document.close()
}
}

function resetit(e){
if (document.all&&!menuobj.contains(e.toElement))
delayhide=setTimeout("showit(-1)",delay_hide)
else if (document.getElementById&&e.currentTarget!= e.relatedTarget&& !contains_ns6(e.currentTarget, e.relatedTarget))
delayhide=setTimeout("showit(-1)",delay_hide)
}

function clear_delayhide(){
if (window.delayhide)
clearTimeout(delayhide)
}

function contains_ns6(a, b) {
while (b.parentNode)
if ((b = b.parentNode) == a)
return true;
return false;
}

</script>


<!-- Fim função para menu Dropdown Topo -->
</body>
</html>