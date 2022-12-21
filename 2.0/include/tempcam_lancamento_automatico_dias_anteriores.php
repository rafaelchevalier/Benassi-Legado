<?

require 'funcoes.php';
require 'tempcam.php';
$funcao = $_REQUEST['funcao'];

$hora = date('H:i');// Puxa hora atual

//Define as variáveis para gravação
$nome = 'Qualidade'; 
$camara = 'Organico'; 
$temperatura = rand(19,21);  
$umidade = rand(80,90); 
$obs = '19/12/2022'; 


if($hora < '12:00'){
	$periodo = 'Manhã'; }
if($hora > '12:00' and $hora < '18:00'){
	$periodo = 'Tarde'; }
if ($hora > '18:00'){
	$periodo = 'Noite'; }

//$data = $data_atual;

//$dia = 01;
$mes = '10';
$ano = '2022';

for ($dia = 1 ; $dia < 31; $dia++ ){
	$periodo = 'Manhã';
	//$periodo = 'Tarde';
	
	$data =  date($ano.'-'.$mes.'-'.$dia);
	//var_dump($data);
	//Array scom as camaras e temperaturas e midades cadastradas
	$array_camara = array('Organicos','Camara 1','Camara 2','Camara 3','Camara 4','Antecamara','Cozinha Ind','Embalados','Setor Zona Sul','Camara Processados','Camara de legumes','Setor Processados','granel');
	$array_temperatura = array(rand(0,4),rand(0,4),rand(0,4),rand(0,4),rand(10,20),rand(18,22),rand(18,22),rand(18,22),rand(2,6),rand(12,14),rand(17,20),rand(18,22));
	$array_umidade = array(rand(70,95),rand(70,95),rand(70,95),rand(70,95),rand(70,95),rand(70,95),rand(70,95),rand(70,95),rand(70,95),rand(70,95),rand(70,95),rand(70,95));

	//array com dias da semana
	$diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
	// Varivel que recebe o dia da semana (0 = Domingo, 1 = Segunda ...)
	$diasemana_numero = date('w', strtotime($data));
	// Exibe o dia da semana com o Array
	$diasemana[$diasemana_numero];

	//Executa função cadastro de temperatura com as variáveis
		if($diasemana_numero > 0 AND $diasemana_numero < 7 ){//Filtro para não rodar função caso seja Domingo
			for($i=0 ; $i<=10 ; $i++){
				cad_tempcam($nome, $array_camara[$i], $array_temperatura[$i], $array_umidade[$i], $obs, utf8_decode($periodo),$data);
			}
		}
}		

//Última atualização 15/08/2022 - Inclusão da câmara Granel e rodando script de 12/2021 a 08/2022
?>
