<?php
	/*Essa classe são as integrações referente a devoluções utilzia as tabelas (xml_devolucoes e xml_devolucoes_cab)na base de dados... 
	* @author Rafael Chevalier Carvalho 
	* @version 1.0 (definindo a versao)
	*/
	require_once("conexaoMySQL.php");
	class BuscaDados extends conexaoMySQL
	{
		private $tabela;
		private $campos;
		private $filtro;
		private $campo_retorno;
		
		public function buscaPadrao(){
			$sql = "SELECT $this->campos FROM $this->tabela $this->filtro";
			$qry = self::executarSQL($sql);
			
			while ($linha = self::listar($qry))
			{
				echo utf8_decode($linha[$this->campo_retorno]);
			}
		}
		
		public function buscaNomeLoja($id)
		{
			//Busca o nome da loja pelo ID 
			$this->tabela = "lojas";
			$this->campos = "loja";
			$this->filtro = "WHERE id=$id";
			$this->campo_retorno = "loja";

			self::buscaPadrao();
		
		}
	}
?>