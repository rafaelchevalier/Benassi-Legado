<?

/**************************************
* Função para validação de campos v1.2
* Autor: Jonatã Luiz Cioni
* Argumento unico array $campos
**************************************/
function ValidaFormulario(array $campos){
        //variaveis para armazenamento das mensagens
        $camposVazios = array();
        $camposErrados = array();
        $sucesso = true;
        $erro = '';
        
        // Faz um foreach em cada campo setado na função
        foreach($campos as $campo => $itens){
                // Se o campo estiver vazio, armazena a legenda do campo q esta vazio
                if(empty($_POST[$campo])){
                        $camposVazios[] = strtoupper($itens[0])."<br/>";
                }
                // se estiver setado o tipo de dado, a função validará de acordo com o q foi pedido na função
                // OBS IMPORTANTE: SE O CAMPO FOR ALFANUMERICO, NÃO COLOQUE TIPO NENHUM, POIS SÓ PRECISARA VALIDAR SE ESTA VAZIO
                if(!empty($_POST[$campo]) && array_key_exists('tipo',$itens)){
                        // Se for do tipo string, não aceitará letras
                        if($itens['tipo'] == 'string' && !preg_match("/^[a-zA-Z]+$/",$_POST[$campo])){
                                $camposErrados[] = "No campo ".strtoupper($itens[0])." voce só pode digitar letras<br/>";
                        }
                        // Se for do tipo inteiro, só aceitará numeros
                        if($itens['tipo'] == 'inteiro' && !preg_match("/^[0-9]+$/",$_POST[$campo])){
                                $camposErrados[] = "No campo ".strtoupper($itens[0])." voce só pode digitar números<br/>";
                        }
                        // tipo para comparação de dados com outro campo, consta no exemplo duas vezes...
                        if($itens['tipo'] == 'igualdade' && strlen($_POST[$campo]) != strlen($_POST[$itens['compara']])){
                                $camposErrados[] = "Os campos ".strtoupper($itens[0])." e ".strtoupper($itens['legenda_2'])." tem que ser iguais<br/>";
                        }
                        // valida o e-mail
                        if($itens['tipo'] == 'email' && !preg_match("/^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\-]+\.[a-z]{2,4}$/i",$_POST[$campo])){
                                $camposErrados[] = "Digite um E-mail válido no campo ".strtoupper($itens[0])."<br/>";
                        }
                        // valida o formato do telefone com DDD de 3 digitos
                        if($itens['tipo'] == 'ddd_telefone' && !preg_match("/^\(\d{3}\)[\s-]?\d{4}-\d{4}$/",$_POST[$campo])){
                                $camposErrados[] = "Digite o formato correto no campo ".strtoupper($itens[0]).", correto: (000)0000-0000<br/>";
                        }
                        // valida DD com 3 numeros, pois tem usuario que teima em colocar somente dois digitos, quando nós queremos os 3                        
                        if($itens['tipo'] == 'ddd_3' && !preg_match("/^\d{3}$/",$_POST[$campo])){
                                $camposErrados[] = "Digite o formato correto no campo ".strtoupper($itens[0]).", correto: 000<br/>";
                        }
                        // valida o numeros do telefone sem o DDD
                        if($itens['tipo'] == 'telefone' && !preg_match("/^\d{4}-\d{4}$/",$_POST[$campo])){
                                $camposErrados[] = "Digite o formato correto no campo ".strtoupper($itens[0]).", correto: 0000-0000<br/>";
                        }
                        // valida o CEP sem o traço
                        if($itens['tipo'] == 'cep_num' && !preg_match("/^\d{5}$/",$_POST[$campo])){
                                $camposErrados[] = "Digite o formato correto no campo ".strtoupper($itens[0])." correto: 00000000<br/>";
                        }
                        // valida o CEP com o traço
                        if($itens['tipo'] == 'cep' && !preg_match("/^\d{5}-\d{3}$/",$_POST[$campo])){
                                $camposErrados[] = "Digite o formato correto no campo ".strtoupper($itens[0])." correto: 00000-000<br/>";
                        }
                        // valida o tamanho do CPF
                        if($itens['tipo'] == 'cpf_num' && !preg_match("/^\d{11}$/",$_POST[$campo])){
                                $camposErrados[] = "Digite o formato correto no campo ".strtoupper($itens[0])." correto: 00000000000<br/>";
                        }
                        // valida o tamanho e o formato do CPF
                        if($itens['tipo'] == 'cpf_separators' && !preg_match("/^\d{3}.\d{3}.\d{3}-\d{2}$/",$_POST[$campo])){
                                $camposErrados[] = "Digite o formato correto no campo ".strtoupper($itens[0])." correto: 000.000.000-00<br/>";
                        }
                        // valida o tamanho do CNPJ, com o novo formato, de 15 digitos
                        if($itens['tipo'] == 'cnpj_num' && !preg_match("/^\d{15}$/",$_POST[$campo])){
                                $camposErrados[] = "Digite o formato correto no campo ".strtoupper($itens[0])." correto: 000000000000000<br/>";
                        }
                        // valida o formato e o tamanho do CNPJ já com o novo formato do CNPJ
                        if($itens['tipo'] == 'cnpj_separators' && !preg_match("/^\d{3}.\d{3}.\d{3}/\d{4}-\d{2}$/",$_POST[$campo])){
                                $camposErrados[] = "Digite o formato correto no campo ".strtoupper($itens[0])." correto: 000.000.000/0000-00<br/>";
                        }
                }
        }
        // verifica se houve algum erro
        if(count($camposVazios) > 0 || count($camposErrados) > 0){
                // se houve, mostra a mensagem com as legendas dos campos e os tipo de erro
                if(count($camposVazios) > 0){
                        $erro.= "Os seguintes campos Obrigatórios estăo vazios:<br/>".implode("",$camposVazios);
                }
                if(count($camposVazios) > 0 && count($camposErrados) > 0){
                        $erro.= '<br/>';
                }
                if(count($camposErrados) > 0){
                        $erro.= "Ocorreram os seguintes erros:<br/>".implode("",$camposErrados);
                }
                return $erro;
        }else{
                // se não retorna true
                return $sucesso;
        }
}


