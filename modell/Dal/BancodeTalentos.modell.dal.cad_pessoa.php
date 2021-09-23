<?php
	
	class DalCad_pessoa{
		private $banco;
		
		
		
		public function __construct($banco){
			$this->banco = $banco;
		}
		
		public function SelectWhere($pessoa,$habilidades = null){
			$sql2 = "SELECT c.id codigo,c.nome,c.email,c.telefone,(
											SELECT GROUP_CONCAT(descricao)descricao
												fROM cad_pessoa c
													left join cad_pessoa_habilidade p on c.id = p.cad_pessoa_id
													inner join cad_habilidades h on h.id = p.cad_habilidade_id
												where c.id = codigo
											)descricao
										fROM cad_pessoa c
										where nome like '%".$pessoa."%'
										";
										
			$sql1 = "SELECT c.id codigo,c.nome,c.email,c.telefone,(
											SELECT GROUP_CONCAT(descricao)descricao
												fROM cad_pessoa c
													left join cad_pessoa_habilidade p on c.id = p.cad_pessoa_id
													inner join cad_habilidades h on h.id = p.cad_habilidade_id
												where c.id = codigo
											)descricao
										fROM cad_pessoa c
											inner join cad_pessoa_habilidade h on h.cad_pessoa_id = c.id
										where (c.nome like '%".$pessoa."%')
										";
			
			
			if(is_null($habilidades)){
			;
				$sql = $sql2;
			}
			else{
				$reg = implode(",",$habilidades);
				
				$sql = $sql1. "and (h.cad_habilidade_id in (".$reg."))";
			
			}
			
				return $this->banco->select($sql,array());
		}
		
		public function SelectAll(){
			return $this->banco->select('SELECT c.id codigo,c.nome,c.email,c.telefone,(
											SELECT GROUP_CONCAT(descricao)descricao
												fROM cad_pessoa c
													left join cad_pessoa_habilidade p on c.id = p.cad_pessoa_id
													inner join cad_habilidades h on h.id = p.cad_habilidade_id
												where c.id = codigo
											)descricao
										fROM cad_pessoa c',
								array()
							);
		}
		
		public function selectID($id){
			return $this->banco->select("SELECT
										p.id,p.nome,p.email,p.telefone,p.dtnascimento,
										p.cep,p.uf,p.cidade,p.bairro,p.rua,p.numero,p.complemento
									FROM cad_pessoa p where p.id = ? ",array($id));
		}
		//******************************* Insert *******-/
		public function insert($entitties){
			
			//verifica se ja existe email
			$email = $this->banco->select('SELECT id FROM cad_pessoa c where email = ? ',
											array(
												$entitties->getemail()
											)
										);
			
			
			if($email->rowcount()==0){
				$sql = "insert into cad_pessoa  set nome =? ,
												dtnascimento =? ,
												telefone  =? ,
												cep  =? ,
												uf  =? ,
												cidade  =? ,
												bairro =? ,
												rua =? ,
												numero =? ,
												email = ?,
												complemento =? ";
			
			
					$dado = array(
									$entitties->getnome(),
									$entitties->getdtnascimento(),
									$entitties->gettelefone(),
									$entitties->getcep(),
									$entitties->getuf(),
									$entitties->getcidade(),
									$entitties->getbairro(),
									$entitties->getrua(),
									$entitties->getnumero(),
									$entitties->getemail(),
									$entitties->getcomplemento()
					);
				$id = $this->banco->Insert($sql,$dado);
				
				
					$aux = count($entitties->getcurso());
					for($i=0; $i < $aux; $i++){
						$curso =  $entitties->getcurso()[$i];
						$instituicao =  $entitties->getinstituicao()[$i];
						$conclusao = $entitties->getconclusao()[$i];
						
						$this->banco->insert("insert into cad_pessoa_formacao set 
														cad_pessoa_id = ?,
														curso = ?,
														instituicao = ?,
														dataconclusao = ?"
												,array( $id,
														$curso,
														$instituicao,
														$conclusao
													)
											);
					}//fim do for
				
				
				//inserindo as habilidades
					
					foreach($entitties->gethabilidades() as $habilidade){
					
						
						$this->banco->insert("insert into cad_pessoa_habilidade set 
																				cad_pessoa_id = ?, 
																				cad_habilidade_id = ?",array($id,$habilidade));
					}
					
					
				
				
			}else{
				?>
					<script>alert('Email ja existe')</script>
				<?php
			}
			
			
			
			
		}//fim do insert
		//*********************************************************************************************
			public function Edit($entitties){

				$sql = "update cad_pessoa  set nome =? ,
												dtnascimento =? ,
												telefone  =? ,
												cep  =? ,
												uf  =? ,
												cidade  =? ,
												bairro =? ,
												rua =? ,
												numero =? ,
												email = ?,
												complemento =? 
						where id= ?	";
			
			
					$dado = array(
									$entitties->getnome(),
									$entitties->getdtnascimento(),
									$entitties->gettelefone(),
									$entitties->getcep(),
									$entitties->getuf(),
									$entitties->getcidade(),
									$entitties->getbairro(),
									$entitties->getrua(),
									$entitties->getnumero(),
									$entitties->getemail(),
									$entitties->getcomplemento(),
									$entitties->getid()
					);
					
				$this->banco->Insert($sql,$dado);
				$id = $entitties->getid();
				/*Removendo habilidades e formacao*/

				$this->banco->Insert('delete from cad_pessoa_formacao where cad_pessoa_id = ?',array($id));
				$this->banco->Insert('delete from cad_pessoa_habilidade where cad_pessoa_id = ?',array($id));
				
				//------------------------
			
				
				
				$aux = count($entitties->getcurso());
				for($i=0; $i < $aux; $i++){
					$curso =  $entitties->getcurso()[$i];
					$instituicao =  $entitties->getinstituicao()[$i];
					$conclusao = $entitties->getconclusao()[$i];
					
					$this->banco->insert("insert into cad_pessoa_formacao set 
													cad_pessoa_id = ?,
													curso = ?,
													instituicao = ?,
													dataconclusao = ?"
											,array( $id,
													$curso,
													$instituicao,
													$conclusao
												)
										);
				}//fim do for
				
				//inserindo as habilidades
				
					foreach($entitties->gethabilidades() as $habilidade){
					
						
						$this->banco->insert("insert into cad_pessoa_habilidade set 
																				cad_pessoa_id = ?, 
																				cad_habilidade_id = ?",array($id,$habilidade));
					}
			
			
			
		}//fim do Edit
	
		
	}