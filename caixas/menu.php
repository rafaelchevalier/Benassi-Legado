			<?
	if ( isset($_SESSION['login_usuario'])) {//Filtro só pesquisa no banco se for um usuário válido conectado
	 include"include/conexao.php";
	 	$id = $_SESSION['id_usuario'];
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM filtro_acesso where id_usuario='$id' ");
		while($linha = mysql_fetch_array($sql)){	
		$cad_patrimonio = $linha['cad_patrimonio'];
		$alt_patrimonio = $linha['alt_patrimonio'];
		$del_patrimonio = $linha['del_patrimonio'];
		$cad_usuario = $linha['cad_usuario'];
		$alt_usuario = $linha['alt_usuario'];
		$del_usuario = $linha['del_usuario'];
		}}
			
			?>
            
            <!-- 
                
                <a href="#"><img src="images/m1.jpg" width="66" height="41" alt="M1" /></a>
				<a href="#"><img src="images/m2.jpg" width="87" height="41" alt="M2" /></a>
				<a href="#"><img src="images/m3.jpg" width="83" height="41" alt="M3" /></a>
                <a href="#"><img src="images/m4.jpg" width="72" height="41" alt="M4" /></a>
                <a href="#"><img src="images/m5.jpg" width="84" height="41" alt="M5" /></a>
				<a href="#"><img src="images/m6.jpg" width="64" height="41" alt="M6" /></a>
				<a href="#"><img src="images/m7.jpg" width="89" height="41" alt="M7" /></a>
				<a href="#"><img src="images/m8.jpg" width="89" height="41" alt="M8" /></a> -->
               
    			<? if (isset($_SESSION['login_usuario'])){ ?> 
                <a href="chamado.php?pg=abre_chamado">&nbsp;Chamado&nbsp;</a>|
                <? }?>
				<? if (isset($_SESSION['login_usuario']) and $_SESSION['nivel_usuario'] == "10"){ ?> 
                <a href="usuarios.php">&nbsp;Usuários&nbsp;</a>|
                <a href="ip.php"> IP </a>|
                <a href="filtro_acesso.php">&nbsp;Filtros Acesso&nbsp;</a>|
                <a href="procedimentos.php">&nbsp;Procedimentos&nbsp; </a>|
               	<? } ?>
				<? if (isset($_SESSION['login_usuario']) and $_SESSION['nivel_usuario'] < "2"){?>
                <a href="patrimonio.php?pg=cad_patrimonio"> Cadastro Patrimônio </a>|
                <a href="patrimonio.php?pg=rel_patrimonio"> Relatório Patrimônio </a>|
                <? }?>
                
