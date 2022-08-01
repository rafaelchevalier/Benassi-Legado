 <?
require 'conexao.php';
require 'funcoes.php';

//************************************ INICIO CADASTRA *******************************************************

if($funcao == "cad"){//Cadastra
cad (
//EMBALADOS	
utf8_decode($_REQUEST['embalados_teto']),
utf8_decode($_REQUEST['embalados_teto_obs']),
utf8_decode($_REQUEST['embalados_luminaria']),
utf8_decode($_REQUEST['embalados_luminaria_obs']),
utf8_decode($_REQUEST['embalados_parede']),
utf8_decode($_REQUEST['embalados_parede_obs']),
utf8_decode($_REQUEST['embalados_porta']),
utf8_decode($_REQUEST['embalados_porta_obs']),
utf8_decode($_REQUEST['embalados_fiacao']),
utf8_decode($_REQUEST['embalados_fiacao_obs']),
utf8_decode($_REQUEST['embalados_balanca']),
utf8_decode($_REQUEST['embalados_balanca_obs']),
utf8_decode($_REQUEST['embalados_utensilio']),
utf8_decode($_REQUEST['embalados_utensilio_obs']),
utf8_decode($_REQUEST['embalados_dispenser']),
utf8_decode($_REQUEST['embalados_dispenser_obs']),
utf8_decode($_REQUEST['embalados_pia']),
utf8_decode($_REQUEST['embalados_pia_obs']),
utf8_decode($_REQUEST['embalados_lixeira']),
utf8_decode($_REQUEST['embalados_lixeira_obs']),
utf8_decode($_REQUEST['embalados_isca']),
utf8_decode($_REQUEST['embalados_isca_obs']),
//COZINHA INDUSTRIAL
utf8_decode($_REQUEST['cozinha_ind_teto']),
utf8_decode($_REQUEST['cozinha_ind_teto_obs']),
utf8_decode($_REQUEST['cozinha_ind_luminaria']),
utf8_decode($_REQUEST['cozinha_ind_luminaria_obs']),
utf8_decode($_REQUEST['cozinha_ind_parede']),
utf8_decode($_REQUEST['cozinha_ind_parede_obs']),
utf8_decode($_REQUEST['cozinha_ind_porta']),
utf8_decode($_REQUEST['cozinha_ind_porta_obs']),
utf8_decode($_REQUEST['cozinha_ind_fiacao']),
utf8_decode($_REQUEST['cozinha_ind_fiacao_obs']),
utf8_decode($_REQUEST['cozinha_ind_balanca']),
utf8_decode($_REQUEST['cozinha_ind_balanca_obs']),
utf8_decode($_REQUEST['cozinha_ind_computador']),
utf8_decode($_REQUEST['cozinha_ind_computador_obs']),
utf8_decode($_REQUEST['cozinha_ind_lixeira']),
utf8_decode($_REQUEST['cozinha_ind_lixeira_obs']),
//BANHEIRO FEMININO
utf8_decode($_REQUEST['banheiro_feminino_teto']),
utf8_decode($_REQUEST['banheiro_feminino_teto_obs']),
utf8_decode($_REQUEST['banheiro_feminino_luminaria']),
utf8_decode($_REQUEST['banheiro_feminino_luminaria_obs']),
utf8_decode($_REQUEST['banheiro_feminino_parede']),
utf8_decode($_REQUEST['banheiro_feminino_parede_obs']),
utf8_decode($_REQUEST['banheiro_feminino_porta']),
utf8_decode($_REQUEST['banheiro_feminino_porta_obs']),
utf8_decode($_REQUEST['banheiro_feminino_mola']),
utf8_decode($_REQUEST['banheiro_feminino_mola_obs']),
utf8_decode($_REQUEST['banheiro_feminino_dispenser']),
utf8_decode($_REQUEST['banheiro_feminino_dispenser_obs']),
utf8_decode($_REQUEST['banheiro_feminino_pia']),
utf8_decode($_REQUEST['banheiro_feminino_pia_obs']),
utf8_decode($_REQUEST['banheiro_feminino_lixeira']),
utf8_decode($_REQUEST['banheiro_feminino_lixeira_obs']),
utf8_decode($_REQUEST['banheiro_feminino_janela']),
utf8_decode($_REQUEST['banheiro_feminino_janela_obs']),
utf8_decode($_REQUEST['banheiro_feminino_vaso']),
utf8_decode($_REQUEST['banheiro_feminino_vaso_obs']),
utf8_decode($_REQUEST['banheiro_feminino_chuveiro']),
utf8_decode($_REQUEST['banheiro_feminino_chuveiro_obs']),
//ÁREA MANUTENÇÃO
utf8_decode($_REQUEST['area_manutencao_obs']),
//OBS GERAL
utf8_decode($_REQUEST['obs']),
//CAMARA FRIA
utf8_decode($_REQUEST['camara_fria_teto']),
utf8_decode($_REQUEST['camara_fria_teto_obs']),
utf8_decode($_REQUEST['camara_fria_luminaria']),
utf8_decode($_REQUEST['camara_fria_luminaria_obs']),
utf8_decode($_REQUEST['camara_fria_parede']),
utf8_decode($_REQUEST['camara_fria_parede_obs']),
utf8_decode($_REQUEST['camara_fria_porta']),
utf8_decode($_REQUEST['camara_fria_porta_obs']),
utf8_decode($_REQUEST['camara_fria_fiacao']),
utf8_decode($_REQUEST['camara_fria_fiacao_obs']),
utf8_decode($_REQUEST['camara_fria_gaiola']),
utf8_decode($_REQUEST['camara_fria_gaiola_obs']),
utf8_decode($_REQUEST['camara_fria_empilhadeira']),
utf8_decode($_REQUEST['camara_fria_empilhadeira_obs']),
utf8_decode($_REQUEST['camara_fria_termo']),
utf8_decode($_REQUEST['camara_fria_termo_obs']),
//MANGAS
utf8_decode($_REQUEST['manga_parede']),
utf8_decode($_REQUEST['manga_parede_obs']),
utf8_decode($_REQUEST['manga_luminaria']),
utf8_decode($_REQUEST['manga_luminaria_obs']),
utf8_decode($_REQUEST['manga_porta']),
utf8_decode($_REQUEST['manga_porta_obs']),
utf8_decode($_REQUEST['manga_lixeira']),
utf8_decode($_REQUEST['manga_lixeira_obs']),
utf8_decode($_REQUEST['manga_balanca']),
utf8_decode($_REQUEST['manga_balanca_obs']),
utf8_decode($_REQUEST['manga_teto']),
utf8_decode($_REQUEST['manga_teto_obs']),
//GALPÃO
utf8_decode($_REQUEST['galpao_balanca']),
utf8_decode($_REQUEST['galpao_balanca_obs']),
utf8_decode($_REQUEST['galpao_porta']),
utf8_decode($_REQUEST['galpao_porta_obs']),
utf8_decode($_REQUEST['galpao_lixeira']),
utf8_decode($_REQUEST['galpao_lixeira_obs']),
utf8_decode($_REQUEST['galpao_luminaria']),
utf8_decode($_REQUEST['galpao_luminaria_obs']),
utf8_decode($_REQUEST['galpao_dispenser']),
utf8_decode($_REQUEST['galpao_dispenser_obs']),
//BANHEIRO MASCULINO
utf8_decode($_REQUEST['banheiro_masculino_teto']),
utf8_decode($_REQUEST['banheiro_masculino_teto_obs']),
utf8_decode($_REQUEST['banheiro_masculino_luminaria']),
utf8_decode($_REQUEST['banheiro_masculino_luminaria_obs']),
utf8_decode($_REQUEST['banheiro_masculino_parede']),
utf8_decode($_REQUEST['banheiro_masculino_parede_obs']),
utf8_decode($_REQUEST['banheiro_masculino_porta']),
utf8_decode($_REQUEST['banheiro_masculino_porta_obs']),
utf8_decode($_REQUEST['banheiro_masculino_mola']),
utf8_decode($_REQUEST['banheiro_masculino_mola_obs']),
utf8_decode($_REQUEST['banheiro_masculino_dispenser']),
utf8_decode($_REQUEST['banheiro_masculino_dispenser_obs']),
utf8_decode($_REQUEST['banheiro_masculino_pia']),
utf8_decode($_REQUEST['banheiro_masculino_pia_obs']),
utf8_decode($_REQUEST['banheiro_masculino_lixeira']),
utf8_decode($_REQUEST['banheiro_masculino_lixeira_obs']),
utf8_decode($_REQUEST['banheiro_masculino_janela']),
utf8_decode($_REQUEST['banheiro_masculino_janela_obs']),
utf8_decode($_REQUEST['banheiro_masculino_vaso']),
utf8_decode($_REQUEST['banheiro_masculino_vaso_obs']),
utf8_decode($_REQUEST['banheiro_masculino_mictorio']),
utf8_decode($_REQUEST['banheiro_masculino_mictorio_obs']),
utf8_decode($_REQUEST['banheiro_masculino_chuveiro']),
utf8_decode($_REQUEST['banheiro_masculino_chuveiro_obs']),
//DATAS - USUARIO
utf8_decode($_REQUEST['usuario']), 
converte_data($_REQUEST['data_verificacao']),
converte_data($_REQUEST['data'])
);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../clp.php?pg=cad'>
	<script type=\"text/javascript\">	
	alert(\" Cadastro efetuado com sucesso.\");
	</script>";
}

function cad(
$embalados_teto,
$embalados_teto_obs,
$embalados_luminaria,
$embalados_luminaria_obs,
$embalados_parede,
$embalados_parede_obs,
$embalados_porta,
$embalados_porta_obs,
$embalados_fiacao,
$embalados_fiacao_obs,
$embalados_balanca,
$embalados_balanca_obs,
$embalados_utensilio,
$embalados_utensilio_obs,
$embalados_dispenser,
$embalados_dispenser_obs,
$embalados_pia,
$embalados_pia_obs,
$embalados_lixeira,
$embalados_lixeira_obs,
$embalados_isca,
$embalados_isca_obs,
$cozinha_ind_teto,
$cozinha_ind_teto_obs,
$cozinha_ind_luminaria,
$cozinha_ind_luminaria_obs,
$cozinha_ind_parede,
$cozinha_ind_parede_obs,
$cozinha_ind_porta,
$cozinha_ind_porta_obs,
$cozinha_ind_fiacao,
$cozinha_ind_fiacao_obs,
$cozinha_ind_balanca,
$cozinha_ind_balanca_obs,
$cozinha_ind_computador,
$cozinha_ind_computador_obs,
$cozinha_ind_lixeira,
$cozinha_ind_lixeira_obs,
$banheiro_feminino_teto,
$banheiro_feminino_teto_obs,
$banheiro_feminino_luminaria,
$banheiro_feminino_luminaria_obs,
$banheiro_feminino_parede,
$banheiro_feminino_parede_obs,
$banheiro_feminino_porta,
$banheiro_feminino_porta_obs,
$banheiro_feminino_mola,
$banheiro_feminino_mola_obs,
$banheiro_feminino_dispenser,
$banheiro_feminino_dispenser_obs,
$banheiro_feminino_pia,
$banheiro_feminino_pia_obs,
$banheiro_feminino_lixeira,
$banheiro_feminino_lixeira_obs,
$banheiro_feminino_janela,
$banheiro_feminino_janela_obs,
$banheiro_feminino_vaso,
$banheiro_feminino_vaso_obs,
$banheiro_feminino_chuveiro,
$banheiro_feminino_chuveiro_obs,
$area_manutencao_obs,
$obs,
$camara_fria_teto,
$camara_fria_teto_obs,
$camara_fria_luminaria,
$camara_fria_luminaria_obs,
$camara_fria_parede,
$camara_fria_parede_obs,
$camara_fria_porta,
$camara_fria_porta_obs,
$camara_fria_fiacao,
$camara_fria_fiacao_obs,
$camara_fria_gaiola,
$camara_fria_gaiola_obs,
$camara_fria_empilhadeira,
$camara_fria_empilhadeira_obs,
$camara_fria_termo,
$camara_fria_termo_obs,
$manga_parede,
$manga_parede_obs,
$manga_luminaria,
$manga_luminaria_obs,
$manga_porta,
$manga_porta_obs,
$manga_lixeira,
$manga_lixeira_obs,
$manga_balanca,
$manga_balanca_obs,
$manga_teto,
$manga_teto_obs,
$galpao_balanca,
$galpao_balanca_obs,
$galpao_porta,
$galpao_porta_obs,
$galpao_lixeira,
$galpao_lixeira_obs,
$galpao_luminaria,
$galpao_luminaria_obs,
$galpao_dispenser,
$galpao_dispenser_obs,
$banheiro_masculino_teto,
$banheiro_masculino_teto_obs,
$banheiro_masculino_luminaria,
$banheiro_masculino_luminaria_obs,
$banheiro_masculino_parede,
$banheiro_masculino_parede_obs,
$banheiro_masculino_porta,
$banheiro_masculino_porta_obs,
$banheiro_masculino_mola,
$banheiro_masculino_mola_obs,
$banheiro_masculino_dispenser,
$banheiro_masculino_dispenser_obs,
$banheiro_masculino_pia,
$banheiro_masculino_pia_obs,
$banheiro_masculino_lixeira,
$banheiro_masculino_lixeira_obs,
$banheiro_masculino_janela,
$banheiro_masculino_janela_obs,
$banheiro_masculino_vaso,
$banheiro_masculino_vaso_obs,
$banheiro_masculino_mictorio,
$banheiro_masculino_mictorio_obs,
$banheiro_masculino_chuveiro,
$banheiro_masculino_chuveiro_obs,
$usuario,
$data_verificacao,
$data
)
{// Cadastra
$c = "0";
$nc = "0";
$total_item = "0";

//Incrementa não conforme para inclusão no BD
if ($embalados_teto == 0 ){ $nc ++; $total_item ++; }
if ($embalados_luminaria == 0 ){ $nc ++; $total_item ++; }
if ($embalados_parede == 0 ){ $nc ++; $total_item ++; }
if ($embalados_porta == 0 ){ $nc ++; $total_item ++; }
if ($embalados_fiacao == 0 ){ $nc ++; $total_item ++; }
if ($embalados_balanca == 0 ){ $nc ++; $total_item ++; }
if ($embalados_utensilio == 0 ){ $nc ++; $total_item ++; }
if ($embalados_dispenser == 0 ){ $nc ++; $total_item ++;}
if ($embalados_pia == 0 ){ $nc ++; $total_item ++;}
if ($embalados_lixeira == 0 ){ $nc ++; $total_item ++;}
if ($embalados_isca == 0 ){ $nc ++; $total_item ++;}
if ($cozinha_ind_teto == 0 ){ $nc ++; $total_item ++;}
if ($cozinha_ind_luminaria == 0 ){ $nc ++; $total_item ++;}
if ($cozinha_ind_parede == 0 ){ $nc ++; $total_item ++;}
if ($cozinha_ind_porta == 0 ){ $nc ++; $total_item ++;}
if ($cozinha_ind_fiacao == 0 ){ $nc ++; $total_item ++;}
if ($cozinha_ind_balanca == 0 ){ $nc ++; $total_item ++;}
if ($cozinha_ind_computador == 0 ){ $nc ++; $total_item ++;}
if ($cozinha_ind_lixeira == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_feminino_teto == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_feminino_luminaria == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_feminino_parede == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_feminino_porta == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_feminino_mola == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_feminino_dispenser == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_feminino_pia == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_feminino_lixeira == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_feminino_janela == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_feminino_vaso == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_feminino_chuveiro == 0 ){ $nc ++; $total_item ++;}
if ($camara_fria_teto == 0 ){ $nc ++; $total_item ++;}
if ($camara_fria_luminaria == 0 ){ $nc ++; $total_item ++;}
if ($camara_fria_parede == 0 ){ $nc ++; $total_item ++;}
if ($camara_fria_porta == 0 ){ $nc ++; $total_item ++;}
if ($camara_fria_fiacao == 0 ){ $nc ++; $total_item ++;}
if ($camara_fria_gaiola == 0 ){ $nc ++; $total_item ++;}
if ($camara_fria_empilhadeira == 0 ){ $nc ++; $total_item ++;}
if ($camara_fria_termo == 0 ){ $nc ++; $total_item ++;}
if ($manga_parede == 0 ){ $nc ++; $total_item ++;}
if ($manga_luminaria == 0 ){ $nc ++; $total_item ++;}
if ($manga_porta == 0 ){ $nc ++; $total_item ++;}
if ($manga_lixeira == 0 ){ $nc ++; $total_item ++;}
if ($manga_balanca == 0 ){ $nc ++; $total_item ++;}
if ($manga_teto == 0 ){ $nc ++; $total_item ++;}
if ($galpao_balanca == 0 ){ $nc ++; $total_item ++;}
if ($galpao_porta == 0 ){ $nc ++; $total_item ++;}
if ($galpao_lixeira == 0 ){ $nc ++; $total_item ++;}
if ($galpao_luminaria == 0 ){ $nc ++; $total_item ++;}
if ($galpao_dispenser == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_masculino_teto == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_masculino_luminaria == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_masculino_parede == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_masculino_porta == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_masculino_mola == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_masculino_dispenser == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_masculino_pia == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_masculino_lixeira == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_masculino_janela == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_masculino_vaso == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_masculino_mictorio == 0 ){ $nc ++; $total_item ++;}
if ($banheiro_masculino_chuveiro == 0 ){ $nc ++; $total_item ++;}

//Incrementa conforme para inclusão no BD
if ($embalados_teto == 1 ){ $c ++; $total_item ++;}
if ($embalados_luminaria == 1 ){ $c ++; $total_item ++;}
if ($embalados_parede == 1 ){ $c ++; $total_item ++;}
if ($embalados_porta == 1 ){ $c ++; $total_item ++;}
if ($embalados_fiacao == 1 ){ $c ++; $total_item ++;}
if ($embalados_balanca == 1 ){ $c ++; $total_item ++;}
if ($embalados_utensilio == 1 ){ $c ++; $total_item ++;}
if ($embalados_dispenser == 1 ){ $c ++; $total_item ++;}
if ($embalados_pia == 1 ){ $c ++; $total_item ++;}
if ($embalados_lixeira == 1 ){ $c ++; $total_item ++;}
if ($embalados_isca == 1 ){ $c ++; $total_item ++;}
if ($cozinha_ind_teto == 1 ){ $c ++; $total_item ++;}
if ($cozinha_ind_luminaria == 1 ){ $c ++; $total_item ++;}
if ($cozinha_ind_parede == 1 ){ $c ++; $total_item ++;}
if ($cozinha_ind_porta == 1 ){ $c ++; $total_item ++;}
if ($cozinha_ind_fiacao == 1 ){ $c ++; $total_item ++;}
if ($cozinha_ind_balanca == 1 ){ $c ++; $total_item ++;}
if ($cozinha_ind_computador == 1 ){ $c ++; $total_item ++;}
if ($cozinha_ind_lixeira == 1 ){ $c ++; $total_item ++;}
if ($banheiro_feminino_teto == 1 ){ $c ++; $total_item ++;}
if ($banheiro_feminino_luminaria == 1 ){ $c ++; $total_item ++;}
if ($banheiro_feminino_parede == 1 ){ $c ++; $total_item ++;}
if ($banheiro_feminino_porta == 1 ){ $c ++; $total_item ++;}
if ($banheiro_feminino_mola == 1 ){ $c ++; $total_item ++;}
if ($banheiro_feminino_dispenser == 1 ){ $c ++; $total_item ++;}
if ($banheiro_feminino_pia == 1 ){ $c ++; $total_item ++;}
if ($banheiro_feminino_lixeira == 1 ){ $c ++; $total_item ++;}
if ($banheiro_feminino_janela == 1 ){ $c ++; $total_item ++;}
if ($banheiro_feminino_vaso == 1 ){ $c ++; $total_item ++;}
if ($banheiro_feminino_chuveiro == 1 ){ $c ++; $total_item ++;}
if ($camara_fria_teto == 1 ){ $c ++; $total_item ++;}
if ($camara_fria_luminaria == 1 ){ $c ++; $total_item ++;}
if ($camara_fria_parede == 1 ){ $c ++; $total_item ++;}
if ($camara_fria_porta == 1 ){ $c ++; $total_item ++;}
if ($camara_fria_fiacao == 1 ){ $c ++; $total_item ++;}
if ($camara_fria_gaiola == 1 ){ $c ++; $total_item ++;}
if ($camara_fria_empilhadeira == 1 ){ $c ++; $total_item ++;}
if ($camara_fria_termo == 1 ){ $c ++; $total_item ++;}
if ($manga_parede == 1 ){ $c ++; $total_item ++;}
if ($manga_luminaria == 1 ){ $c ++; $total_item ++;}
if ($manga_porta == 1 ){ $c ++; $total_item ++;}
if ($manga_lixeira == 1 ){ $c ++; $total_item ++;}
if ($manga_balanca == 1 ){ $c ++; $total_item ++;}
if ($manga_teto == 1 ){ $c ++; $total_item ++;}
if ($galpao_balanca == 1 ){ $c ++; $total_item ++;}
if ($galpao_porta == 1 ){ $c ++; $total_item ++;}
if ($galpao_lixeira == 1 ){ $c ++; $total_item ++;}
if ($galpao_luminaria == 1 ){ $c ++; $total_item ++;}
if ($galpao_dispenser == 1 ){ $c ++; $total_item ++;}
if ($banheiro_masculino_teto == 1 ){ $c ++; $total_item ++;}
if ($banheiro_masculino_luminaria == 1 ){ $c ++; $total_item ++;}
if ($banheiro_masculino_parede == 1 ){ $c ++; $total_item ++;}
if ($banheiro_masculino_porta == 1 ){ $c ++; $total_item ++;}
if ($banheiro_masculino_mola == 1 ){ $c ++; $total_item ++;}
if ($banheiro_masculino_dispenser == 1 ){ $c ++; $total_item ++;}
if ($banheiro_masculino_pia == 1 ){ $c ++; $total_item ++;}
if ($banheiro_masculino_lixeira == 1 ){ $c ++; $total_item ++;}
if ($banheiro_masculino_janela == 1 ){ $c ++; $total_item ++;}
if ($banheiro_masculino_vaso == 1 ){ $c ++; $total_item ++;}
if ($banheiro_masculino_mictorio == 1 ){ $c ++; $total_item ++;}
if ($banheiro_masculino_chuveiro == 1 ){ $c ++; $total_item ++;}

	$sql = "insert into clp (
embalados_teto,
embalados_teto_obs,
embalados_luminaria,
embalados_luminaria_obs,
embalados_parede,
embalados_parede_obs,
embalados_porta,
embalados_porta_obs,
embalados_fiacao,
embalados_fiacao_obs,
embalados_balanca,
embalados_balanca_obs,
embalados_utensilio,
embalados_utensilio_obs,
embalados_dispenser,
embalados_dispenser_obs,
embalados_pia,
embalados_pia_obs,
embalados_lixeira,
embalados_lixeira_obs,
embalados_isca,
embalados_isca_obs,
cozinha_ind_teto,
cozinha_ind_teto_obs,
cozinha_ind_luminaria,
cozinha_ind_luminaria_obs,
cozinha_ind_parede,
cozinha_ind_parede_obs,
cozinha_ind_porta,
cozinha_ind_porta_obs,
cozinha_ind_fiacao,
cozinha_ind_fiacao_obs,
cozinha_ind_balanca,
cozinha_ind_balanca_obs,
cozinha_ind_computador,
cozinha_ind_computador_obs,
cozinha_ind_lixeira,
cozinha_ind_lixeira_obs,
banheiro_feminino_teto,
banheiro_feminino_teto_obs,
banheiro_feminino_luminaria,
banheiro_feminino_luminaria_obs,
banheiro_feminino_parede,
banheiro_feminino_parede_obs,
banheiro_feminino_porta,
banheiro_feminino_porta_obs,
banheiro_feminino_mola,
banheiro_feminino_mola_obs,
banheiro_feminino_dispenser,
banheiro_feminino_dispenser_obs,
banheiro_feminino_pia,
banheiro_feminino_pia_obs,
banheiro_feminino_lixeira,
banheiro_feminino_lixeira_obs,
banheiro_feminino_janela,
banheiro_feminino_janela_obs,
banheiro_feminino_vaso,
banheiro_feminino_vaso_obs,
banheiro_feminino_chuveiro,
banheiro_feminino_chuveiro_obs,
area_manutencao_obs,
obs,
camara_fria_teto,
camara_fria_teto_obs,
camara_fria_luminaria,
camara_fria_luminaria_obs,
camara_fria_parede,
camara_fria_parede_obs,
camara_fria_porta,
camara_fria_porta_obs,
camara_fria_fiacao,
camara_fria_fiacao_obs,
camara_fria_gaiola,
camara_fria_gaiola_obs,
camara_fria_empilhadeira,
camara_fria_empilhadeira_obs,
camara_fria_termo,
camara_fria_termo_obs,
manga_parede,
manga_parede_obs,
manga_luminaria,
manga_luminaria_obs,
manga_porta,
manga_porta_obs,
manga_lixeira,
manga_lixeira_obs,
manga_balanca,
manga_balanca_obs,
manga_teto,
manga_teto_obs,
galpao_balanca,
galpao_balanca_obs,
galpao_porta,
galpao_porta_obs,
galpao_lixeira,
galpao_lixeira_obs,
galpao_luminaria,
galpao_luminaria_obs,
galpao_dispenser,
galpao_dispenser_obs,
banheiro_masculino_teto,
banheiro_masculino_teto_obs,
banheiro_masculino_luminaria,
banheiro_masculino_luminaria_obs,
banheiro_masculino_parede,
banheiro_masculino_parede_obs,
banheiro_masculino_porta,
banheiro_masculino_porta_obs,
banheiro_masculino_mola,
banheiro_masculino_mola_obs,
banheiro_masculino_dispenser,
banheiro_masculino_dispenser_obs,
banheiro_masculino_pia,
banheiro_masculino_pia_obs,
banheiro_masculino_lixeira,
banheiro_masculino_lixeira_obs,
banheiro_masculino_janela,
banheiro_masculino_janela_obs,
banheiro_masculino_vaso,
banheiro_masculino_vaso_obs,
banheiro_masculino_mictorio,
banheiro_masculino_mictorio_obs,
banheiro_masculino_chuveiro,
banheiro_masculino_chuveiro_obs,
usuario_cad,
data_cad,
hora_cad,
data_clp,
data_verificacao,
total_item,
c,
nc
	) values (
'$embalados_teto',
'$embalados_teto_obs',
'$embalados_luminaria',
'$embalados_luminaria_obs',
'$embalados_parede',
'$embalados_parede_obs',
'$embalados_porta',
'$embalados_porta_obs',
'$embalados_fiacao',
'$embalados_fiacao_obs',
'$embalados_balanca',
'$embalados_balanca_obs',
'$embalados_utensilio',
'$embalados_utensilio_obs',
'$embalados_dispenser',
'$embalados_dispenser_obs',
'$embalados_pia',
'$embalados_pia_obs',
'$embalados_lixeira',
'$embalados_lixeira_obs',
'$embalados_isca',
'$embalados_isca_obs',
'$cozinha_ind_teto',
'$cozinha_ind_teto_obs',
'$cozinha_ind_luminaria',
'$cozinha_ind_luminaria_obs',
'$cozinha_ind_parede',
'$cozinha_ind_parede_obs',
'$cozinha_ind_porta',
'$cozinha_ind_porta_obs',
'$cozinha_ind_fiacao',
'$cozinha_ind_fiacao_obs',
'$cozinha_ind_balanca',
'$cozinha_ind_balanca_obs',
'$cozinha_ind_computador',
'$cozinha_ind_computador_obs',
'$cozinha_ind_lixeira',
'$cozinha_ind_lixeira_obs',
'$banheiro_feminino_teto',
'$banheiro_feminino_teto_obs',
'$banheiro_feminino_luminaria',
'$banheiro_feminino_luminaria_obs',
'$banheiro_feminino_parede',
'$banheiro_feminino_parede_obs',
'$banheiro_feminino_porta',
'$banheiro_feminino_porta_obs',
'$banheiro_feminino_mola',
'$banheiro_feminino_mola_obs',
'$banheiro_feminino_dispenser',
'$banheiro_feminino_dispenser_obs',
'$banheiro_feminino_pia',
'$banheiro_feminino_pia_obs',
'$banheiro_feminino_lixeira',
'$banheiro_feminino_lixeira_obs',
'$banheiro_feminino_janela',
'$banheiro_feminino_janela_obs',
'$banheiro_feminino_vaso',
'$banheiro_feminino_vaso_obs',
'$banheiro_feminino_chuveiro',
'$banheiro_feminino_chuveiro_obs',
'$area_manutencao_obs',
'$obs',
'$camara_fria_teto',
'$camara_fria_teto_obs',
'$camara_fria_luminaria',
'$camara_fria_luminaria_obs',
'$camara_fria_parede',
'$camara_fria_parede_obs',
'$camara_fria_porta',
'$camara_fria_porta_obs',
'$camara_fria_fiacao',
'$camara_fria_fiacao_obs',
'$camara_fria_gaiola',
'$camara_fria_gaiola_obs',
'$camara_fria_empilhadeira',
'$camara_fria_empilhadeira_obs',
'$camara_fria_termo',
'$camara_fria_termo_obs',
'$manga_parede',
'$manga_parede_obs',
'$manga_luminaria',
'$manga_luminaria_obs',
'$manga_porta',
'$manga_porta_obs',
'$manga_lixeira',
'$manga_lixeira_obs',
'$manga_balanca',
'$manga_balanca_obs',
'$manga_teto',
'$manga_teto_obs',
'$galpao_balanca',
'$galpao_balanca_obs',
'$galpao_porta',
'$galpao_porta_obs',
'$galpao_lixeira',
'$galpao_lixeira_obs',
'$galpao_luminaria',
'$galpao_luminaria_obs',
'$galpao_dispenser',
'$galpao_dispenser_obs',
'$banheiro_masculino_teto',
'$banheiro_masculino_teto_obs',
'$banheiro_masculino_luminaria',
'$banheiro_masculino_luminaria_obs',
'$banheiro_masculino_parede',
'$banheiro_masculino_parede_obs',
'$banheiro_masculino_porta',
'$banheiro_masculino_porta_obs',
'$banheiro_masculino_mola',
'$banheiro_masculino_mola_obs',
'$banheiro_masculino_dispenser',
'$banheiro_masculino_dispenser_obs',
'$banheiro_masculino_pia',
'$banheiro_masculino_pia_obs',
'$banheiro_masculino_lixeira',
'$banheiro_masculino_lixeira_obs',
'$banheiro_masculino_janela',
'$banheiro_masculino_janela_obs',
'$banheiro_masculino_vaso',
'$banheiro_masculino_vaso_obs',
'$banheiro_masculino_mictorio',
'$banheiro_masculino_mictorio_obs',
'$banheiro_masculino_chuveiro',
'$banheiro_masculino_chuveiro_obs',
'$usuario',
now(),
now(),
'$data',
'$data_verificacao',
'$total_item',
'$c',
'$nc'
	)";
	mysql_query($sql);
	
if ($embalados_teto == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('embalados_teto','$embalados_teto_obs','$embalados_teto','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($embalados_luminaria == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('embalados_luminaria','$embalados_luminaria_obs','$embalados_luminaria','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($embalados_parede == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('embalados_parede','$embalados_parede_obs','$embalados_parede','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($embalados_porta == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('embalados_porta','$embalados_porta_obs','$embalados_porta','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($embalados_fiacao == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('embalados_fiacao','$embalados_fiacao_obs','$embalados_fiacao','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($embalados_balanca == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('embalados_balanca','$embalados_balanca_obs','$embalados_balanca','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($embalados_utensilio == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('embalados_utensilio','$embalados_utensilio_obs','$embalados_utensilio','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($embalados_dispenser == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('embalados_dispenser','$embalados_dispenser_obs','$embalados_dispenser','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($embalados_pia == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('embalados_pia','$embalados_pia_obs','$embalados_pia','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($embalados_lixeira == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('embalados_lixeira','$embalados_lixeira_obs','$embalados_lixeira','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($embalados_isca == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('embalados_isca','$embalados_isca_obs','$embalados_isca','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($cozinha_ind_teto == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('cozinha_ind_teto','$cozinha_ind_teto_obs','$cozinha_ind_teto','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($cozinha_ind_luminaria == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('cozinha_ind_luminaria','$cozinha_ind_luminaria_obs','$cozinha_ind_luminaria','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($cozinha_ind_parede == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('cozinha_ind_parede','$cozinha_ind_parede_obs','$cozinha_ind_parede','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($cozinha_ind_porta == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('cozinha_ind_porta','$cozinha_ind_porta_obs','$cozinha_ind_porta','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($cozinha_ind_fiacao == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('cozinha_ind_fiacao','$cozinha_ind_fiacao_obs','$cozinha_ind_fiacao','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($cozinha_ind_balanca == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('cozinha_ind_balanca','$cozinha_ind_balanca_obs','$cozinha_ind_balanca','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($cozinha_ind_computador == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('cozinha_ind_computador','$cozinha_ind_computador_obs','$cozinha_ind_computador','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($cozinha_ind_lixeira == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('cozinha_ind_lixeira','$cozinha_ind_lixeira_obs','$cozinha_ind_lixeira','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_feminino_teto == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_feminino_teto','$banheiro_feminino_teto_obs','$banheiro_feminino_teto','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_feminino_luminaria == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_feminino_luminaria','$banheiro_feminino_luminaria_obs','$banheiro_feminino_luminaria','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_feminino_parede == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_feminino_parede','$banheiro_feminino_parede_obs','$banheiro_feminino_parede','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_feminino_porta == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_feminino_porta','$banheiro_feminino_porta_obs','$banheiro_feminino_porta','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_feminino_mola == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_feminino_mola','$banheiro_feminino_mola_obs','$banheiro_feminino_mola','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_feminino_dispenser == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_feminino_dispenser','$banheiro_feminino_dispenser_obs','$banheiro_feminino_dispenser','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_feminino_pia == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_feminino_pia','$banheiro_feminino_pia_obs','$banheiro_feminino_pia','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_feminino_lixeira == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_feminino_lixeira','$banheiro_feminino_lixeira_obs','$banheiro_feminino_lixeira','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_feminino_janela == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_feminino_janela','$banheiro_feminino_janela_obs','$banheiro_feminino_janela','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_feminino_vaso == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_feminino_vaso','$banheiro_feminino_vaso_obs','$banheiro_feminino_vaso','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_feminino_chuveiro == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_feminino_chuveiro','$banheiro_feminino_chuveiro_obs','$banheiro_feminino_chuveiro','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($camara_fria_teto == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('camara_fria_teto','$camara_fria_teto_obs','$camara_fria_teto','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($camara_fria_luminaria == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('camara_fria_luminaria','$camara_fria_luminaria_obs','$camara_fria_luminaria','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($camara_fria_parede == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('camara_fria_parede','$camara_fria_parede_obs','$camara_fria_parede','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($camara_fria_porta == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('camara_fria_porta','$camara_fria_porta_obs','$camara_fria_porta','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($camara_fria_fiacao == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('camara_fria_fiacao','$camara_fria_fiacao_obs','$camara_fria_fiacao','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($camara_fria_gaiola == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('camara_fria_gaiola','$camara_fria_gaiola_obs','$camara_fria_gaiola','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($camara_fria_empilhadeira == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('camara_fria_empilhadeira','$camara_fria_empilhadeira_obs','$camara_fria_empilhadeira','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($camara_fria_termo == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('camara_fria_termo','$camara_fria_termo_obs','$camara_fria_termo','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($manga_parede == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('manga_parede','$manga_parede_obs','$manga_parede','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($manga_luminaria == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('manga_luminaria','$manga_luminaria_obs','$manga_luminaria','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($manga_porta == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('manga_porta','$manga_porta_obs','$manga_porta','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($manga_lixeira == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('manga_lixeira','$manga_lixeira_obs','$manga_lixeira','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($manga_balanca == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('manga_balanca','$manga_balanca_obs','$manga_balanca','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($manga_teto == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('manga_teto','$manga_teto_obs','$manga_teto','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($galpao_balanca == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('galpao_balanca','$galpao_balanca_obs','$galpao_balanca','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($galpao_porta == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('galpao_porta','$galpao_porta_obs','$galpao_porta','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($galpao_lixeira == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('galpao_lixeira','$galpao_lixeira_obs','$galpao_lixeira','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($galpao_luminaria == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('galpao_luminaria','$galpao_luminaria_obs','$galpao_luminaria','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($galpao_dispenser == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('galpao_dispenser','$galpao_dispenser_obs','$galpao_dispenser','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_masculino_teto == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_masculino_teto','$banheiro_masculino_teto_obs','$banheiro_masculino_teto','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_masculino_luminaria == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_masculino_luminaria','$banheiro_masculino_luminaria_obs','$banheiro_masculino_luminaria','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_masculino_parede == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_masculino_parede','$banheiro_masculino_parede_obs','$banheiro_masculino_parede','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_masculino_porta == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_masculino_porta','$banheiro_masculino_porta_obs','$banheiro_masculino_porta','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_masculino_mola == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_masculino_mola','$banheiro_masculino_mola_obs','$banheiro_masculino_mola','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_masculino_dispenser == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_masculino_dispenser','$banheiro_masculino_dispenser_obs','$banheiro_masculino_dispenser','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_masculino_pia == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_masculino_pia','$banheiro_masculino_pia_obs','$banheiro_masculino_pia','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_masculino_lixeira == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_masculino_lixeira','$banheiro_masculino_lixeira_obs','$banheiro_masculino_lixeira','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_masculino_janela == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_masculino_janela','$banheiro_masculino_janela_obs','$banheiro_masculino_janela','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_masculino_vaso == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_masculino_vaso','$banheiro_masculino_vaso_obs','$banheiro_masculino_vaso','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_masculino_mictorio == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_masculino_mictorio','$banheiro_masculino_mictorio_obs','$banheiro_masculino_mictorio','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
if ($banheiro_masculino_chuveiro == 0 ){
	$sql_clp_nc = "insert into clp_nc 
	(descricao,obs,situacao,data_identificacao,usuario_identificacao,data_cad,hora_cad,usuario_cad) 
	values 
	('banheiro_masculino_chuveiro','$banheiro_masculino_chuveiro_obs','$banheiro_masculino_chuveiro','$data','$usuario',now(),now(),'$usuario')";
	mysql_query($sql_clp_nc);
	}
	}// Fim função cad
//************************************ INICIO Altera aferição *******************************************************	
if($funcao == "alt"){
$id = $_GET['id'];
if ( $_REQUEST['origem'] != "" and $_REQUEST['transporte'] != ""){
alt(
utf8_decode($_REQUEST['origem']),
utf8_decode($_REQUEST['cabine_limpeza']),
utf8_decode($_REQUEST['cabine_integridade']),
utf8_decode($_REQUEST['bau_limpeza']),
utf8_decode($_REQUEST['bau_integridade']),
utf8_decode($_REQUEST['pneu']),
utf8_decode($_REQUEST['uniforme_completo']),
utf8_decode($_REQUEST['uniforme_limpo']),
utf8_decode($_REQUEST['asseio']),
utf8_decode($_REQUEST['comportamento']),
utf8_decode($_REQUEST['usuario']),
utf8_decode($_REQUEST['transporte']));

	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../clp.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}
if ( $_REQUEST['origem'] == "" or $_REQUEST['transporte'] == ""){
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../clp.php?pg=alt&id=$id'>
	<script type=\"text/javascript\">	
	alert(\" Todos os campos obrigat&oacute;rios devem ser preenchidos.\");
	</script>";
	}
}
function alt($origem,$cabine_limpeza,$cabine_integridade,$bau_limpeza,$bau_integridade,$pneu,$uniforme_completo,$uniforme_limpo,$asseio,$comportamento,$usuario,$transporte){
		$id = $_GET['id'];
	$sql = (" UPDATE clp SET 
	origem='$origem',
	cabine_limpeza='$cabine_limpeza',
	cabine_integridade='$cabine_integridade',
	bau_limpeza='$bau_limpeza',
	bau_integridade='$bau_integridade',
	pneu='$pneu',
	uniforme_completo='$uniforme_completo',
	uniforme_limpo='$uniforme_limpo',
	asseio='$asseio',
	comportamento='$comportamento',
	transporte_id='$transporte',
	usuario_alt='$usuario',
	data_alt= now(),
	hora_alt= now()
	where id='$id'");
	mysql_query($sql);
	}


//************************************ INICIO Exclui Balança *******************************************************
if($funcao == "exclui"){
	$id = $_GET['id'];
	$sql = ("DELETE FROM clp where id='$id' limit 1");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../clp.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}

?>