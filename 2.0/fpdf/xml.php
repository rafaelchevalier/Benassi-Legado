<?
	require("../include/funcoes_aux.php");
	class xml {
		protected $valorTotalProd;
		
		protected $dir;
		protected $xml;	
		protected $arquivo;
		protected $nomeArquivo;
		protected $pasta;
		protected $prodRepetido;
		protected $qtdProdRepetido = 0;
		protected $qtdProdCadastrado = 0;

		//Dados cabeçalho NFE
		protected $chaveNfe;   			//CHAVE NFE
		protected $dataEmissao;        	// DATA EMISSÃO
		protected $numeroNfe;      		//NUMERO NFE
		protected $serieNfe;      		//SÈRIE NFE
		protected $razaoEmitente;      	//RAZÃO EMITENTE
		protected $fantasiaEmitente;    //NOME FANTASIA EMITENTE
		protected $cnpjEmitente;        //CNPJ EMITENTE
		protected $razaoDestinatario;   // RAZÃO DESTINATÁRIO 
		protected $cnpjDestinatario ;	// CNPJ DESTINATÁRIO
		protected $obsNFE;				// Observação da NFE
		//Dados Produtos NFE
		protected $codProd;				//Código Produto
		protected $codEanProd;			//EAN Produto
		protected $descricaoProd;		//Descrição Produto
		protected $ncmProd;				//EAN Produto
		protected $CFOPProd;			//CFOP Produto
		protected $valorProd;			//Descricao Produto
		protected $unidadeProd;			//Unidade Produto
		protected $quantidadeProd;		//Quando produto na NFe
		protected $valorUnitProd;		//Valor Unitário do Produto na NFe
		protected $infoAdProd;			//Informações adicionais do produto.
		
		
		public function __construct(){
			$this->dir = "../xml/";		// Caminho do Diretório padrão
			$this->pasta= opendir($this->dir); 	// Abrindo o diretório
			require_once "../include/conexao.php";//Faz o Conexão com banco de dados... a conexão não está em classe. 
		}

		public function xmlNfe(){
			
			while ($this->arquivo = readdir($this->pasta)){ // lendo os arquivos do diretorio
			$nome_arquivo = $this->arquivo; // Grava nome do arquivo para ser excluido na funcao excluiArquivo ao final antes de fechar o (While)
				$this->nomeArquivo = $this->arquivo; // Mantém o nome do aqruivo gravado antes do $this->arquivo serr convertido pela função simplexml_load_file
				//Verificacao para pegar apenas os arquivos e ignorar as pastas
				if ($this->arquivo != '.' && $this->arquivo != '..'){
					//Começamos agora a leitura do arquivo XML.
					$this->arquivo = simplexml_load_file($this->dir.$this->arquivo);
					foreach($this->arquivo->NFe->infNFe as $key => $xml){
						$this->chaveNfe = utf8_decode($xml->ide->NFref->refNFe);   //CHAVE NFE
						$this->dataEmissao = $xml->ide->dhEmi;        // DATA EMISSÃO
						$this->numeroNfe = $xml->ide->nNF;			  //NUMERO NFE
						$this->serieNfe = $xml->ide->serie;      	  //SÈRIE NFE
						$this->razaoEmitente = $xml->emit->xNome;     //RAZÃO EMITENTE
						$this->fantasiaEmitente = $xml->emit->xFant;  //NOME FANTASIA EMITENTE
						$this->cnpjEmitente = $xml->emit->CNPJ;       //CNPJ EMITENTE
						$this->razaoDestinatario = $xml->dest->xNome; // RAZÃO DESTINATÁRIO 
						$this->cnpjDestinatario = $xml->dest->CNPJ;	  // CNPJ DESTINATÁRIO
						$this->obsNFE = $xml->infAdic->infCpl;		  // Observação da NFE
						
							
						/*// exibindo os dados coletados
						echo "Nome do arquivo: ".$this->nomeArquivo."<br />";
						echo "CHAVE DE ACESSO: ".$this->chaveNfe." NFE ".$this->numeroNfe."-".$this->serieNfe."<br />"; 
						echo "Emissão: ".$this->dataEmissao. "<br> ";
						echo "Emitente: ".$this->razaoEmitente." | ".$this->cnpjEmitente."<br />" ;
						echo "Destinatário: ".$this->razaoDestinatario." | ".$this->cnpjDestinatario." <br>";
						echo "<br>"; 
						*/
						// Leitura dos Produtos esse bloco puxa todos os produtos
							foreach($this->arquivo->NFe->infNFe->det as $key => $xmlProd){
								$this->codProd = $xmlProd->prod->cProd;					//Código Produto
								$this->codEanProd = $xmlProd->prod->cEAN;				//EAN Produto
								$this->descricaoProd = $xmlProd->prod->xProd;			//Descrição Produto
								$this->ncmProd = $xmlProd->prod->CNM;					//EAN Produto
								$this->CFOPProd = $xmlProd->prod->CFOP;					//CFOP Produto
								$this->valorProd = $xmlProd->prod->vProd;			    //Descricao Produto
								$this->unidadeProd = $xmlProd->prod->uTrib;		        //Unidade Produto
								$this->quantidadeProd = $xmlProd->prod->qTrib;	    	//Quando produto na NFe
								$this->valorUnitProd = $xmlProd->prod->vUnTrib;	      	//Valor Unitário do Produto na NFe
								$this->infoAdProd = $xmlProd->infAdProd;			    //Informações adicionais do produto.
								 
								$this->valorTotalProd = $this->valorTotalProd+$this->valorProd;
							/*	echo utf8_decode("Código: $this->codProd - $this->descricaoProd (R$".number_format($this->valorProd, 2).")   -   ");
								echo utf8_decode("Informações adicionais Produto: (".$this->infoAdProd.")<br />");
							*/
								self:: cadXmlBanco(); //Cadastra as notas no banco de dados...
							}
							/*echo "<br />Valor Total:  R$".number_format($this->valorTotalProd, 2)." <br />";
							$this->valorTotalProd =0; // Zera o valor total para recomeçar o calculo do preço 	dos itens.
							echo utf8_encode("Obs: ".$this->obsNFE."<br />");
						echo "---------------------------------------------------------------------------------------------------------------------------------<br /><br />";
						*/
						self::excluiArquivo($this->dir,$nome_arquivo);
						sleep(5);
						//echo "---------------------------------------------------------------------------------------------------------------------------------<br /><br />";
						//echo "<br>"; 
					}
				}
			}
			echo"
				<script type=\"text/javascript\">	
					alert(\" Produtos cadastrados com sucesso ($this->qtdProdCadastrado)  -  Produtos não cadastro por duplicidade ($this->qtdProdRepetido).\");
				</script>
			";
		}
		public function cadXmlBanco(){
			$data_emissao = separa_data_nfe($this->dataEmissao);
			if(self::verificaProdNfe($this->chaveNfe,$this->codProd,$this->numeroNfe,$this->serieNfe) == 0){	
				$sql = "insert into xml_devolucoes_cab (
					chave,
					data_emissao,
					data_emissao_completa,
					num_nfe,
					serie_nfe,
					razao_emitente,
					fantasia_emitente,
					cnpj_emitente,
					razao_destinatario,
					cnpj_destinatario,
					obs_nfe
				) values (
					'$this->chaveNfe',
					'$data_emissao',
					'$this->dataEmissao',
					'$this->numeroNfe',
					'$this->serieNfe',
					'$this->razaoEmitente',
					'$this->fantasiaEmitente',
					'$this->cnpjEmitente',
					'$this->razaoDestinatario',
					'$this->cnpjDestinatario',
					'$this->obsNFE'
				)";
				mysql_query($sql);
				$sql = "insert into xml_devolucoes (
					chave,
					data_emissao,
					data_emissao_completa,
					num_nfe,
					serie_nfe,
					razao_emitente,
					fantasia_emitente,
					cnpj_emitente,
					razao_destinatario,
					cnpj_destinatario,
					cod_prod,
					ean_prod,
					descricao_prod,
					ncm_prod,
					cfop_prod,
					unidade_prod,
					quantidade_prod,
					valor_unit_prod,
					inf_adicional_prod,
					obs_nfe
				) values (
					'$this->chaveNfe',
					'$data_emissao',
					'$this->dataEmissao',
					'$this->numeroNfe',
					'$this->serieNfe',
					'$this->razaoEmitente',
					'$this->fantasiaEmitente',
					'$this->cnpjEmitente',
					'$this->razaoDestinatario',
					'$this->cnpjDestinatario',
					'$this->codProd',
					'$this->codEanProd',
					'$this->descricaoProd',
					'$this->ncmProd',
					'$this->CFOPProd',
					'$this->unidadeProd',
					'$this->quantidadeProd',
					'$this->valorUnitProd',
					'$this->infoAdProd',
					'$this->obsNFE'
				)";
				mysql_query($sql);
				$this->qtdProdCadastrado ++;
			}	
			else{
				$this->qtdProdRepetido ++;
			}
		}
		public function verificaProdNfe($chave,$cod_prod,$num_nfe,$serie_nfe){
			$cont = 0;
			$sql = mysql_query("
				SELECT * from xml_devolucoes 
				WHERE chave = '$chave'
				AND cod_prod = '$cod_prod'
				AND num_nfe ='$num_nfe'
				AND serie_nfe ='$serie_nfe'
			");
			while($linha = mysql_fetch_array($sql)){
				$cont ++;
			}
			$sql = mysql_query("
				SELECT * from xml_devolucoes_cab 
				WHERE chave = '$chave'
			");
			while($linha = mysql_fetch_array($sql)){
				$cont ++;
			}
			return($cont);
		}
		public function excluiArquivo($pasta,$nome_arquivo){
			$arquivo_apagar = $pasta.$nome_arquivo;
			if (!unlink($pasta.$arquivo_apagar)){
				echo ("Erro ao deletar $this->arquivo_apagar");
			}
			else{
				echo ("Deletado $this->arquivo_apagar com sucesso!");
			}
		}
	}
			
	
	$t = new xml();
	$t->xmlNfe();

?>