<? 
	/* 
	* @author Rafael Chevalier Carvalho (definindo o autor)
	* @version 1.0 (definindo a versao)
	*/

$data_atual =  date("d/m/Y");


$nome_usuario_logado = $_SESSION['nome_usuario'];
require"conexao.php";

// Inicio Funções auxiliares 

// Função Separa Data XML NFE
//Formato Padrão é (2015-12-28T14:49:28-02:00)
if (!function_exists('separa_data_nfe')) {
	function separa_data_nfe($data){
		if (strstr($data, "T")){
			$A = explode ("T", $data);
			$V_data = $A[0];
		}
		return $V_data;
	}
}


// Função formata data
if (!function_exists('converte_data')) {
	function converte_data($data){
		if (strstr($data, "/")){
			$A = explode ("/", $data);
			$V_data = $A[2] . "-". $A[1] . "-" . $A[0];
		}
		elseif (strstr($data, ".")){
			$A = explode (".", $data);
			$V_data = $A[2] . "-". $A[1] . "-" . $A[0];
		}
		else{
			$A = explode ("-", $data);
			$V_data = $A[2] . "/". $A[1] . "/" . $A[0];	
		}
		return $V_data;
	}
}
if (!function_exists('converte_data2')) {
	function converte_data2($data){
		if (strstr($data, ".")){
			$A = explode (".", $data);
			$V_data = $A[2] . "-". $A[1] . "-" . $A[0];
		}else{
			$A = explode ("-", $data);
			$V_data = $A[2] . ".". $A[1] . "." . $A[0];	
		}

		return $V_data;
	}
}
if (!function_exists('converte_ponto_x_ifen')) {
	function converte_ponto_x_ifen($dado){
		$resultado = str_replace(".", "-", $dado);
		return $resultado;
	}
}
$data_atual = converte_data($data_atual);
// Troca (,) por (.)
if (!function_exists('converte_virgula')) {
	function converte_virgula($custo){
		$resultado = str_replace(",", ".", $custo);
		return $resultado;
	}
}


// Função de mascara 
//exemplo de como utilizar 
//echo mask($cnpj,'##.###.###/####-##');
//echo mask($cpf,'###.###.###-##');
//echo mask($cep,'#####-###');
//echo mask($data,'##/##/####');

if (!function_exists('mask')) {
	function mask($val, $mask){
		$maskared = '';
		$k = 0;
		for($i = 0; $i<=strlen($mask)-1; $i++){
			if($mask[$i] == '#'){
				if(isset($val[$k]))
					$maskared .= $val[$k++];
			}
			else{
				if(isset($mask[$i]))
					$maskared .= $mask[$i];
				}
			}
		return $maskared;
	}
}
//retorna diferença entre datas
if (!function_exists('vencido')) {
	function vencido($data,$datac){
	 //PREPARANDO DATA ATUAL

		$data = date("Ymd");
		$ano_atual = substr($data, 0, 4);
		$mes_atual = substr($data, 5, 2);
		$dia_atual = substr($data, 7, 2);

		//PREPARANDO DATA ANTIGA

		$datac = $row_rsRespE['data2'];
		$ano_c = substr($datac, 0, 4);
		$mes_c = substr($datac, 5, 2);
		$dia_c = substr($datac, 8, 2);

		//COMPARANDO
		if($ano_c >= $ano_atual and $mes_c >= $mes_c and $dia_c > $dia_atual ){
			$vencido == 0;
		}
		if($ano_c <= $ano_atual and $mes_c <= $mes_c and $dia_c < $dia_atual ){
			$vencido == 1;
		}
		return  $vencido;
	}
}

