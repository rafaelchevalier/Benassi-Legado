<? 
/**
 *    Exemplo de utilização de utilização de WebService Kinghost
 *    www.kinghost.com.br
 */
$pg = $_REQUEST['pg'];


class cep
{
	
	public $cep;
	public $num;
	public $tipo_logradouro;//tipo de endereço
	public $logradouro;//Nome da Rua
	public $bairro; 		 
	public $cidade;			 
	public $uf;
	public $resultado;
	public $xmlGoogle;
	
	
	function __construct ($cep,$num)
	{
		$webservice_url     = 'http://webservice.uni5.net/web_cep.php';
		$webservice_query    = array(
			'auth'    => '61e605ebc8126ec715f4b9e0d26443f1', // Chave de autenticação do WebService
			'formato' => 'query_string', // Valores possíveis: xml, query_string ou javascript
			'cep'     => "$cep" // CEP que será pesquisado
		);
		//Forma URL
		$webservice_url .= '?';
		foreach($webservice_query as $get_key => $get_value)
		{
			$webservice_url .= $get_key.'='.urlencode($get_value).'&';
		}

		parse_str(file_get_contents($webservice_url), $resultado);
		$this->resultado = $resultado['resultado'];//define se o resultado é válido 
		switch($resultado['resultado'])
		{  
			case '2':  
				$this->cidade = $resultado['cidade'];
				$this->uf 	= $resultado['uf'];
				$endereco = $this->cidade."+".$this->uf;
				$this->xmlGoogle = self::xmlGoogleMaps($endereco);
				$texto = "
					Cidade com logradouro único 
					<br /><b>Cidade: </b> ".$resultado['cidade']." 
					<br /><b>UF: </b> ".$resultado['uf']." 
				";    
			break;  
			  
			case '1':  
				$this->tipo_logradouro 	= $resultado['tipo_logradouro'];
				$this->logradouro		= $resultado['logradouro'];
				$this->bairro 		 	= $resultado['bairro'];
				$this->cidade			= $resultado['cidade'];
				$this->uf				= $resultado['uf'];
				
				if(!empty($this->num))
				{
					//Concatena número caso exista
					utf8_encode($endereco = $this->num."+"."+".$this->logradouro."+".$this->bairro."+".$this->cidade."+".$this->uf);
				}
				else
				{
					$endereco = utf8_encode($this->logradouro."+".$this->bairro."+".$this->cidade."+".$this->uf);
				}
				
				$this->xmlGoogle = self::xmlGoogleMaps($endereco);
				
				/*$texto = " 
					Cidade com logradouro completo 
					<br /><b>Tipo de Logradouro: </b> ".$resultado['tipo_logradouro']." 
					<br /><b>Logradouro: </b> ".$resultado['logradouro']." 
					<br /><b>Bairro: </b> ".$resultado['bairro']." 
					<br /><b>Cidade: </b> ".$resultado['cidade']." 
					<br /><b>UF: </b> ".$resultado['uf']." 
				";*/  
			break;  
			  
			default:  
				$texto = "Falha ao buscar cep: ".$cep;  
			break;  
		}
		
	}
	private function xmlGoogleMaps($endereco)
	{
		$api_key ="AIzaSyB-VWYcpXfpAQ9aHN6nKSqE_8DsntQDZ0k";
		$link_xml_google ="https://maps.googleapis.com/maps/api/geocode/xml?address=$endereco,+br&key=$api_key";
		//$link_xml_google ="https://maps.googleapis.com/maps/api/geocode/xml?address=Rua Severiano Monteiro - Brás de Pina, Rio de Janeiro - RJ, 21235-620, Brazil,+br&key=AIzaSyB-VWYcpXfpAQ9aHN6nKSqE_8DsntQDZ0k";
		
		$this->xmlGoogle = simplexml_load_file($link_xml_google);
		return $this->xmlGoogle;
	}	
}


/*********************************************************************************************************/
//Teste Classe
