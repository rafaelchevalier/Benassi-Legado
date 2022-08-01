<?
//MÓDULO PLANO DE AÇÃO 
include 'conexao.php';
include 'funcoes.php';
//adiciona plano de ação
switch($funcao){
 case "cad_inventario"://Adiciona plano de ação
cad_inventario (
			utf8_encode($_REQUEST['host']),
 			utf8_encode($_REQUEST['ip']),
			utf8_encode($_REQUEST['patrimonio']), 
			utf8_encode($_REQUEST['usuario']), 
			utf8_encode($_REQUEST['localidade']), 
			utf8_encode($_REQUEST['departamento']), 
			utf8_encode($_REQUEST['nf_sw_office']), 
			utf8_encode($_REQUEST['fornecedor_sw_office']),
			utf8_encode($_REQUEST['data_garantia']),
			utf8_encode($_REQUEST['modelo']),
			utf8_encode($_REQUEST['num_serie']),
			utf8_encode($_REQUEST['cod_servico']),
			utf8_encode($_REQUEST['cpu']),
			utf8_encode($_REQUEST['memoria']),
			utf8_encode($_REQUEST['hd']),
			utf8_encode($_REQUEST['office']),
			utf8_encode($_REQUEST['serial_office']),
			utf8_encode($_REQUEST['so']),
			utf8_encode($_REQUEST['tipo_licenca_so']),
			utf8_encode($_REQUEST['serial_licenca_so']),
			utf8_encode($_REQUEST['licenca_cal']),
			utf8_encode($_REQUEST['nfe_cal']),
			utf8_encode($_REQUEST['fornecedor_cal']),
			utf8_encode($_REQUEST['rm']),
			utf8_encode($_REQUEST['antivirus'])
			
);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../inventario_ti.php?pg=1'>
	<script type=\"text/javascript\">	
	alert(\" Cadastro efetuado com sucesso.\");
	</script>";

break;

case 'excluir':
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql = "delete from inventario_ti WHERE id IN ($excluir) ";
	mysql_query($sql);
	echo "<script type=\"text/javascript\">	
		alert(\" Registros removidos com sucesso!\")
		language='javascript'>history.back()
	 </script>";
break;
default:
	echo "<script type=\"text/javascript\">	
		alert(\" Acesso não permitido, opção escolhida não é permitida seu uruário não tem acesso!\")
		language='javascript'>history.back()
	 </script>";
	
break;
}

//FUNÇÕES 


// Função adiciona plano de ação no banco de dados	
function cad_inventario(
			$host,
 			$ip,
			$patrimonio, 
			$usuario, 
			$localidade, 
			$departamento, 
			$nf_sw_office, 
			$fornecedor_sw_office,
			$data_garantia,
			$modelo,
			$num_serie,
			$cod_servico,
			$cpu,
			$memoria,
			$hd,
			$office,
			$serial_office,
			$so,
			$tipo_licenca_so,
			$serial_licenca_so,
			$licenca_cal,
			$nfe_cal,
			$fornecedor_cal,
			$rm,
			$antivirus){
	$usuario_cad = $_SESSION['nome_usuario'];
	$sql = "insert into inventario_ti(
			host,
 			ip,
			patrimonio, 
			usuario, 
			localidade, 
			departamento, 
			nf_sw_office, 
			fornecedor_sw_office,
			data_garantia,
			modelo,
			num_serie,
			cod_servico,
			cpu,
			memoria,
			hd,
			office,
			serial_office,
			so,
			tipo_licenca_so,
			serial_licenca_so,
			licenca_cal,
			nfe_cal,
			fornecedor_cal,
			rm,
			antivirus
		) values (
			'$host',
 			'$ip',
			'$patrimonio', 
			'$usuario', 
			'$localidade', 
			'$departamento', 
			'$nf_sw_office', 
			'$fornecedor_sw_office',
			'$data_garantia',
			'$modelo',
			'$num_serie',
			'$cod_servico',
			'$cpu',
			'$memoria',
			'$hd',
			'$office',
			'$serial_office',
			'$so',
			'$tipo_licenca_so',
			'$serial_licenca_so',
			'$licenca_cal',
			'$nfe_cal',
			'$fornecedor_cal',
			'$rm',
			'$antivirus'
		)";
	mysql_query($sql);
	}

?>