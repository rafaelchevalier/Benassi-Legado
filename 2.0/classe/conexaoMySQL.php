<?php
	abstract class conexaoMySQL
	{
		protected $servidor;
		protected $usuario;
		protected $senha;
		protected $banco;
		protected $conexao;
		protected $qry;
		protected $dados;
		
		public function __construct()
		{
			//Conexão Local Host
			/*
			$this->servidor 	="localhost";
			$this->usuario		="root";
			$this->senha		="";
			$this->banco		="benassi";
			*/
			//Conexão Banco Operação
			$this->servidor 	="mysql.rasp.net.br";
			$this->usuario		="rasp02";
			$this->senha		="benassi01";
			$this->banco		="rasp02";
			
			self::conectar();
		}
		function conectar()
		{
			$this->conexao = @mysql_connect($this->servidor,$this->usuario,$this->senha) or
										die("Não foi possível conectar com o servidor de banco de dados".mysql_error());
			
			$this->banco  = @mysql_select_db($this->banco) or 
										die("Não foi possível conectar com o Banco de dados".mysql_error());		
		}

		function executarSQL($sql)
		{
			$this->qry = @mysql_query($sql) or die("Erro ao executar o comando SQL: $sql <br>".mysql_error());
			return $this->qry;
		}
		function listar($qr)
		{
			$this->dados= @mysql_fetch_assoc($qr);
			return $this->dados;
		}
		function listarArray($qr)
		{
			$this->dados= @mysql_fetch_array($qr);
			return $this->dados;
		}
	}
?>