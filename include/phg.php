 <?
require "conexao.php";
require "funcoes.php";

//************************************ INICIO CADASTRA AFERIÇÃO *******************************************************

if($funcao == "cad2"){//Cadastra Planilha de Higienização Global Semanal
cad2 (
utf8_decode($_REQUEST['nome_usuario']),
utf8_decode($_REQUEST['obs']),
$_REQUEST['periodo'],
converte_data($_REQUEST['data']),
//Embalagem
$_REQUEST['piso_embalagem'],
$_REQUEST['bancadas_embalagem'],
$_REQUEST['balancas_embalagem'],
$_REQUEST['esteiras_embalagem'],
$_REQUEST['seladoraa_embalagem'],
$_REQUEST['seladorab_embalagem'],
$_REQUEST['pias_embalagem'],
$_REQUEST['lixeira_embalagem'],
$_REQUEST['parede_embalagem'],
$_REQUEST['portas_embalagem'],
$_REQUEST['teto_embalagem'],
$_REQUEST['luminarias_embalagem'],
//Cozinha Ind
$_REQUEST['piso_cozinhaind'],
$_REQUEST['bancada_cozinhaind'],
$_REQUEST['balanca_cozinhaind'],
$_REQUEST['lixeira_cozinhaind'],
$_REQUEST['porta_pallet_cozinhaind'],
$_REQUEST['luminarias_cozinhaind'],
//Galpão
$_REQUEST['piso_galpao'],
$_REQUEST['lixeira_galpao'],
$_REQUEST['balanca_galpao'],
$_REQUEST['portoes_galpao'],
$_REQUEST['porta_pallet_galpao'],
$_REQUEST['luminarias_galpao'],
//Ante Camara
$_REQUEST['piso_ante_camara'],
$_REQUEST['ppp_ante_camara'],
$_REQUEST['porta_pallet_ante_camara'],
$_REQUEST['luminarias_ante_camara'],
//Camara Fria
$_REQUEST['piso1_camara_fria'],
$_REQUEST['piso2_camara_fria'],
$_REQUEST['piso3_camara_fria'],
$_REQUEST['piso4_camara_fria'],
$_REQUEST['ppt1_camara_fria'],
$_REQUEST['ppt2_camara_fria'],
$_REQUEST['ppt3_camara_fria'],
$_REQUEST['porta1_camara_fria'],
$_REQUEST['porta2_camara_fria'],
$_REQUEST['porta3_camara_fria'],
$_REQUEST['luminarias1_camara_fria'],
$_REQUEST['luminarias2_camara_fria'],
$_REQUEST['luminarias3_camara_fria'],
//Caixaria
$_REQUEST['piso_caixaria'],
//Vestiário
$_REQUEST['masculino_vestiario'],
$_REQUEST['feminino_vestiario'],
//Descarte
$_REQUEST['piso_descarte'],
$_REQUEST['cacamba_descarte'],
//REFEITÓRIO
$_REQUEST['piso_refeitorio'],
$_REQUEST['pias_refeitorio'],
$_REQUEST['bancadas_refeitorio'],
$_REQUEST['forno_refeitorio'],
$_REQUEST['fogao_refeitorio'],
$_REQUEST['lixeira_refeitorio'],
$_REQUEST['geladeira_refeitorio'],
$_REQUEST['freezer_refeitorio'],
$_REQUEST['coifa_refeitorio'],
$_REQUEST['despensa_refeitorio'],
$_REQUEST['luminarias_refeitorio'],
$_REQUEST['teto_refeitorio']
);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../phg.php?pg=cad2'>
	<script type=\"text/javascript\">	
	alert(\" CADASTRO EFETUADO COM SUCESSO.\");
	</script>";
}// Fim teste funcao=cad_fbl

function cad2(//Cadastra Planilha de Higienização Global Semanal
$nome_usuario,
$obs,
$periodo,
$data_phg,
//Embalagem
$piso_embalagem,
$bancadas_embalagem,
$balancas_embalagem,
$esteiras_embalagem,
$seladoraa_embalagem,
$seladorab_embalagem,
$pias_embalagem,
$lixeira_embalagem,
$parede_embalagem,
$portas_embalagem,
$teto_embalagem,
$luminarias_embalagem,
//Cozinha Ind
$piso_cozinhaind,
$bancada_cozinhaind,
$balanca_cozinhaind,
$lixeira_cozinhaind,
$porta_pallet_cozinhaind,
$luminarias_cozinhaind,
//Galpão
$piso_galpao,
$lixeira_galpao,
$balanca_galpao,
$portoes_galpao,
$porta_pallet_galpao,
$luminaria_galpao,
//Ante Camara
$piso_ante_camara,
$ppp_ante_camara,
$porta_pallet_ante_camara,
$luminarias_ante_camara,
//Camara Fria
$piso1_camara_fria,
$piso2_camara_fria,
$piso3_camara_fria,
$piso4_camara_fria,
$ppt1_camara_fria,
$ppt2_camara_fria,
$ppt3_camara_fria,
$porta1_camara_fria,
$porta2_camara_fria,
$porta3_camara_fria,
$luminarias1_camara_fria,
$luminarias2_camara_fria,
$luminarias3_camara_fria,
//Caixaria
$piso_caixaria,
//Vestiário
$masculino_vestiario,
$feminino_vestiario,
//Descarte
$piso_descarte,
$cacamba_descarte,
//REFEITÓRIO
$piso_refeitorio,
$pias_refeitorio,
$bancadas_refeitorio,
$forno_refeitorio,
$fogao_refeitorio,
$lixeira_refeitorio,
$geladeira_refeitorio,
$freezer_refeitorio,
$coifa_refeitorio,
$despensa_refeitorio,
$luminarias_refeitorio,
$teto_refeitorio
){
$conforme = 0;
$nao_conforme = 0;
$total = 0;
//Embalagem
if($piso_embalagem == 1 and $piso_embalagem !=""){$conforme ++; $total ++;}
if($piso_embalagem == 0 and $piso_embalagem !=""){$nao_conforme ++; $total ++;}

if($bancadas_embalagem == 1 and $bancadas_embalagem !=""){$conforme ++; $total ++;}
if($bancadas_embalagem == 0 and $bancadas_embalagem !=""){$nao_conforme ++; $total ++;}

if($balancas_embalagem == 1 and $balancas_embalagem !=""){$conforme ++; $total ++;}
if($balancas_embalagem == 0 and $balancas_embalagem !=""){$nao_conforme ++; $total ++;}

if($esteiras_embalagem == 1 and $esteiras_embalagem !=""){$conforme ++; $total ++;}
if($esteiras_embalagem == 0 and $esteiras_embalagem !=""){$nao_conforme ++; $total ++;}

if($seladoraa_embalagem == 1 and $seladoraa_embalagem !=""){$conforme ++; $total ++;}
if($seladoraa_embalagem == 0 and $seladoraa_embalagem !=""){$nao_conforme ++; $total ++;}

if($seladorab_embalagem == 1 and $seladorab_embalagem !=""){$conforme ++; $total ++;}
if($seladorab_embalagem == 0 and $seladorab_embalagem !=""){$nao_conforme ++; $total ++;}

if($pias_embalagem == 1 and $pias_embalagem !=""){$conforme ++; $total ++;}
if($pias_embalagem == 0 and $pias_embalagem !=""){$nao_conforme ++; $total ++;}

if($lixeira_embalagem == 1 and $lixeira_embalagem !=""){$conforme ++; $total ++;}
if($lixeira_embalagem == 0 and $lixeira_embalagem !=""){$nao_conforme ++; $total ++;}

if($parede_embalagem == 1 and $parede_embalagem !=""){$conforme ++; $total ++;}
if($parede_embalagem == 0 and $parede_embalagem !=""){$nao_conforme ++; $total ++;}

if($portas_embalagem == 1 and $portas_embalagem !=""){$conforme ++; $total ++;}
if($portas_embalagem == 0 and $portas_embalagem !=""){$nao_conforme ++; $total ++;}

if($teto_embalagem == 1 and $teto_embalagem !=""){$conforme ++; $total ++;}
if($teto_embalagem == 0 and $teto_embalagem !=""){$nao_conforme ++; $total ++;}

if($luminarias_embalagem == 1 and $luminarias_embalagem !=""){$conforme ++; $total ++;}
if($luminarias_embalagem == 0 and $luminarias_embalagem !=""){$nao_conforme ++; $total ++;}
//Cozinha Ind

if($piso_cozinhaind == 1 and $piso_cozinhaind !=""){$conforme ++; $total ++;}
if($piso_cozinhaind == 0 and $piso_cozinhaind !=""){$nao_conforme ++; $total ++;}

if($bancada_cozinhaind == 1 and $bancada_cozinhaind !=""){$conforme ++; $total ++;}
if($bancada_cozinhaind == 0 and $bancada_cozinhaind !=""){$nao_conforme ++; $total ++;}

if($balanca_cozinhaind == 1 and $balanca_cozinhaind !=""){$conforme ++; $total ++;}
if($balanca_cozinhaind == 0 and $balanca_cozinhaind !=""){$nao_conforme ++; $total ++;}

if($lixeira_cozinhaind == 1 and $lixeira_cozinhaind !=""){$conforme ++; $total ++;}
if($lixeira_cozinhaind == 0 and $lixeira_cozinhaind !=""){$nao_conforme ++; $total ++;}

if($porta_pallet_cozinhaind == 1 and $porta_pallet_cozinhaind !=""){$conforme ++; $total ++;}
if($porta_pallet_cozinhaind == 0 and $porta_pallet_cozinhaind !=""){$nao_conforme ++; $total ++;}

if($luminarias_cozinhaind == 1 and $luminarias_cozinhaind !=""){$conforme ++; $total ++;}
if($luminarias_cozinhaind == 0 and $luminarias_cozinhaind !=""){$nao_conforme ++; $total ++;}
//Galpão

if($piso_galpao == 1 and $piso_galpao !=""){$conforme ++; $total ++;}
if($piso_galpao == 0 and $piso_galpao !=""){$nao_conforme ++; $total ++;}

if($lixeira_galpao == 1 and $lixeira_galpao !=""){$conforme ++; $total ++;}
if($lixeira_galpao == 0 and $lixeira_galpao !=""){$nao_conforme ++; $total ++;}

if($balanca_galpao == 1 and $balanca_galpao !=""){$conforme ++; $total ++;}
if($balanca_galpao == 0 and $balanca_galpao !=""){$nao_conforme ++; $total ++;}

if($portoes_galpao == 1 and $portoes_galpao !=""){$conforme ++; $total ++;}
if($portoes_galpao == 0 and $portoes_galpao !=""){$nao_conforme ++; $total ++;}

if($porta_pallet_galpao == 1 and $porta_pallet_galpao !=""){$conforme ++; $total ++;}
if($porta_pallet_galpao == 0 and $porta_pallet_galpao !=""){$nao_conforme ++; $total ++;}

if($luminaria_galpao == 1 and $luminaria_galpao !=""){$conforme ++; $total ++;}
if($luminaria_galpao == 0 and $luminaria_galpao !=""){$nao_conforme ++; $total ++;}
//Ante Camara

if($piso_ante_camara == 1 and $piso_ante_camara !=""){$conforme ++; $total ++;}
if($piso_ante_camara == 0 and $piso_ante_camara !=""){$nao_conforme ++; $total ++;}

if($ppp_ante_camara == 1 and $ppp_ante_camara !=""){$conforme ++; $total ++;}
if($ppp_ante_camara == 0 and $ppp_ante_camara !=""){$nao_conforme ++; $total ++;}

if($porta_pallet_ante_camara == 1 and $porta_pallet_ante_camara !=""){$conforme ++; $total ++;}
if($porta_pallet_ante_camara == 0 and $porta_pallet_ante_camara !=""){$nao_conforme ++; $total ++;}

if($luminarias_ante_camara == 1 and $luminarias_ante_camara !=""){$conforme ++; $total ++;}
if($luminarias_ante_camara == 0 and $luminarias_ante_camara !=""){$nao_conforme ++; $total ++;}
//Camara Fria

if($piso1_camara_fria == 1 and $piso1_camara_fria !=""){$conforme ++; $total ++;}
if($piso1_camara_fria == 0 and $piso1_camara_fria !=""){$nao_conforme ++; $total ++;}

if($piso2_camara_fria == 1 and $piso2_camara_fria !=""){$conforme ++; $total ++;}
if($piso2_camara_fria == 0 and $piso2_camara_fria !=""){$nao_conforme ++; $total ++;}

if($piso3_camara_fria == 1 and $piso3_camara_fria !=""){$conforme ++; $total ++;}
if($piso3_camara_fria == 0 and $piso3_camara_fria !=""){$nao_conforme ++; $total ++;}

if($piso4_camara_fria == 1 and $piso4_camara_fria !=""){$conforme ++; $total ++;}
if($piso4_camara_fria == 0 and $piso4_camara_fria !=""){$nao_conforme ++; $total ++;}

if($ppt1_camara_fria == 1 and $ppt1_camara_fria !=""){$conforme ++; $total ++;}
if($ppt1_camara_fria == 0 and $ppt1_camara_fria !=""){$nao_conforme ++; $total ++;}

if($ppt2_camara_fria == 1 and $ppt2_camara_fria !=""){$conforme ++; $total ++;}
if($ppt2_camara_fria == 0 and $ppt2_camara_fria !=""){$nao_conforme ++; $total ++;}

if($ppt3_camara_fria == 1 and $ppt3_camara_fria !=""){$conforme ++; $total ++;}
if($ppt3_camara_fria == 0 and $ppt3_camara_fria !=""){$nao_conforme ++; $total ++;}

if($porta1_camara_fria == 1 and $porta1_camara_fria !=""){$conforme ++; $total ++;}
if($porta1_camara_fria == 0 and $porta1_camara_fria !=""){$nao_conforme ++; $total ++;}

if($porta2_camara_fria == 1 and $porta2_camara_fria !=""){$conforme ++; $total ++;}
if($porta2_camara_fria == 0 and $porta2_camara_fria !=""){$nao_conforme ++; $total ++;}

if($porta3_camara_fria == 1 and $porta3_camara_fria !=""){$conforme ++; $total ++;}
if($porta3_camara_fria == 0 and $porta3_camara_fria !=""){$nao_conforme ++; $total ++;}

if($luminarias1_camara_fria == 1 and $luminarias1_camara_fria !=""){$conforme ++; $total ++;}
if($luminarias1_camara_fria == 0 and $luminarias1_camara_fria !=""){$nao_conforme ++; $total ++;}

if($luminarias2_camara_fria == 1 and $luminarias2_camara_fria !=""){$conforme ++; $total ++;}
if($luminarias2_camara_fria == 0 and $luminarias2_camara_fria !=""){$nao_conforme ++; $total ++;}

if($luminarias3_camara_fria == 1 and $luminarias3_camara_fria !=""){$conforme ++; $total ++;}
if($luminarias3_camara_fria == 0 and $luminarias3_camara_fria !=""){$nao_conforme ++; $total ++;}
//Caixaria
if($piso_caixaria == 1 and $piso_caixaria !=""){$conforme ++; $total ++;}
if($piso_caixaria == 0 and $piso_caixaria !=""){$nao_conforme ++; $total ++;}

//Vestiário

if($masculino_vestiario == 1 and $masculino_vestiario !=""){$conforme ++; $total ++;}
if($masculino_vestiario == 0 and $masculino_vestiario !=""){$nao_conforme ++; $total ++;}

if($feminino_vestiario == 1 and $feminino_vestiario !=""){$conforme ++; $total ++;}
if($feminino_vestiario == 0 and $feminino_vestiario !=""){$nao_conforme ++; $total ++;}
//Descarte

if($piso_descarte == 1 and $piso_descarte !=""){$conforme ++; $total ++;}
if($piso_descarte == 0 and $piso_descarte !=""){$nao_conforme ++; $total ++;}

if($cacamba_descarte == 1 and $cacamba_descarte !=""){$conforme ++; $total ++;}
if($cacamba_descarte == 0 and $cacamba_descarte !=""){$nao_conforme ++; $total ++;}
	//REFEITÓRIO
if($piso_refeitorio == 1 and $piso_refeitorio !=""){$conforme ++; $total ++;}
if($piso_refeitorio == 0 and $piso_refeitorio !=""){$nao_conforme ++; $total ++;}

if($pias_refeitorio == 1 and $pias_refeitorio !=""){$conforme ++; $total ++;}
if($pias_refeitorio == 0 and $pias_refeitorio !=""){$nao_conforme ++; $total ++;}

if($bancadas_refeitorio == 1 and $bancadas_refeitorio != ""){$conforme ++; $total ++;}
if($bancadas_refeitorio == 0 and $bancadas_refeitorio !=""){$nao_conforme ++; $total ++;}

if($forno_refeitorio == 1 and $forno_refeitorio !=""){$conforme ++; $total ++;}
if($forno_refeitorio == 0 and $forno_refeitorio !=""){$nao_conforme ++; $total ++;}

if($fogao_refeitorio == 1 and $fogao_refeitorio !=""){$conforme ++; $total ++;}
if($fogao_refeitorio == 0 and $fogao_refeitorio !=""){$nao_conforme ++; $total ++;}

if($lixeira_refeitorio == 1 and $lixeira_refeitorio !=""){$conforme ++; $total ++;}
if($lixeira_refeitorio == 0 and $lixeira_refeitorio !=""){$nao_conforme ++; $total ++;}

if($geladeira_refeitorio == 1 and $geladeira_refeitorio !=""){$conforme ++; $total ++;}
if($geladeira_refeitorio == 0 and $geladeira_refeitorio !=""){$nao_conforme ++; $total ++;}

if($freezer_refeitorio == 1 and $freezer_refeitorio !=""){$conforme ++; $total ++;}
if($freezer_refeitorio == 0 and $freezer_refeitorio !=""){$nao_conforme ++; $total ++;}

if($coifa_refeitorio == 1 and $coifa_refeitorio !=""){$conforme ++; $total ++;}
if($coifa_refeitorio == 0 and $coifa_refeitorio !=""){$nao_conforme ++; $total ++;}

if($despensa_refeitorio == 1 and $despensa_refeitorio !=""){$conforme ++; $total ++;}
if($despensa_refeitorio == 0 and $despensa_refeitorio !=""){$nao_conforme ++; $total ++;}

if($luminarias_refeitorio == 1 and $luminarias_refeitorio !=""){$conforme ++; $total ++;}
if($luminarias_refeitorio == 0 and $luminarias_refeitorio !=""){$nao_conforme ++; $total ++;}

if($teto_refeitorio == 1 and $teto_refeitorio !=""){$conforme ++; $total ++;}
if($teto_refeitorio == 0 and $teto_refeitorio !=""){$nao_conforme ++; $total ++;}


	$sql = "insert into phg (
usuario_cad,
obs,
periodo,
data_cad,
hora_cad,
data_phg,
piso_embalagem,
bancadas_embalagem,
balancas_embalagem,
esteiras_embalagem,
seladoraa_embalagem,
seladorab_embalagem,
pias_embalagem,
lixeira_embalagem,
parede_embalagem,
portas_embalagem,
teto_embalagem,
luminarias_embalagem,
piso_cozinhaind,
bancada_cozinhaind,
balanca_cozinhaind,
lixeira_cozinhaind,
porta_pallet_cozinhaind,
luminarias_cozinhaind,
piso_galpao,
lixeira_galpao,
balanca_galpao,
portoes_galpao,
porta_pallet_galpao,
luminarias_galpao,
piso_ante_camara,
ppp_ante_camara,
porta_pallet_ante_camara,
luminarias_ante_camara,
piso1_camara_fria,
piso2_camara_fria,
piso3_camara_fria,
piso4_camara_fria,
ppt1_camara_fria,
ppt2_camara_fria,
ppt3_camara_fria,
porta1_camara_fria,
porta2_camara_fria,
porta3_camara_fria,
luminarias1_camara_fria,
luminarias2_camara_fria,
luminarias3_camara_fria,
piso_caixaria,
masculino_vestiario,
feminino_vestiario,
piso_descarte,
cacamba_descarte,
piso_refeitorio,
pias_refeitorio,
bancadas_refeitorio,
forno_refeitorio,
fogao_refeitorio,
lixeira_refeitorio,
geladeira_refeitorio,
freezer_refeitorio,
coifa_refeitorio,
despensa_refeitorio,
luminarias_refeitorio,
teto_refeitorio,
conforme,
nao_conforme,
total
	) values(
'$nome_usuario',
'$obs',
'$periodo',
now(),
now(),
'$data_phg',
'$piso_embalagem',
'$bancadas_embalagem',
'$balancas_embalagem',
'$esteiras_embalagem',
'$seladoraa_embalagem',
'$seladorab_embalagem',
'$pias_embalagem',
'$lixeira_embalagem',
'$parede_embalagem',
'$portas_embalagem',
'$teto_embalagem',
'$luminarias_embalagem',
'$piso_cozinhaind',
'$bancada_cozinhaind',
'$balanca_cozinhaind',
'$lixeira_cozinhaind',
'$porta_pallet_cozinhaind',
'$luminarias_cozinhaind',
'$piso_galpao',
'$lixeira_galpao',
'$balanca_galpao',
'$portoes_galpao',
'$porta_pallet_galpao',
'$luminaria_galpao',
'$piso_ante_camara',
'$ppp_ante_camara',
'$porta_pallet_ante_camara',
'$luminarias_ante_camara',
'$piso1_camara_fria',
'$piso2_camara_fria',
'$piso3_camara_fria',
'$piso4_camara_fria',
'$ppt1_camara_fria',
'$ppt2_camara_fria',
'$ppt3_camara_fria',
'$porta1_camara_fria',
'$porta2_camara_fria',
'$porta3_camara_fria',
'$luminarias1_camara_fria',
'$luminarias2_camara_fria',
'$luminarias3_camara_fria',
'$piso_caixaria',
'$masculino_vestiario',
'$feminino_vestiario',
'$piso_descarte',
'$cacamba_descarte',
'$piso_refeitorio',
'$pias_refeitorio',
'$bancadas_refeitorio',
'$forno_refeitorio',
'$fogao_refeitorio',
'$lixeira_refeitorio',
'$geladeira_refeitorio',
'$freezer_refeitorio',
'$coifa_refeitorio',
'$despensa_refeitorio',
'$luminarias_refeitorio',
'$teto_refeitorio',
'$conforme',
'$nao_conforme',
'$total'
)";
	mysql_query($sql);
	}// Fim função cad2
//************************************ INICIO Altera aferição *******************************************************	
/* Verificar depois se poderá ser feito alterações	
if($funcao == "alt_fbl"){
$id = $_GET['id'];

alt_fbl(utf8_decode($_REQUEST['nome']),utf8_decode($_REQUEST['balanca']),utf8_decode($_REQUEST['situacao']),utf8_decode($_REQUEST['obs']));

	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../fbl.php?pg=consulta_fbl'>
	<script type=\"text/javascript\">	
	</script>";

}

function alt_balanca($nome,$balanca,$situacao,$obs){
		$id = $_GET['id'];
	$sql = (" UPDATE fbl SET usuario_alt='$nome',identificacao='$balanca',situacao='$situacao',obs='$obs',data_alt= now() ,hora_alt= now(),data_afericao=now() where id='$id'");
	mysql_query($sql);
	}
*/

//************************************ INICIO Exclui Balança *******************************************************
if($funcao == "exclui"){
	$id = $_GET['id'];
	$sql = ("DELETE FROM phg where id='$id LIMIT 1'");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../phg.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}

?>