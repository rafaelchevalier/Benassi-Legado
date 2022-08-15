<?
require 'conexao.php';
require 'funcoes.php';

$funcao = $_REQUEST['funcao'];

$hora = date('H:i');// Puxa hora atual
//$hora = rand(0,23).":".rand(0,59);

//Arrays

$array_tipo = array("DESTINO","ORIGEM");

//Os arrays tem 149 itens 0 ao 148
$array_origem = array("AGC COM. FRUTAS/ BENASSI","AGRÍCOLA FRAIBURGO/BENASSI","AGUAÍ - SP / BENASSI-RJ ","ALTAMIRA/BENASSI RJ","ALVINO /BENASSI","ANDRADE SUN FARMS/BENASSI","BARRETOS - BENASSI RJ","BELO VALE - BENASSI RJ","BENASSI /  CARREFOUR","BENASSI /  CARREFOUR BARRA","BENASSI /  CARREFOUR BR","BENASSI /  CARREFOUR NS","BENASSI /  CEASA","BENASSI /  GB RIO DA PRATA","BENASSI /  GB SÃO JOAO","BENASSI /  GB VILA ISABEL","BENASSI /  GUANABARA","BENASSI /  GUANABARA 2","BENASSI /  GUANABARA ALCANTARA","BENASSI /  GUANABARA CAXIAS","BENASSI /  GUANABARA IRAJÁ","BENASSI /  GUANABARA REALENGO","BENASSI /  GUANABARA SG","BENASSI /  GUANABARA ST CRUZ","BENASSI /  ZONA SUL 11","BENASSI / ARMAZÉM DO GRÃO","BENASSI / ASSAÍ","BENASSI / CASA FRIBURGO","BENASSI / GUANABARA 17","BENASSI / ITAGUAÍ","BENASSI / MAKRO","BENASSI / PREZUNIC","BENASSI / PRINCESA","BENASSI / SENDAS","BENASSI / SUPER MARKET","BENASSI / ZONA SUL","BENASSI /CARREFOUR","BENASSI CD / BENASSI LOJA","BENASSI CD/BENASSI LOJA","BENASSI ES/BEBASSI","BENASSI RJ /  GUANABARA","BENASSI RJ / BRETAS JF","BENASSI RJ / CRF CAMPO GRANDE","BENASSI RJ/ GUANABARA","BENASSI RJ/GB CAMPINHO","BENASSI RJ/SENDAS","BENASSI SP / BENASSI RJ","BENASSI/ CARREFOUR NS","BENASSI/ARMAZÉM DO GRÃO","BENASSI/ASSAÍ","BENASSI/BANGU","BENASSI/CARREFOUR ","BENASSI/COSTA AZUL","BENASSI/FRATELLI","BENASSI/GB BENTO RIBEIRO","BENASSI/GB BONSUCESSO","BENASSI/GB PENHA","BENASSI/ITAGUAÍ","BENASSI/PREZUNIC","BENASSI/SENDAS","BENASSI/SUPERMARKET","BENASSI/WALMART","CACHOEIRA DE MACACU / BENASSI ","CAJ/BENASSI","CAJUBI / BENASSI RJ","CAMPINAS - BENASSI RJ","CASA BRANCA -SP/ BENASSI -RJ","CASA DA ABÓBORA / BENASSI","CEASA SP/ BENASSI RJ","CHAPECÓ / BENASSI","CONSUL/BENASSI","DALAIO/BENASSI RJ","ES/RJ","ESPÍRITO SANTO / BENASSI ","ESPÍRITO SANTO / BENASSI RJ","ESTRELA DALVA / BENASSI","ESTRELA DALVA / BENASSI","FERREIRA CAMPANHA / BENASSI","FRAIBURGO / BENASSI-RJ","FRATELLI / BENASSI","FRUTA VIDA/BENASSI","FRUTALAPA/BENASSI RJ","GUANABARA/BENASSI","ITALBRAZ/BENASSI","ITAOCARA/ BENASSI","ITAPETININGA / BENASSI","JFC / BENASSI","JFC/BENASSI","JOACIR/BENASSI","JOASA/BENASSI RJ","JUAZEIRO / BENASSI RJ","JUNDIAÍ / BENASSI RJ","LIMEIRA RN / BENASSI RJ","LINHARES / BENASSI RJ","LINHARES ES / BENASSI RJ","LINHARES, ES / BENASSI RJ","LIVRAMENTO - BENASSI RJ","LUCAS VENÂNCIO / BENASSI","MARCFRUT/BENASSI","MATA FRESCA/ BENASSI","MATO GROSSO / BENASSI","MATO GROSSO/BENASSI RJ","MINAS GERAIS / BENASSI RJ","MOGI GUAÇU - BENASSI RJ","MOJIGUAÇÚ / BENASSI","MOJIGUAÇÚ / BENASSI RJ","MOJIMIRIM / BENASSI","MOSSORÓ/ BENASSI","MOSSORÓ/ BENASSI - RJ","PARÁ / BENASSI RJ","PETROLINA / BENASSI","PETROLINA / BENASSI RJ","POMATEC/BENASSI","PORTO DO RIO / BENASSI","RABELLO/BENASSI","REAL FRUTAS/BENASSI","RIO DE JANEIRO - CARREFOUR","RIO DE JANEIRO - PREZUNIC","RIO GRANDE DO NORTE/BENASSI RJ","RN/BENASSI RJ","RODOFOLDO BETERRABA/BENASSI","S. JOSÉ RIO PARDO / BENASSI","SAFCO AGRÍCOLA / BENASSI","SAMUEL BORGE/BENASSI","SANTA CATARINA / BENASSI","SANTA LUCIA/BENASSIRJ","SANTA LÚCIA / BENASSI","SANTA MARTA / BENASSI","SAQUAREMA / BENASSI RJ","SC/RJ","SCUCATO/BENASSI RJ","SITIO BOM JARDIM/ BENASSIRJ","SP/RJ","SPECIAL FRUIT/BENASSI","SÃO FRANS. ITABAPOANA /BENASSI","SÃO FRANS. ITABAPUANA /BENASSI","SÃO FRANS. ITABAPUÃ /BENASSI","SÃO GOTARDO / BENASSI","SÃO JOSÉ / BENASSI","SÃO JOSÉ DO RIO PARDO /BENASSI","SÃO JOSÉ DO RIO PRETO /BENASSI","SÃO PAULO / BENASSI RJ","SÃO SEBASTIÃO DO PONTAL / BENA","TAJOBI -SP/ BENASSI-RJ","TERESÓPOLIS / BENASSI","TERESÓPOLIS / BENASSI RJ","TERESÓPOLIS/BENASSI","TOP MILHO / BENASSI","VACARIA RN / BENASSI RJ");
$total_origem = count($array_origem)-1;

