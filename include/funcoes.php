<?
/**************************************************************************************************************************
					Função Carrinho
**************************************************************************************************************************/

//Função para não gravar carrinho repetido no banco de dados

if(!function_exists('repete_carrinho')){
	function repete_carrinho($num_serie,$data_cad,$tipo_mov){
		$cont = 0;
		$sql = mysql_query("
			SELECT * from mov_carrinho 
			WHERE num_serie = '$num_serie'
			AND data_cad = '$data_cad'
			AND tipo_mov = '$tipo_mov'
		");
		while($linha = mysql_fetch_array($sql)){
			$cont ++;
		}
		return($cont);
	}
}
if(!function_exists('ativa_carrinho')){// Ativa Carrinho de flores
	function ativa_carrinho($id){
		require "conexao.php";
		$sql = (" UPDATE mov_carrinho SET ativo='1' where id='$id'");
		mysql_query($sql);
	}
}
if(!function_exists('desativa_carrinho')){// Desativa Carrinho de flores
	function desativa_carrinho($id){
		require "conexao.php";
		$sql = (" UPDATE mov_carrinho SET ativo='0' where id='$id'");
		mysql_query($sql);
	}
}

/**************************************************************************************************************************
					FIM Funcoes Carrinhos
**************************************************************************************************************************/
// Função formata data deixar sempre no inicio para não dar erro nas funções internas que utilizam a conversão de data
if (!function_exists('converte_data')) {
	function converte_data($data){
		if (strstr($data, "/")){
			$A = explode ("/", $data);
			$V_data = $A[2]."-".$A[1]."-".$A[0];
		}
		else{
			$A = explode ("-", $data);
			$V_data = $A[2]."/".$A[1]."/".$A[0];	
		}
		return $V_data;
	}
}

$data_atual =  date("d/m/Y");
$data_atual = converte_data($data_atual);
$nome_usuario_logado = $_SESSION['nome_usuario'];
require"conexao.php";

if (!function_exists('adiciona')) {
function adiciona($nome,$nivel_usuario,$login,$senha,$email,$dia,$mes,$telefone,$celular,$radio,$setor){
	$sql = "
		insert into login 
		(nome,id_perfil_acesso,login,senha,email,dia,mes,telefone,celular,radio,setor) 
		values 			
		('$nome','$nivel_usuario','$login','$senha','$email','$dia','$mes','$telefone','$celular','$radio','$setor')";
	mysql_query($sql);
	}
}
//************************************ INICIO MÓDULO PATRIMONIO *******************************************************
	 // Função adiciona inventário no banco de dados
if (!function_exists('adiciona_patrimonio')) {
	function adiciona_patrimonio($categoria,$descricao,$num_patrimonio,$fornecedor,$sala,$local,$valor,$data_compra,$situacao,$data_baixa,$motivo_baixa,$baixa,$nfe,$usuario,$serie,$categoria_depreciacao,$num_serie,$data_garantia){


		$data_compra = converte_data($data_compra);
		$valorFinal=str_replace(",",".",$valor);
		$sql = "
			insert into inventario 
				(categoria,descricao,num_patrimonio,fornecedor,sala,local,valor,data_compra,situacao,data_baixa,motivo_baixa,baixa,nfe,usuario,data_cad,serie,categoria_depreciacao,num_serie,data_garantia) 
			values 
				('$categoria','$descricao','$num_patrimonio','$fornecedor','$sala','$local','$valorFinal','$data_compra','$situacao','$data_baixa','$motivo_baixa','$baixa','$nfe','$usuario','$data_atual','$serie','$categoria_depreciacao','$num_serie','$data_garantia')";
		mysql_query($sql);
	}
}
if (!function_exists('baixa_patrimonio')) {	
	function baixa_patrimonio($tipo_baixa,$descricao,$empresa,$data_prevista){
		$id_patrimonio = $_GET['id'];
		$id_usuario = $_SESSION['id_usuario'];
		$nome_usuario = $_SESSION['nome_usuario'];
		$data_prevista = converte_data($data_prevista);
		$sql = (" 
			UPDATE inventario 
			SET 
				tipo_baixa='$tipo_baixa',
				motivo_baixa='$descricao',
				empresa_manutencao='$empresa',
				data_prevista='$data_prevista',
				data_baixa=now(), 
				baixa='1' 
			where id='$id_patrimonio' ");
		mysql_query($sql);
	}
}

//************************************ FIM MÓDULO PATRIMONIO *******************************************************


// Função adiciona empresa no banco de dados	
if (!function_exists('adiciona_empresa')) {
function adiciona_empresa($cod, $nome_fantasia, $razao_social, $endereco, $bairro, $bairro, $cidade, $contato, $email, $tel1, $tel2, $fax, $tipo_cadastro){
	$sql = "
		insert into empresa 
				(cod,nome_fantasia,razao_social,endereco,bairro,cidade,contato,email,tel1,tel2,fax,tipo_cadastro) 
			values 			
				('$cod','$nome_fantasia','$razao_social','$endereco','$bairro','$cidade','$contato','$email','$tel1','$tel2','$fax','$tipo_cadastro')";
	mysql_query($sql);
	}
}
//************************************ FIM CADASTROS *******************************************************
//************************************ FIM FUNÇÕES CHAMADO *******************************************************	
// ********* INICIO MÓDULO COMPRA ***************************
//Função adiciona pedido_compra
if (!function_exists('adiciona_pedido_compra')) {
	function adiciona_pedido_compra($solicitante,$setor,$prioridade,$descricao_pedido,
	$quantidade0,$produto0,$motivo0,
	$quantidade1,$produto1,$motivo1,
	$quantidade2,$produto2,$motivo2,
	$quantidade3,$produto3,$motivo3,
	$quantidade4,$produto4,$motivo4,
	$quantidade5,$produto5,$motivo5,
	$quantidade6,$produto6,$motivo6,
	$quantidade7,$produto7,$motivo7,
	$quantidade8,$produto8,$motivo8,
	$quantidade9,$produto9,$motivo9){
	//Conta a ultima ID de pedido de compra
	require"conexao.php";
	$sql_pedido_compra = mysql_query("
		SELECT id 
		FROM pedido_compra 
		ORDER BY id 
		DESC LIMIT 1 
	");
	$id_pedido = mysql_fetch_array($sql_pedido_compra);
	$id_pedido = $id_pedido['id'];
	$id_pedido ++;
	//Fim conta a ultima ID de pedido de compra
	$id_usuario_cad = $_SESSION['id_usuario'];
	$sql = "insert into pedido_compra(solicitante,setor,prioridade,descricao_pedido,data_cad,hora_cad,id_usuario_cad) values ('$solicitante','$setor','$prioridade','$descricao_pedido',now(),now(),'$id_usuario_cad')";
	mysql_query($sql);
	if($quantidade0 != '' and $produto0 != '' and $motivo0 != ''){//Teste se um campos estiver vazio não cadastra
		$sql0 = "insert into itens_pedido_compra(quantidade,produto,motivo,id_pedido,data_cad,hora_cad,id_usuario_cad) values ('$quantidade0','$produto0','$motivo0','$id_pedido',now(),now(),'$id_usuario_cad')";
		mysql_query($sql0);
	}
	if($quantidade1 != '' and $produto1 != '' and $motivo1 != ''){//Teste se um campos estiver vazio não cadastra
		$sql1 = "insert into itens_pedido_compra(quantidade,produto,motivo,id_pedido,data_cad,hora_cad,id_usuario_cad) values ('$quantidade1','$produto1','$motivo1','$id_pedido',now(),now(),'$id_usuario_cad')";
		mysql_query($sql1);
	}
	if($quantidade2 != '' and $produto2 != '' and $motivo2 != ''){//Teste se um campos estiver vazio não cadastra
		$sql2 = "insert into itens_pedido_compra(quantidade,produto,motivo,id_pedido,data_cad,hora_cad,id_usuario_cad) values ('$quantidade2','$produto2','$motivo2','$id_pedido',now(),now(),$id_usuario_cad)";
		mysql_query($sql2);
	}
	if($quantidade3 != '' and $produto3 != '' and $motivo3 != ''){//Teste se um campos estiver vazio não cadastra
		$sql3 = "insert into itens_pedido_compra(quantidade,produto,motivo,id_pedido,data_cad,hora_cad,id_usuario_cad) values ('$quantidade3','$produto3','$motivo3','$id_pedido',now(),now(),$id_usuario_cad)";
		mysql_query($sql3);
	}
	if($quantidade4 != '' and $produto4 != '' and $motivo4 != ''){//Teste se um campos estiver vazio não cadastra
		$sql4 = "insert into itens_pedido_compra(quantidade,produto,motivo,id_pedido,data_cad,hora_cad,id_usuario_cad) values ('$quantidade4','$produto4','$motivo4','$id_pedido',now(),now(),$id_usuario_cad)";
		mysql_query($sql4);
	}
	if($quantidade5 != '' and $produto5 != '' and $motivo5 != ''){//Teste se um campos estiver vazio não cadastra
		$sql5 = "insert into itens_pedido_compra(quantidade,produto,motivo,id_pedido,data_cad,hora_cad,id_usuario_cad) values ('$quantidade5','$produto5','$motivo5','$id_pedido',now(),now(),$id_usuario_cad)";
		mysql_query($sql5);
	}
	if($quantidade6 != '' and $produto6 != '' and $motivo6 != ''){//Teste se um campos estiver vazio não cadastra
		$sql6 = "insert into itens_pedido_compra(quantidade,produto,motivo,id_pedido,data_cad,hora_cad,id_usuario_cad) values ('$quantidade6','$produto6','$motivo6','$id_pedido',now(),now(),$id_usuario_cad)";
		mysql_query($sql6);
	}
	if($quantidade7 != '' and $produto7 != '' and $motivo7 != ''){//Teste se um campos estiver vazio não cadastra
		$sql7 = "insert into itens_pedido_compra(quantidade,produto,motivo,id_pedido,data_cad,hora_cad,id_usuario_cad) values ('$quantidade7','$produto7','$motivo7','$id_pedido',now(),now(),$id_usuario_cad)";
		mysql_query($sql7);
	}
	if($quantidade8 != '' and $produto8 != '' and $motivo8 != ''){//Teste se um campos estiver vazio não cadastra
		$sql8 = "insert into itens_pedido_compra(quantidade,produto,motivo,id_pedido,data_cad,hora_cad,id_usuario_cad) values ('$quantidade8','$produto8','$motivo8','$id_pedido',now(),now(),$id_usuario_cad)";
		mysql_query($sql8);
	}
	if($quantidade9 != '' and $produto9 != '' and $motivo9 != ''){//Teste se um campos estiver vazio não cadastra
		$sql9 = "insert into itens_pedido_compra(quantidade,produto,motivo,id_pedido,data_cad,hora_cad,id_usuario_cad) values ('$quantidade9','$produto9','$motivo9','$id_pedido',now(),now(),$id_usuario_cad)";
		mysql_query($sql9);
	}
$email_envio = "rafael.chevalier@benassirio.com.br";	
require"email/email_pedido.php";
	}//Fim função adiciona_pedido_compra
	
function aprova_pedido_compra($aprovado){
$id_usuario_cad = $_SESSION['id_usuario'];
$id = $_GET['id'];
$aberto ="1";
	$sql = (" UPDATE pedido_compra SET aprovado='$aprovado',id_responsavel='$id_usuario_cad',aberto='$aberto',data_aprovado='now()',hora_aprovado='now()' where id='$id'");
	mysql_query($sql);
	}
}
	
//********************** FIM MÓDULO COMPRA ********************************************

//************************************ FIM MÓDULO DE COMPRA *******************************************************

 // Função alterar no banco de dados
if (!function_exists('alterauser')) {
	function alterauser($nome,$nivel_usuario,$login,$senha,$email,$dia,$mes,$telefone,$celular,$radio,$setor){
		$id = $_GET['id'];
		$anti_sql =  anti_sql($id);
		if($senha != ""){
			$sql = (" 
				UPDATE login 
				SET 
					nome='$nome',
					id_perfil_acesso='$nivel_usuario',
					login='$login',
					senha='$senha',
					email='$email',
					dia='$dia',
					mes='$mes',
					telefone='$telefone',
					celular='$celular',
					radio='$radio',
					setor='$setor' 
				where id='$id'
			");
		}
		if($senha == ""){
	$sql = (" UPDATE login SET nome='$nome',id_perfil_acesso='$nivel_usuario',login='$login',email='$email',dia='$dia',mes='$mes',telefone='$telefone',celular='$celular',radio='$radio',setor='$setor' where id='$id'");
		}
	if( $anti_sql == 0){mysql_query($sql);}
	if( $anti_sql == 1){
		echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../usuarios.php?pg=alterauser'>
	<script type=\"text/javascript\">	
	alert(\"Erro filtro anti SQL.\");
	</script>";
		}
	
	}
}
// Função alterar inventario no banco de dados
if (!function_exists('altera_patrimonio')) {
function altera_patrimonio($categoria,$descricao,$num_patrimonio,$fornecedor,$sala,$local,$valor,$data_compra,$situacao,$data_baixa,$motivo_baixa,$baixa,$nfe,$usuario,$serie,$categoria_depreciacao,$num_serie,$data_garantia){
	$data_compra = converte_data($data_compra);
	$id = $_GET['id'];
	$sql = (" 
		UPDATE inventario SET categoria='$categoria',
		descricao='$descricao',
		num_patrimonio='$num_patrimonio',
		fornecedor='$fornecedor',
		sala='$sala',
		local='$local',
		valor='$valor',
		data_compra='$data_compra',
		situacao='$situacao',
		data_baixa='$data_baixa',
		motivo_baixa='$motivo_baixa',
		baixa='$baixa',
		nfe='$nfe',
		serie='$serie',
		categoria_depreciacao='$categoria_depreciacao',
		num_serie='$num_serie',
		data_garantia='$data_garantia' 
		where id='$id'
	");
	mysql_query($sql);	
	}
}
// Fim Função alterar no banco de dados

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
			$nome_fantasia = utf8_encode($linha['nome_fantasia']);
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
			$nome = utf8_encode($linha['nome']);
		}
		return($nome);
	}
}
if (!function_exists('busca_nome_mercado')) {
	function busca_nome_mercado($id){
		$id_mercado = "";
		$id_mercado = $id;
		$sql = mysql_query("
			SELECT * FROM mercado  
			WHERE id = '$id_mercado'
			LIMIT 1
		");
		$cont = mysql_num_rows($sql);
		while($linha = mysql_fetch_array($sql)){
				$nome = utf8_encode($linha['nome_fantasia']);
		}
		return($nome);
	}
}
if (!function_exists('busca_nome_rede')) {
	function busca_nome_rede($id){
		$sql = mysql_query("
			SELECT * FROM mercado  
			WHERE cod = '$id'
			LIMIT 1
		");
		$cont = mysql_num_rows($sql);
		while($linha = mysql_fetch_array($sql)){
			$nome = utf8_encode($linha['razao_social']);
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
		$id =0;
		$sql = mysql_query("
			SELECT * FROM tab_mix_produtos_cab  
			WHERE cod_tab = '$var'
		");
		$cont = mysql_num_rows($sql);
		while($linha = mysql_fetch_array($sql)){
			$id = utf8_encode($linha['id']);
		}
		return($id);
	}
}
if (!function_exists('busca_tipo_mov_carrinho')) {
	function busca_tipo_mov_carrinho($cod_carrinho){
		$sql = mysql_query("
			SELECT * FROM mov_carrinho  
			WHERE num_serie = '$cod_carrinho'
			LIMIT 1
		");
		$cont = mysql_num_rows($sql);
		while($linha = mysql_fetch_array($sql)){
			$tipo_mov = $linha['tipo_mov'];
		}
		return($tipo_mov);
	}
}
?>