<?php
	
	class DalCadHabilidade{
		
		private $entities;
		private $banco;
		
		
		function __construct($banco){
			$this->banco = $banco;
		}
		
		
		//retorna todas as habilidades
		public function getAll(){
			return $this->banco->select('select id, descricao from Cad_habilidades',array());
		}
		//retorna as habilidades selecionads a partir da pk da pessoa
		public function SelectHabilidadeckeced($id){
			
			return $this->banco->select('select id,descricao,GROUP_CONCAT(idusado) usado
													from (select h.id,h.descricao,  "" idusado  from cad_habilidades h
														union
														(
															select h.id,h.descricao, h.id idusado from cad_habilidades h
																left join cad_pessoa_habilidade p on p.cad_habilidade_id = h.id
															where p.cad_pessoa_id = ?
														)
														)tabtemp
											group by descricao
											order by id',
											array($id));
		}
		
		
		
		
	}
	

?>