$array_destino = array("BENASSI-RJ / PREZUNIC", "BENASSI-RJ / ASSAÍ","BENASSI-RJ / CARRFOUR","BENASSI-RJ / CASA DO SABÃO", "BENASSI-RJ / GUANABARA");
$total_destino = count($array_destino)-1;

$array_motorista = array("CARLOS EDUARDO","JOÃO","EDSON DONIZETE","RENAN GUSMAM","ALEX","EVERTON","EDUARDO","JOEL RIBEIRO","JOSÉLIO ANÍSIO","PAULO ROBERTO","EDSOM CARDOSO","ROBSON RODRIGUES","ELIANO LINOMARTES","ANDRÉ LUÍS","MARCIO ALBERTO","OLIMPIO FERREIRA","JOSÉ MARCOS","GENÉSIO TELES","RAIMUNDO NONATO","MURILLO DA SILVA","SÉRGIO BERNARDO","ANTONIO NETO","DANIEL AURELIANO","MAURÍCIO LOPES","ANTÔNIO REZENDE","PAULO","ANTÔNIO DOS SANTOS","ANDRÉ PEREIRA","JHONATAN LOPES","CLAUDECIR LAPA","PAULO SÉRGIO","HENRIQUE TRIGUEIRO","ANDRÉ FERNANDES","VALDIR PACHECO","JORGE CALISTO","AUGUSTO SEVERO","GENIVAL","MOISES BATISTA","MOISES BATISTA","GILBERTO HERPER","JOSÉ ADALBERTO","PAULO SÉRGIO","VANDERSON DA SILVA","JOSÉ A[","WILSOM SEIXAS","VALDIR PACHECO","JOSÉ PEDRO","ROBSON RODRIGUES","AUGUSTO","RODRIGO","SAULO DIOGO","GILBERTO ","PAULO","CARLOS SIMAS ","ALTAMIRO ALMEIDA","RENATO FERREIRA","GENÉSIO TELES","CLAUDECIR LAPA","OSMAR","VALDIR PACHECO","HÉLIO","CARLOS","SÉRGIO DA SILVA","WILSOM","VILMAR AMARAL","JOSÉ LUIZ","LUÍS DENTALHE","PETER","FABIO RAFAEL","NERSO LUZA","MARCELO","FABIANO","GILBERTO HERPES","GILBERTO HERPER","JOSÉ CARLOS","RICARDO PERES","JOÃO MATHIAS","OSWALDO FERREIRA","VILMAR AMARAL","CARLOS EDUARDO","WAGNER","JEDSOM","ANTÔNIO","JORGE","GABRIEL OLIVEIRA","JUNIOR","JOSE FRANSCISCO","JOSÉ FRANSISCO","GILBERTO","ELIAS PEREIRA","JOSÉ TORRES","SILVIO","ALDAIR JUQUETE","ALEXANDRE MARINA","PAULO SÉRGIO","GILBERTO PEREIRA","ERMANO SOUZA","PAULO","EDSON","PAULO SÉRGIO","MANUEL RODRIGUES","MANUEL RODRIGUES","JOEL SILVA","DENIVALDO","IVAN VIEIRA","RONALDO RAMALHO","MANUEL RODRIGUES","MARCELINO CAPELO","FRANSISCO ILDO","JAMILTON PINHEIRO","LAERCIO GONÇALVES","MARCOS PAULO","MAKSON","VAGNER JÚNIOR","JOÃO","CARLOS","JOSÉ CARLOS","OSMI COLLAÇO","MARCOS JOSÉ","WEDJAN","RICARDO","MARCO ANTÔNIO","SAVIO","FÁBIO","GILMAR ALVES","BRENO","JORGE","PAULO","LUCAS PEÇANHA","SILVANO CIVIEIRA","FERNANDO","LEONARDO","JAIR APARECIDO","JOSÉ","HUGLEYGUISON FELIX","MESSIAS DOS SANTOS","GUSTAVO FARIA","ARLINDO CUNHA","MARCELO","LUIZ FERNANDO","APARECIDO RODRIGUES","EDUARDO GOMES","MARCELO NATALINO","JOÃO PORFITA","EUCIMAR DAMIÃO","SEBASTIÃO FERREIRA","CIRLANDO","LEONARDO","MAXSON STEFEN");
$total_motorista = count($array_motorista)-1;

