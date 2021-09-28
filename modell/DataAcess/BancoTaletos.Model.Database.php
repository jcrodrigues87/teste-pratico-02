<?php
	
	class Database{
		private $conn;
		
		function __construct() {
			
			$host = "127.0.0.1";
			$user="root";
			$senha = "";
			$database = "bancodetalentos";	
			
			
			$conn = new PDO("mysql:host={$host};dbname={$database}", $user, $senha);
			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->conn = $conn;
		}
		
		
		public function Select($sql,$paramentro = null){
			try{
				$data = $this->conn->prepare($sql);
				if($data->execute($paramentro))
				{
					return $data;									 		
				}
			}catch(PDOException $e){
					echo 'Erro Sistema - Entre en contato com  o admnistrador do sistema';
			}
		}
		
		public function Insert($sql,$paramentro){
			/*--------------------------------------*/
				try{
					$smtp = $this->conn->prepare($sql);//conn->prepare($sql);
					if($smtp->execute($paramentro))
					{
						return  $this->conn->lastInsertId(); 
					}				
				}catch(PDOException $e)
				{
					echo 'Sistema indisponível Entre contato com o adm';
				}
				return false;
			/*---------------------------------*/
			return false;
		}// fim da funcao insercao
		/*-------------------------------------*/
	}