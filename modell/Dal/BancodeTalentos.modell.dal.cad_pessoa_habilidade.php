<?php

	class DalCadPessoaHabilidade{
		
		private $banco;
		
		public function __construct ($banco){
			$this->banco = $banco;
		}
		
		public function SelectId($id){
			return $this->banco->select("SELECT
											p.id,h.descricao
										FROM cad_pessoa_habilidade p
											inner join cad_habilidades h on h.id = p.cad_habilidade_id
												inner join cad_pessoa c on c.id = p.cad_pessoa_id
										where c.id = ?",array($id));
		}
		
		
		
		
	}