$array_placa = array("KPL-8490","MIC-9363","DWO-7646","OVF-7670","MTX-1776","FQN-6972","GBC-6412","THM-8694","KPA-6978","LME-7387","LAF-7921","KSH-0415","AMW-4350","JTF-5667","KTZ-2055","GUE-0363","LJC-5821","KMS-6535","EZU-9327","LIA-7683","KPO-3676","KTP-4570","KON-9999","KTR-6724","LCZ-5382","ECT-7669","LFJ-8442","KZH-1098","DBB-9084","LTX-2201","KQX-8667","KQY-7646","KXL-3585","KPE-3767","GSG-0653","LQU-5575","KSW-0415","ALS-4733","ALS-4733","PPI-7291","KNI-8988","KYK-0008","KSI-0313","KNI-8988","KRA-1083","KPE-3767","MDY-1776","KSH-0415","LOA-6240","AKZ-2755","LJX-2201","KUM-9905","LRU-6458","EZU-9325","KTE-0546","KTK-0260","KMS-6535","LGX-1941","BYF-0205","KPE-3767","KRN-3495","LLR-1416","KTK-1420","OYV-8552","CLJ-6798","LCD-5461","GUS-5952","KMI-3903","DDU-3132","MKY-3848","IVT-6388","MPW-5446","PPI-7291","PPI-7293","MQH-6225","LCO-6679","KQV-2240","CMB-6709","MFF-1338","AKA-1409","PPD-0837","MIA-4280","KPE-3776","MIA-5840","LAF-8291","OKG-3049","LQL-9670","LQL-9670","PPI-7291","KVO-5898","FEI-1425","FQN-6972","QJH-0395","DPE-4779","AWU-5095","MRH-9283","OZR-4480","CPI-2581","MFW-3718","KYK-0008","EZU-8901","EZU-8901","JHM-8694","EJM-6897","EJW-7783","IBL-6116","EZU-8901","MJU-2277","MLP-3040","MTC-8051","MGH-5929","EOF-7971","MQZ-4399","MBD-0545","MIC-9363","FQG-5103","PUF-7021","QIS-7021","MGR-7972","OEQ-1834","PUN-3332","EPO-6340","KWA-4813","OCB-2106","MJG-7377","CPI-2581","CLH-2581","MTY-8818","KVY-9435","MJH-3927","FQN-6972","KPK-2275","FST-6782","MKK-6139","HOC-6740","MTT-1620","HOC-6740","HIZ-6288","KTG-5365","FYI-0374","FQH-0282","GBC-6412","EZU-8901","CUD-5008","KPK-2275","LRP-5512","KWA-4816","MDI-6783","MIF-7636");
$total_placa = count($array_placa)-1;

