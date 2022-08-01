<? 	// Função adiciona usuario no banco de dados
$data_atual =  date("d/m/Y");
$data_atual = converte_data($data_atual);
session_start();
$nome_usuario_logado = $_SESSION['nome_usuario'];



// Função formata data
function converte_data($data){
if (strstr($data, "/")){
$A = explode ("/", $data);
$V_data = $A[2] . "-". $A[1] . "-" . $A[0];
}
else{
$A = explode ("-", $data);
$V_data = $A[2] . "/". $A[1] . "/" . $A[0];	
}
return $V_data;
}
// Troca (,) por (.)
function converte_virgula($custo){
$resultado = str_replace(",", ".", $custo);
return $resultado;
}

// Função de mascara 
//exemplo de como utilizar 
//echo mask($cnpj,'##.###.###/####-##');
//echo mask($cpf,'###.###.###-##');
//echo mask($cep,'#####-###');
//echo mask($data,'##/##/####');

function mask($val, $mask)
{
 $maskared = '';
 $k = 0;
 for($i = 0; $i<=strlen($mask)-1; $i++)
 {
 if($mask[$i] == '#')
 {
 if(isset($val[$k]))
 $maskared .= $val[$k++];
 }
 else
 {
 if(isset($mask[$i]))
 $maskared .= $mask[$i];
 }
 }
 return $maskared;
}

//retorna diferença entre datas

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
/**************************************************************************************************************************
					Função para evitar SQL injection
**************************************************************************************************************************/
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

/**************************************************************************************************************************
					Função busca banco
**************************************************************************************************************************/
function busca_nome_grupo_produto($id){
			$sql = mysql_query("SELECT * FROM tb_grupo_produto  
										WHERE id = '$id'
										LIMIT 1
										");
			$cont = mysql_num_rows($sql);
			while($linha = mysql_fetch_array($sql)){
			$nome = utf8_encode($linha['nome']);
			}
			return($nome);
}
function busca_empresa($id){
			$sql = mysql_query("SELECT * FROM empresa  
										WHERE id = '$id'
										LIMIT 1
										");
			$cont = mysql_num_rows($sql);
			while($linha = mysql_fetch_array($sql)){
			$nome_fantasia = utf8_encode($linha['nome_fantasia']);
			}
			return($nome_fantasia);
}

function busca_nome_mercado($id){
			$sql = mysql_query("SELECT * FROM mercado  
										WHERE id = '$id'
										LIMIT 1
										");
			$cont = mysql_num_rows($sql);
			while($linha = mysql_fetch_array($sql)){
			$nome = utf8_encode($linha['nome_fantasia']);
			}
			return($nome);
}
function consulta_cod_tab_existente($var){
			$sql = mysql_query("SELECT * FROM tab_mix_produtos_cab  
										WHERE cod_tab = '$var'
										");
			$cont = mysql_num_rows($sql);
			if($cont < 1 ){	$nome = 1;}
			if($cont > 0 ){	$nome = 0;}
			return($nome);
}
function consulta_id_tab_existente($var){
			$sql = mysql_query("SELECT * FROM tab_mix_produtos_cab  
										WHERE cod_tab = '$var'
										");
			$cont = mysql_num_rows($sql);
			while($linha = mysql_fetch_array($sql)){
			$id = utf8_encode($linha['id']);
			}
			return($id);
}

?>