<?php
	
	class EntitiesCad_habilidade{
		
		private $id;
		private $descricao;
		
		public function setid($value){
			$this->id = $value;
		}
		public function getid(){
			return   $this->id;
		}
		
		public function setdescricao($value){
			$this->descricao = $value;
		}
		
		public function getdescricao(){
			return  $this->descricao;
		}
	}
	

?>