//Arrays variaveis da vistoria
$array_bau_limpeza_obs = array("SUJO","BAÚ SUJO","PRESENÇA DE RESTOS VEGETAIS NO INTERIOR DO BAÚ");
$total_bau_limpeza_obs = count($array_bau_limpeza_obs)-1;

$array_cabine_limpeza_obs = array("CABINE SUJA","CABINE SUJA E DESORGANIZADA","CHãO DA CABINE SUJO.",);
$total_cabine_limpeza_obs = count($array_cabine_limpeza_obs)-1;

$array_uniforme_completo = array("SEM SAPATO FECHADO","AJUDANTE SEM O SAPATO DEVIDAMENTE CALÇADO","MOTORISTA APRESENTA-SE SEM CALÇADOS FECHADOS (CHINELO).","MOTORISTA COM CAMISETA ABERTA E CHINELO.");
$total_uniforme_completo = count($array_uniforme_completo)-1;


//CABINE
$cabine_limpeza=rand(0,1);
if($cabine_limpeza == 1){
	$cabine_limpeza_obs = '';
}else{
	$cabine_limpeza_obs = $array_cabine_limpeza_obs[rand(0,$total_cabine_limpeza_obs)];
}

$cabine_integridade = 1;
$cabine_integridade_obs = '';
//FIM CABINE
//BAU
$bau_limpeza = rand(0,1);
if($bau_limpeza == 1){
	$bau_limpeza_obs='';
}else {
	$bau_limpeza_obs = $array_bau_limpeza_obs[rand(0,$total_bau_limpeza_obs)];
}

$bau_integridade=1;
$bau_integridade_obs='';
//FIM  BAU
//PNEU
$pneu=1;
$pneu_obs='';
//FIM PNEU
//HIGIENE PESSOAL
$uniforme_completo=rand(0,1);
if($uniforme_completo == 1 ){
	$uniforme_completo_obs='';
}else{
	$uniforme_completo_obs = $array_uniforme_completo[rand(0,$total_uniforme_completo)];
}
$uniforme_limpo=1;
$uniforme_limpo_obs='';
$asseio=1;
$asseio_obs='';
$comportamento=1;
$comportamento_obs='';
//FIM HIGIENE PESSOAL
//GERAL
$certificado_pragas=1;
$certificado_pragas_obs='';
if($cabine_limpeza ==  0 || $bau_limpeza == 0 || $uniforme_completo == 0){
	$obs = "ORIENTAÇÃO AO MOTORISTA E COMUNICAÇÃO DIRETA A CHEFIA IMEDIATA.";
}else{
	$obs='';
}


//FIM GERAL

$tipo_destino_origem = $array_tipo[rand(0,1)];

//$data = $data_atual;
$hora = date('H:i:s');