if (!function_exists('dataDif')) {
	function dataDif($data1, $data2, $intervalo) {
		switch ($intervalo) {
			case 'y':
				$Q = 86400*365;
            break; //ano
            case 'm':
                $Q = 2592000;
			break; //mes
			case 'd':
                $Q = 86400;
            break; //dia
            case 'h':
                $Q = 3600;
            break; //hora
            case 'n':
                $Q = 60;
            break; //minuto
			default:
				$Q = 1;
            break; //segundo
        }
        return round((strtotime($data2) - strtotime($data1)) / $Q);
    }
}
/**************************************************************************************************************************
					Função para evitar SQL injection
**************************************************************************************************************************/
if (!function_exists('anti_sql')) {
	function anti_sql($expressao)    { 
		$inject=0; 
		$expressao = strtolower($expressao); 
		//arrays com palavras e caracteres invalidos 
		$badword1 = array("' or 0=0 --",'" or 0=0 --',"or 0=0 --","' or 0=0 #","admin'--",'" or 0=0 #',"or 0=0 #","' or 'x'='x",'" or "x"="x',"') or ('x'='x","' or 1=1--",'" or 1=1--',"or 1=1--","' or a=a--",'" or "a"="a',"') or ('a'='a",'") or ("a"="a','hi" or "a"="a','hi" or 1=1 --',"hi' or 1=1 --","hi' or 'a'='a","hi') or ('a'='a",'hi") or ("a"="a',"or '1=1'");        
		$badword2 = array("select", " select","select "," insert"," update","update "," delete","delete "," drop","drop "," destroy","destroy ");             
		for($i=0;$i<sizeof($badword1);$i++) { 
			if(substr_count($expressao,$badword1[$i])!=0)
				$inject=1; 
		} 
		for($i=0;$i<sizeof($badword2);$i++)    { 
			if(substr_count($expressao,$badword2[$i])!=0)
				$inject=1;  
		} 
		$charvalidos = "abcdefghijklmnopqrstuvwxyz0123456789ÁÀÃÂÇÉÈÊÍÌÓÒÔÕÚÙÜÑáàãâçéèêíìóòôõúùüñ!?@#$%&(){}[]:;,.- "; 
		for($i=0;$i<strlen($expressao);$i++)    { 
			$char = substr($expressao,$i,1); 
			if(substr_count($charvalidos,$char)==0)
				$inject=1; 
		} 
		return($inject); 
	}
}
/**************************************************************************************************************************
					Funções devoluções. 
Abaixo são as funções apenas relacionadas a devoluções ne notas fiscais. 
**************************************************************************************************************************/
if (!function_exists('busca_cliente')) {
	function busca_cliente($cnpj){
		$cont = 0;
		$sql_loja = mysql_query("
			SELECT * FROM cadclientes  
			WHERE cnpj 	 = '$cnpj'
			AND ativo 	 = 'S'
			AND tipo_atendimento != '6'
			LIMIT 1
		");
		while($linha_loja = mysql_fetch_array($sql_loja)){
			$cont ++;
		}
		if($cont > 0)
			return true;
		else
			return false;
	}
}
/**************************************************************************************************************************
					Fim funções Devoluções
**************************************************************************************************************************/
/**************************************************************************************************************************
					Função busca banco
**************************************************************************************************************************/
if (!function_exists('busca_loja')) {
	function busca_loja($id_loja){
		$sql_loja = mysql_query("
			SELECT * FROM lojas  
			WHERE id = '$id_loja'
			LIMIT 1
		");
		$cont_empresa = mysql_num_rows($sql_loja);
		while($linha_loja = mysql_fetch_array($sql_loja)){
			$nome_loja = $linha_loja['loja'];
		}
	return($nome_loja);
	}
}

if (!function_exists('busca_empresa')) {
	function busca_empresa($id){
		$sql = mysql_query("
			SELECT * FROM empresa  
			WHERE id = '$id'
			LIMIT 1
		");
		$cont = mysql_num_rows($sql);
		while($linha = mysql_fetch_array($sql)){
			$nome_fantasia = utf8_decode($linha['nome_fantasia']);
		}
		return($nome_fantasia);
	}
}
if (!function_exists('busca_nome_usuario')) {
	function busca_nome_usuario($id){
		$sql = mysql_query("
			SELECT * FROM login  
			WHERE id = '$id'
			LIMIT 1
		");
		$cont = mysql_num_rows($sql);
		while($linha = mysql_fetch_array($sql)){
			$nome = utf8_decode($linha['nome']);
		}
		return($nome);
	}
}
if (!function_exists('busca_nome_mercado')) {
	function busca_nome_mercado($id){
		$nome = 0;
		$sql = mysql_query("
			SELECT * FROM mercado  
			WHERE id = '$id'
			LIMIT 1
		");
		$cont = mysql_num_rows($sql);
		while($linha = mysql_fetch_array($sql)){
			$nome = utf8_decode($linha['nome_fantasia']);
		}
		return($nome);
	}
}
if (!function_exists('busca_nome_rede')) {
	function busca_nome_rede($id){
		$nome = 0;
		$sql = mysql_query("
			SELECT * FROM mercado  
			WHERE cod = '$id'
			LIMIT 1
		");
		$cont = mysql_num_rows($sql);
		while($linha = mysql_fetch_array($sql)){
			$nome = utf8_decode($linha['razao_social']);
		}
		return($nome);
	}
}
if (!function_exists('consulta_cod_tab_existente')) {
	function consulta_cod_tab_existente($var){
		$sql = mysql_query("
			SELECT * FROM tab_mix_produtos_cab  
			WHERE cod_tab = '$var'
		");
		$cont = mysql_num_rows($sql);
		if($cont < 1 ){	$nome = 1;}
		if($cont > 0 ){	$nome = 0;}
		return($nome);
	}
}
if (!function_exists('consulta_id_tab_existente')) {
	function consulta_id_tab_existente($var){
		$sql = mysql_query("
			SELECT * FROM tab_mix_produtos_cab  
			WHERE cod_tab = '$var'
		");
		$cont = mysql_num_rows($sql);
		while($linha = mysql_fetch_array($sql)){
			$id = utf8_decode($linha['id']);
		}
		return($id);
	}
}
if (!function_exists('busca_descricao_prod_tab')) {
	function busca_descricao_prod_tab($var){
		$sql = mysql_query("
			SELECT DISTINCT descricao_prod  
			FROM tab_quebra_prod  
			WHERE cod_prod='$var'
			LIMIT 1
		");
		$cont = mysql_num_rows($sql);
		while($linha = mysql_fetch_array($sql)){
			$id = utf8_encode($linha['descricao_prod']);
		}
		return($id);
	}
}
if (!function_exists('verifica_situacao_doc')) {
	function verifica_situacao_doc($id){
		$sql = mysql_query("
				SELECT * FROM rh_doc_circulacao_de_documentos  
				WHERE id = '$id'
				and situacao = '0'
				limit 1
			");
		$cont = mysql_num_rows($sql);
		return($cont);
	}
}
if (!function_exists('busca_nome_caixas')) {
	function busca_nome_caixas($cod){
		$cod = "";
		$cod = $cod;
		$sql = mysql_query("
			SELECT * FROM caixas  
			WHERE cod = '$cod'
			LIMIT 1
		");
		$cont = mysql_num_rows($sql);
		while($linha = mysql_fetch_array($sql)){
			$nome = utf8_encode($linha['descricao']);
		}
		return($nome);
	}
}


?>