<?php
	/*Essa classe são as integrações referente a devoluções utilzia as tabelas (xml_devolucoes e xml_devolucoes_cab)na base de dados... 
	* @author Rafael Chevalier Carvalho 
	* @version 1.0 (definindo a versao)
	*/
	require_once("conexaoMySQL.php");
	require_once("../include/funcoes_aux.php");
	//Inclui da classe o arquivo com algumas funções auxiliares não estão em padrão OO. Funções utilizadas:
	// mask(para poder mudar )
	require_once("../include/funcoes.php");
	class ComboBox extends conexaoMySQL
	{
		
		private $seleciona = "";
		private $tabela="";
		private $valor="";
		private $filtro="";
		private $campos="";
		private $campo_retorno="";
		
		
		public $cont; //@var variavel para contar a qualtidade de resultados 
		
		/*//exemplo padrão	de combo 
		public function mostrarCategorias($id)
		{
			$sql = "SELECT id_categoria, categoria FROM categoria";
			$qry = self::executarSQL($sql);
			
			while ($linha = self::listar($qry))
			{
				if($id==$linha["id_categoria"])
				{
					$selecionado='selected="selected"';
				}
				else
				{
					$selecionado='';
				}
				echo '<option value="'.$linha["id_categoria"].'"'.$selecionado.'>'.$linha["categoria"].'</option>'."\n";
			}
			
		}
		*/

		//Combo Lojas Benassi
		public function comboBasico()
		{
			
			$sql = "SELECT $this->campos FROM $this->tabela WHERE ativo=1 $this->filtro";
			$qry = self::executarSQL($sql);
			
			while ($linha = self::listar($qry))
			{
				if($linha[$this->valor] == $this->seleciona){
					$this->selected = 'selected="selected"';
				}
				if($linha[$this->valor] != $this->seleciona){
					$this->selected = '';
				}
			echo '<option value="'.$linha[$this->valor].'"'.$this->selected.'>'.$linha[$this->valor]." - ".$linha[$this->campo_retorno].'</option>'."\n";
			}
		}
		public function comboLoja($valor,$nome_retorno,$seleciona,$filtros){
			
			$this->valor = $valor;//Geralmento é o ID é o valor que será gravado no banco de dados
			$this->seleciona = $seleciona;//É o valor que sera filtrado para selecionar o combo box
			$this->filtro = $filtros;//Filtros extras comaçando com AND ....
			$this->campo_retorno = $nome_retorno;//Nome do campo de retorno da tabela
			$this->tabela = "lojas";//Nome da Tabela do banco
			$this->campos = "id,loja";//Campos para busca
			self::comboBasico();
		}
	}
?>