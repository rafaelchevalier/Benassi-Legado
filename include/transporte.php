 <?
include 'conexao.php';

//************************************ INICIO CADASTRA *******************************************************

if($funcao == "cad"){//Cadastra
cad (
utf8_decode($_REQUEST['motorista']),
utf8_decode($_REQUEST['cpf']),
utf8_decode($_REQUEST['empresa']),
utf8_decode($_REQUEST['placa']),
utf8_decode($_REQUEST['modelo']),
utf8_decode($_REQUEST['marca']),
utf8_decode($_REQUEST['contato']),
utf8_decode($_REQUEST['usuario']));
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../transporte.php?pg=cad'>
	<script type=\"text/javascript\">	
	alert(\" Cadastro efetuado com sucesso.\");
	</script>";
}

function cad($motorista,$cpf,$empresa,$placa,$modelo,$marca,$contato,$usuario){// Cadastra
	$sql = "insert into transporte (
	motorista,
	cpf,
	empresa,
	placa,
	modelo,
	marca,
	contato,
	data_cad,
	hora_cad,
	usuario_cad
	) values (
	'$motorista',
	'$cpf',
	'$empresa',
	'$placa',
	'$modelo',
	'$marca',
	'$contato',
	now(),
	now(),
	'$usuario'
	)";
	mysql_query($sql);
	}// Fim função cad_fbl
//************************************ INICIO Altera aferição *******************************************************	
if($funcao == "alt"){
$id = $_GET['id'];

alt(
utf8_decode($_REQUEST['motorista']),
utf8_decode($_REQUEST['cpf']),
utf8_decode($_REQUEST['empresa']),
utf8_decode($_REQUEST['placa']),
utf8_decode($_REQUEST['modelo']),
utf8_decode($_REQUEST['marca']),
utf8_decode($_REQUEST['contato']),
utf8_decode($_REQUEST['usuario'])
);

	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../transporte.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";

}

function alt($motorista,$cpf,$empresa,$placa,$modelo,$marca,$contato,$usuario){
		$id = $_GET['id'];
	$sql = (" UPDATE transporte SET 
	motorista='$motorista',
	cpf='$cpf',
	empresa='$empresa',
	placa='$placa',
	modelo='$modelo',
	marca='$marca',
	contato='$contato',
	data_alt= now(),
	hora_alt= now(),
	usuario_alt='$usuario'	
	where id='$id'");
	mysql_query($sql);
	}


//************************************ INICIO Exclui Balança *******************************************************
/* if($funcao == "exclui"){
	$id = $_GET['id'];
	$sql = ("DELETE FROM transporte where id='$id' limit 1");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../transporte.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
} */

?>