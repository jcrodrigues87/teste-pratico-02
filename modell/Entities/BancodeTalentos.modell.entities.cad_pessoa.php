<?php
	
	class EntitiesCad_pessoa{
		private $id;
		private $nome;
		private $dtnascimento;
		private $email;
		private $telefone;
		private $cep;
		private $uf;
		private $cidade;
		private $bairro;
		private $rua;
		private $numero;
		private $complemento;
		
		//elementos da formacao
		private $curso;
		private $instituicao;
		private $conclusao;		
		private $habilidade;
		
	
		
	
		
		
		public function setid($value){
			$this->id = $value;
		} 
		
		public function getid(){
			return $this->id;
		}
		
		public function setnome($value){
			$this->nome = $value;
		} 
		
		public function getnome(){
			return $this->nome;
		}
		
		public function setdtnascimento($value){
			$this->dtnascimento = $value;
		} 
		
		public function getdtnascimento(){
			return $this->dtnascimento;
		}
		
			public function setemail($value){
			$this->email = $value;
		} 
		
		public function getemail(){
			return $this->email;
		}
		
			public function settelefone($value){
			$this->telefone = $value;
		} 
		
		public function gettelefone(){
			return $this->telefone;
		}
		
		public function setcep($value){
			$this->cep = $value;
		} 
		
		public function getcep(){
			return $this->cep;
		}
		
			public function setuf($value){
			$this->uf = $value;
		} 
		
		public function getuf(){
			return $this->uf;
		}
		
		public function setcidade($value){
			$this->cidade = $value;
		} 
		
		public function getcidade(){
			return $this->cidade;
		}
		
			public function setbairro($value){
			$this->bairro = $value;
		} 
		
		public function getbairro(){
			return $this->bairro;
		}
		
			public function setrua($value){
			$this->rua = $value;
		} 
		
		public function getrua(){
			return $this->rua;
		}
		
		public function setnumero($value){
			$this->numero = $value;
		} 
		
		public function getnumero(){
			return $this->numero;
		}
		
		public function setcomplemento($value){
			$this->complemento = $value;
		} 
		
		public function getcomplemento(){
			return $this->complemento;
		}
		
		public function setformacao($curso,$instituicao,$dtconclusao){
			
				$this->curso = $curso;
				$this->instituicao = $instituicao;
				$this->dtconclusao = $dtconclusao;
			
		} 
		
		public function getcurso(){
			return $this->curso;
		}
		public function getinstituicao()
		{
			return $this->instituicao;
		}
		public function getconclusao(){
			return $this->dtconclusao;
		}
		
		public function sethabilidades($values){
			$this->habilidade = $values;
		}
		
		public function gethabilidades(){
			return $this->habilidade;
		}
		
		
	
		
	
		
	}