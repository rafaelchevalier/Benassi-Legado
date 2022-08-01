<? 	// Função adiciona no banco de dados
function adiciona($nome,$login,$senha,$email,$nivel_usuario,$hora_inicio,$hora_fim,$contato){
	$senhaCript = md5($senha);
	$sql = "insert into login (nome,login,senha,email,nivel_usuario,hora_inicio,hora_fim,contato) values ('$nome','$login','$senhaCript','$email','$nivel_usuario','$hora_inicio','$hora_fim','$contato')";
	mysql_query($sql);
	}
function adicionacaixa($cod,$tamanho,$cor,$descricao){
	$sql = "insert into caixas (cod,tamanho,cor,descricao) values ('$cod','$tamanho','$cor','$descricao')";
	mysql_query($sql);
	}
function adicionamercado($cod,$filial,$razao_social,$nome_fantasia,$cnpj,$rua,$bairro,$cidade,$cep,$estoque,$cod_funcionario,$nome_funcionario){
	$sql = "insert into mercado (cod,filial,razao_social,nome_fantasia,cnpj,rua,bairro,cidade,cep,estoque,cod_funcionario,nome_funcionario) values ('$cod','$filial','$razao_social','$nome_fantasia','$cnpj','$rua','$bairro','$cidade','$cep','$estoque','$cod_funcionario','$nome_funcionario')";
	mysql_query($sql);
	}
function adiciona_contagem($cod_mercado,$mercado,$cod_funcionario,$funcionario,$data_contagem,$quantidade,$baixa,$placa,$devolucao,$nota_devolucao, $serie_nfe){
$placa = strtoupper($placa);
	$sql = "insert into contagem (cod_mercado,mercado,cod_funcionario,funcionario,data_contagem,data_cadastro,quantidade,hora_cad,baixa,placa,devolucao,nota_devolucao,serie_nfe) 
values ('$cod_mercado','$mercado','$cod_funcionario','$funcionario',now(),now(),'$quantidade',now(),'$baixa','$placa','$devolucao','$nota_devolucao','$serie_nfe')";
echo"
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=index.php'>
	<script type=\"text/javascript\">	
	alert(\" Sua contagem foi realizada com sucesso. \t Código verificador é (" <? echo $cod_mercado;?> ")\");
	</script>";
	mysql_query($sql);
	}
	 // Função adiciona no banco de dados
?>
<?

 // Função alterar no banco de dados
 
 //Funcação altera usuário
function alteraadm($nome,$login,$senha,$email,$nivel_usuario,$hora_inicio,$hora_fim,$contato){
if ($senha == "" ){//Teste não deixa mudar a senha caso o campo senha esteja vazio
	$id = $_GET['id'];
		if ($_SESSION['nivel_usuario_caixa'] < 1){//Teste para liberar os acessos quando nível do usuário for administrador ou master
	$sql = (" UPDATE login SET nome='$nome',login='$login',email='$email',nivel_usuario='$nivel_usuario',hora_inicio='$hora_inicio',hora_fim='$hora_fim',contato='$contato' where id='$id'");}
		if ($_SESSION['nivel_usuario_caixa'] > 1){	//Teste para liberar os acessos quando nível do usuário for usuario 
	$sql = (" UPDATE login SET nome='$nome',login='$login',email='$email',contato='$contato'  where id='$id'");}
}
if ($senha != "" ){
	$senhaCript = md5($senha);
	$id = $_GET['id'];
		if ($_SESSION['nivel_usuario_caixa'] < 1){//Teste para liberar os acessos quando nível do usuário for administrador ou master
	$sql = (" UPDATE login SET nome='$nome',login='$login',senha='$senhaCript',email='$email',nivel_usuario='$nivel_usuario',hora_inicio='$hora_inicio',hora_fim='$hora_fim',contato='$contato'  where id='$id'");}
		if ($_SESSION['nivel_usuario_caixa'] > 1){	//Teste para liberar os acessos quando nível do usuário for usuario 
	$sql = (" UPDATE login SET nome='$nome',login='$login',senha='$senhaCript',email='$email',contato='$contato'  where id='$id'");}
}
	mysql_query($sql);
	}
//Fim funcação altera usuário

function alteracaixa($cod,$tamanho,$cor,$descricao){
	$id = $_GET['id'];
	$sql = (" UPDATE caixas SET cod='$cod', tamanho='$tamanho', cor='$cor', descricao='$descricao' where id='$id'");
	mysql_query($sql);
	}

function alteramercado($cod,$filial,$razao_social,$nome_fantasia,$cnpj,$rua,$bairro,$cidade,$cep,$estoque,$cod_funcionario){
	$id = $_GET['id'];
	$sql = (" UPDATE mercado SET cod='$cod',filial='$filial', razao_social='$razao_social', nome_fantasia='$nome_fantasia', cnpj='$cnpj', rua='$rua', bairro='$bairro', cidade='$cidade', cep='$cep', estoque='$estoque', cod_funcionario='$cod_funcionario' where id='$id'");
	mysql_query($sql);
	}
function altera_contagem($quantidade,$usuario_alt,$data_alt,$baixa,$placa,$nota_devolucao,$serie_nfe){
	$id = $_GET['id'];
	$sql = (" UPDATE contagem SET quantidade='$quantidade', usuario_alt='$usuario_alt', data_alt=now(), hora_alt=now(), baixa='$baixa', placa='$placa',nota_devolucao='$nota_devolucao',serie_nfe='$serie_nfe' where id='$id'");
	mysql_query($sql);
	}

// Fim Função alterar no banco de dados
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


?>
	