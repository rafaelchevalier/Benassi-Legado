<?
session_start();
require "topo.php";
?>

		</div>
		<div id="headline">
        	<div id="div_procedimentos">
        		<h1>Procedimentos</h1>
            	<!-- Procedimentos da TI -->
                <? if($_SESSION['nivel_usuario'] < "1" or $filt_procedmento_ti == "1"){?>
                <h2>TI</h2>
            	<ul>
            		<li><a href="#">Instalação Proteus</a></li>
	                <li><a href="#">Instalação RM Local</a></li>
   	    	         <li><a href="#">Instalação IpCop</a></li>
   		             <li><a href="#">Instalação MicroSiga</a></li>
          		 </ul>
                 <? }?>
            <!-- Procedimentos da Comercial -->
            <h2>Comercial</h2>
            	<ul>
            		<li><a href="#">Sistema Caixas Plásticas</a></li>
	                <li><a href="#">Sistema Pedidos Online</a></li>
          		 </ul>
            <!-- Procedimentos da Geral-->
            <h2>Geral</h2>
            	<ul>
            		<li><a href="#"></a></li>
          		 </ul>
            <!-- Procedimentos da Administração -->
            
			</div>          
		</div>
		<div id="body">
			
		</div>
	</div>
<? require"rodape.php"; ?>
</body>
</html>
