<?php
	
	class EntitiesCad_formacao{
		
		private $id;
		private $cad_pessoa_id;
		private $curso;
		private $instituicao;
		private $dataconclusao;
		
		public function getid(){
			return $this->id;
		}
		
		public function setid($value){
			$this->id = $value;
		}
		
		public function getcad_pessoa_id(){
			return $this->cad_pessoa_id;
		}
		public function setcad_pessoa_id($value){
			$this->cad_pessoa_id = $value;
		}
		
		public function  getcurso(){
			return $this->curso;
		}
		public function setcurso($value){
			$this->curso = $value;
		}
		
		public function  getinstituicao(){
			return $this->instituicao;
		}
		public function setinstituicao($value){
			$this->instituicao = $value;
		}
		
		public function  getdataconclusao(){
			return $this->dataconclusao;
		}
		public function setdataconclusao($value){
			$this->dataconclusao = $value;
		}
		
		
		
	}
	