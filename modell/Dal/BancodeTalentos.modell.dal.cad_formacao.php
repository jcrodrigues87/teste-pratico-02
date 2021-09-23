<?php
	
	class DalCadFormacao{
		
		private $banco;
		
		public function __construct($banco){
			$this->banco = $banco;
		}
		//funcao retorna todas as formações da pessoa a partir do id da pessoa que e passado por paramentro
		public function SelectID($id){
			return $this->banco->select("select * from cad_pessoa_formacao where cad_pessoa_id = ?",array($id));
		}
		
		
		
	}