//$dia = 01;
$limite_dia = '15';//Variavel com limite de dia
$mes = '08';//Variavel com mes inicial
$limite_mes = '08';//Variavel com mês limite. 
$ano = '2022';//Variavel com ano que vai rodas
for ($dia = 1; $dia <= $limite_dia ; $dia++){//Roda o intervalo de dias dentro do mes
	//Monta data
	$data =  date($ano.'-'.$mes.'-'.$dia);
		
	//array com dias da semana
	$diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
	
	// Varivel que recebe o dia da semana (0 = Domingo, 1 = Segunda ...)
	$diasemana_numero = date('w', strtotime($data));
	
	// Exibe o dia da semana com o Array
	$diasemana[$diasemana_numero];

		//Executa função apenas de segunda a sábado
		if($diasemana_numero > 0 AND $diasemana_numero < 7 ){
			$total_cont = 0;
			$linha_array = rand(0,148);
			if($tipo_destino_origem == 0){
				$linha_array_origem = rand(0,$total_destino);
			}else{
				$linha_array_origem = rand(0,$total_destino);
			}
			$linha01 = rand(0,1);
			echo " Data: ";
			echo $data;
			
			cad_lancamento_auto($data,
				$hora,
				$array_placa[$linha_array],
				$array_motorista[$linha_array],
				$array_tipo[$linha01],
				utf8_decode($array_origem[$linha_array_origem]),
				$cabine_limpeza,
				utf8_decode($cabine_limpeza_obs),
				$cabine_integridade,
				utf8_decode($cabine_integridade_obs),
				$bau_limpeza,
				utf8_decode($bau_limpeza_obs),
				$bau_integridade,
				utf8_decode($bau_integridade_obs),
				$pneu,
				utf8_decode($pneu_obs),
				$uniforme_completo,
				utf8_decode($uniforme_completo_obs),
				$uniforme_limpo,
				utf8_decode($uniforme_limpo_obs),
				$asseio,
				utf8_decode($asseio_obs),
				$comportamento,
				utf8_decode($comportamento_obs),
				$obs
			);
			echo " - OK.<br />";
		
		}
	}		
	

	function cad_lancamento_auto(
		$data,
		$hora,
		$placa,
		$motorista,
		$tipo,
		$origem,
		$cabine_limpeza,
		$cabine_limpeza_obs,
		$cabine_integridade,
		$cabine_integridade_obs,
		$bau_limpeza,
		$bau_limpeza_obs,
		$bau_integridade,
		$bau_integridade_obs,
		$pneu,
		$pneu_obs,
		$uniforme_completo,
		$uniforme_completo_obs,
		$uniforme_limpo,
		$uniforme_limpo_obs,
		$asseio,
		$asseio_obs,
		$comportamento,
		$comportamento_obs,
		$obs
		){// Cadastra
		//$usuario_cad = $_SESSION['login_usuario'];
		$usuario_cad = "Lilian ";
			$sql = "insert into pat (
			data_pat,
			hora_pat,
			placa,
			motorista,
			tipo,
			origem,
			cabine_limpeza,
			cabine_limpeza_obs,
			cabine_integridade,
			cabine_integridade_obs,
			bau_limpeza,
			bau_limpeza_obs,
			bau_integridade,
			bau_integridade_obs,
			pneu,
			pneu_obs,
			uniforme_completo,
			uniforme_completo_obs,
			uniforme_limpo,
			uniforme_limpo_obs,
			asseio,
			asseio_obs,
			comportamento,
			comportamento_obs,
			obs,
			usuario_cad,
			data_cad,
			hora_cad
			) values (
			'$data',
			'$hora',
			'$placa',
			'$motorista',
			'$tipo',
			'$origem',
			'$cabine_limpeza',
			'$cabine_limpeza_obs',
			'$cabine_integridade',
			'$cabine_integridade_obs',
			'$bau_limpeza',
			'$bau_limpeza_obs',
			'$bau_integridade',
			'$bau_integridade_obs',
			'$pneu',
			'$pneu_obs',
			'$uniforme_completo',
			'$uniforme_completo_obs',
			'$uniforme_limpo',
			'$uniforme_limpo_obs',
			'$asseio',
			'$asseio_obs',
			'$comportamento',
			'$comportamento_obs',
			'$obs',
			'$usuario_cad',
			now(),
			now()
			
			)";
			mysql_query($sql);
			}// Fim função cad
?>