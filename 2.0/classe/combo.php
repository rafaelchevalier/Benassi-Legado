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
	class combo extends conexaoMySQL
	{
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
		public function comboLojas($tabela,$campos,$valor,$nome)
		{
			$sql = "SELECT $campos FROM $tabela ";
			$qry = self::executarSQL($sql);
			
			while ($linha = self::listar($qry))
			{
				echo '<option value="'.$linha[$valor].'">'.$linha[$nome].'</option>'."\n";
				//echo '<option value="'.$linha["id_categoria"].'"'.$selecionado.'>'.$linha["categoria"].'</option>'."\n";
			}
			
		}
/********************************************************************************************************************************************************************************************************************
				Combos para tabela xml_devolucoes
/********************************************************************************************************************************************************************************************************************/
		public function ComboXmlDevolucoesInfAdcional($dado_combo){
			
			$sql = mysql_query("SELECT DISTINCT inf_adicional_prod FROM xml_devolucoes ORDER BY inf_adicional_prod ");
			$this->cont = mysql_num_rows($sql);
			while($linha = self::listarArray($sql)){
				if ($linha['inf_adicional_prod'] != ""){
					if($dado_combo == $linha['inf_adicional_prod'])
						$selecionado = 'selected="selected"';
				}
				echo '<option value="'.$linha['inf_adicional_prod'].'"'.$selecionado.'>'.utf8_encode($linha['inf_adicional_prod']).'</option>'."\n";
			}
		}
		
		public function ComboXmlDevolucoesRazaoRemetente($dado_combo){
		
			$sql = mysql_query("SELECT DISTINCT razao_emitente FROM xml_devolucoes ORDER BY razao_emitente ");
			$this->cont = mysql_num_rows($sql);
			while($linha = self::listarArray($sql)){
				if ($linha['razao_emitente'] != ""){
					if($dado_combo == $linha['razao_emitente'])
						$selecionado = 'selected="selected"';
				}
				echo '<option value="'.$linha['razao_emitente'].'"'.$selecionado.'>'.$linha['razao_emitente'].'</option>'."\n";
			}
		}
		public function ComboXmlDevolucoesRazaoDestinatario($dado_combo){
		
			$sql = mysql_query("SELECT DISTINCT razao_destinatario FROM xml_devolucoes ORDER BY razao_destinatario ");
			$this->cont = mysql_num_rows($sql);
			while($linha = self::listarArray($sql)){
				if ($linha['razao_destinatario'] != ""){
					if($dado_combo == $linha['razao_destinatario'])
						$selecionado = 'selected="selected"';
				}
				echo '<option value="'.$linha['razao_destinatario'].'"'.$selecionado.'>'.$linha['razao_destinatario'].'</option>'."\n";
			}
		}
		public function ComboXmlDevolucoesCnpjRemetente($dado_combo){
			
			$sql = mysql_query("SELECT DISTINCT cnpj_emitente FROM xml_devolucoes ORDER BY cnpj_emitente ");
			$this->cont = mysql_num_rows($sql);
			while($linha = self::listarArray($sql)){
				if ($linha['cnpj_emitente'] != ""){
					if($dado_combo == $linha['cnpj_emitente'])
						$selecionado = '';
						//$selecionado = 'selected="selected"';

					$razaoRemetente = self::BuscaXmlDevolucoesRazaoRemetente($linha['cnpj_emitente']);
					$cnpjRemetente = mask($linha['cnpj_emitente'],'##.###.###/####-##');
				}
				echo '<option value="'.$linha['cnpj_emitente'].'"'.$selecionado.'>'.$razaoRemetente.' - '.$cnpjRemetente.'</option>'."\n";
			}
		}
		public function ComboXmlDevolucoesCnpjDestinatario($dado_combo){
						
			$sql = mysql_query("SELECT DISTINCT cnpj_destinatario FROM xml_devolucoes ORDER BY cnpj_destinatario ");
			$this->cont = mysql_num_rows($sql);
			while($linha = self::listarArray($sql)){
				if ($linha['cnpj_destinatario'] != ""){
					if($dado_combo == $linha['cnpj_destinatario'])
						$selecionado = '';
						//$selecionado = 'selected="selected"';
					
					$razaoDestinatario = self::BuscaXmlDevolucoesRazaoDestinatario($linha['cnpj_destinatario']);
					$cnpjDestinatario = mask($linha['cnpj_destinatario'],'##.###.###/####-##');
				}
				echo '<option value="'.$linha['cnpj_destinatario'].'"'.$selecionado.'>'.$razaoDestinatario.' - '.$cnpjDestinatario.'</option>'."\n";
			}
		}
/********************************************************************************************************************************************************************************************************************
				Combos para tabela xml_devolucoes
/********************************************************************************************************************************************************************************************************************/	
/********************************************************************************************************************************************************************************************************************
				Classe para puxar campo dados da tabela xml_devolucoes
/********************************************************************************************************************************************************************************************************************/	
		// @var Busca na Tabela xml_devolucoes o campo razao_remetente pelo CNPJ: É o CNPJ de quem enviou o XML
		public function BuscaXmlDevolucoesRazaoRemetente($cnpj){ 
			$qry = self::executarSQL("SELECT razao_emitente FROM xml_devolucoes WHERE cnpj_emitente = $cnpj ");
			while($linha = self::listar($qry)){
				return($linha['razao_emitente']);
			}
		}
		
		// @var Busca na Tabela xml_devolucoes o campo razao_destinatario pelo CNPJ: É o CNPJ de quem recebe o XML
		public function BuscaXmlDevolucoesRazaoDestinatario($cnpj){ 
			$qry = self::executarSQL("SELECT razao_destinatario FROM xml_devolucoes WHERE cnpj_destinatario = $cnpj");
			while($linha = self::listar($qry)){
				return($linha['razao_destinatario']);
			}
		}
/********************************************************************************************************************************************************************************************************************
				Classe para puxar campo dados da tabela xml_devolucoes
/********************************************************************************************************************************************************************************************************************/		
		public function BuscaRedeMercado(){
			// Consulta para buscar os tipos únicos de camaras lançadas no sistema. 
			$sql_filtro = mysql_query("SELECT DISTINCT razao_social,cod 
			FROM mercado 
			ORDER BY cod ");
			$cont_filtro = mysql_num_rows($sql_filtro);
			while($linha_filtro = mysql_fetch_array($sql_filtro)){
				if ($linha_filtro['cod'] != ""){
					echo "<option value="<? echo utf8_decode($linha_filtro['cod']) ?>" multiple ><? echo $linha_filtro['cod']." - ".utf8_encode($linha_filtro['razao_social']) ?></option>";
				}
			}
		}
	}
?>