?>

<!-- Exemplo de como utilizar o código acima



if($_GET['teste'] == 'teste'){
        //exemplo:
        $validacao = ValidaFormulario(array(
                'nome' => array('Nome'),
                'endereco' => array('Endereço'),
                'email' => array('E-mail', 'tipo' => 'email'),
                'email_confirme' => array('Confirme seu E-mail', 'tipo' => 'igualdade', 'compara' => 'email', 'legenda_2' => 'E-mail'),
                'login' => array('Login'),
                'senha' => array('Senha'),
                'senha_confirme' => array('Repita a Senha', 'tipo' => 'igualdade', 'compara' => 'senha', 'legenda_2' => 'Senha'),
        ));
        
        if($validacao === true)
        {
                echo 'sucesso';
        }
        else
        {
                echo $validacao;
        }
        //fim do exemplo
}
?>
<form method="post" id="formulario" name="formulario" enctype="multipart/form-data" action="?teste=teste">
        Nome: <input type="text" name="nome" id="nome" value="<?php echo $_POST['nome'];?>" /></br>
        Endereço: <input type="text" name="endereco" id="endereco" value="<?php echo $_POST['endereco'];?>" /></br>
        E-mail: <input type="text" name="email" id="email" value="<?php echo $_POST['email'];?>" /></br>
        Confirme E-mail: <input type="text" name="email_confirme" id="email_confirme" value="<?php echo $_POST['email_confirme'];?>" /></br>
        Login: <input type="text" name="login" id="login" value="<?php echo $_POST['login'];?>" /></br>
        Senha: <input type="text" name="senha" id="senha" value="<?php echo $_POST['senha'];?>" /></br>
        Confirme Senha: <input type="text" name="senha_confirme" id="senha_confirme" value="<?php echo $_POST['senha_confirme'];?>" /></br>
    
        <input type="submit" name="mandar" id="mandar" value="Testar Campos" />
</form>

 Fim  Exemplo de como utilizar o código acima -->