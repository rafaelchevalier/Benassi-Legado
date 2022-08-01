			<?
			require "include/config_filtros.php";
			?>
            <!-- Start css3menu.com BODY section -->
<ul id="css3menu1" class="topmenu">
	<? if (isset($_SESSION['mercado_cnpj'] ) ){?>
		<li class="topmenu"><a href="quebra.php?pg=tipo" style="height:15px;line-height:15px;">Lançamento</a></li>
		<li class="topmenu"><a href="quebra.php?pg=con" style="height:15px;line-height:15px;">Consulta</a></li>
	<? }?>
</ul>
<!-- End css3menu.com BODY section -->
           
           