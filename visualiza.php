<?php
	include "conf.php";
	$PessoaDal = new DalCad_pessoa($banco);
	if(isset($_GET['id'])){
		$pessoaregistro = $PessoaDal->selectID($_GET['id']);
		$reg = $pessoaregistro->fetch();
		
		$formacao = new DalCadFormacao($banco);
		$rowformacao = $formacao ->selectid($_GET['id']);
	
	}else{
		header("location:index.php");
	}
	$habilidades = new DalCadHabilidade($banco);
?>
<html lang='pb-br'>
<head>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
		
	<title>Visualizar Registro de talentos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
	
	
</head>
<body>
	
	<div class='container'>
	<div class='row'>
	<center><h1>Banco de Talentos</h1></center>
	<h2>Visualizar</h2>
	<div col='col-sm-1'><a class='btn btn-primary' href='index.php'>Voltar</a></div>
	<hr>
	</div>
	<div class='row'>
	<h2>Dados Pessoais</h2>
	<form action='' method='POST'>
		
		<div class='row'>
			<label>Código.</label>
		</div>
		<div class='row'>
			<input type='text' Readonly  name='id' value='<?php if((isset($reg['id']))){echo $reg['id'];}else{echo "Novo";}?>' >
		</div>
		
		<div class='row'>
			<label>Nome</label>
		</div>
		
		<div class='row'>
			<input type='text' Readonly name='nome' value='<?php if((isset($reg['nome']))){echo $reg['nome'];}?>' required>
		</div>
		
		<div class='row'>
			<label>Data Nascimento</label>
		</div>
		<div class='row'>
			<input type='date' Readonly name='dtnascimento' value='<?php if((isset($reg['dtnascimento']))){echo $reg['dtnascimento'];}?>' required>
		</div>
		
		<div class='row'>
			<label>E-mail</label>
		</div>
		<div class='row'>
			<input type='email' Readonly name='email' value='<?php if((isset($reg['email']))){echo $reg['email'];}?>' required ><br>
		</div>
		
		<div class='row'>
			<label>Telefone</label>
		</div>
			<div class='row'>
				<input type='text' Readonly placeholder='Telefone' name='telefone' value='<?php if((isset($reg['telefone']))){echo $reg['telefone'];}?>'><br>
		</div>
		
		<div class='row'>
			<label>Cep</label>
		</div>
		<div class='row'>
				<input type='text' Readonly name='cep' id='cep' value='<?php if((isset($reg['cep']))){echo $reg['cep'];}?>' size="10" maxlength="9"><br>
		</div>
		
		<div class='row'>			
				<label>Estado</label>
		</div>
		<div class='row'>
				<input type='text' Readonly size='5' name='uf' id='uf' value='<?php if((isset($reg['uf']))){echo $reg['uf'];}?>'><br>
			</div>
		</div>
		
		<div class='row'>	
			<label>Cidade</label>
		</div>
		<div class='row'>
			<input type='text' Readonly name='cidade' id='cidade' value='<?php if((isset($reg['cidade']))){echo $reg['cidade'];}?>	'>
		</div>
		
		<div class='row'>
			<label>Bairro</label>
		</div>
		<div class='row'>
			<input type='text' Readonly name='bairro' id='bairro' value='<?php if((isset($reg['bairro']))){echo $reg['bairro'];}?>'><br>
		</div>
		
		<div class='row'>
			<label>Rua</label>
		</div>
		<div class='row'>
			<input type='text' Readonly name='rua' value='<?php if((isset($reg['rua']))){echo $reg['rua'];}?>' id='rua'>
		</div>
		
		<div class='row'>
			<label>Numero</label>
		</div>
		<div class='row'>		
			<input type='text'Readonly  name='numero' id='numero' value='<?php if((isset($reg['numero']))){echo $reg['numero'];}?>'><br>
		</div>	
		
		<div class='row'>
			<label>Complemento</label>
		</div>
		<div class='row'>
			<input type='text'Readonly name='complemento' value=''><br>
		</div>
		
		
		<h2>Formação</h2>
		<div class='row'>
				<div id='formacao'>
				</div>
				
					<?php 
						if((isset($reg['id']))){
						foreach($rowformacao->fetchall() as $rowform){
						?>
						<div class='row'>
								<div class='form-group'>
									<label>Curso</label>
								</div>
						</div>
						<div class='row'>
							<input type='text' Readonly name='curso[]' value='<?php if((isset($rowform['curso']))){echo $rowform['curso'];}?>'><br>
						</div>
						<div class='row'>
							<label>Instituição</label>
						</div>
						<div class='row'>
							<input type='text' Readonly name='instituicao[]' value='<?php if((isset($rowform['instituicao']))){echo $rowform['instituicao'];}?>'><br>
						</div>
						<div class='row'>
							<label>Data de Conclusao</label>
						</div>
						<div class='row'>
							<input type='date' Readonly name='dtconclusao[]' value='<?php if((isset($rowform['dataconclusao']))){echo $rowform['dataconclusao'];}?>'><br>
						</div>
								
						<?php
						}
						}else{
					?>
					<div class='form-group'>
					
					<div class='row'>
							
						<div class='form-group'>
							<label>Curso</label>
						</div>
					</div>		
						
						<div class='row'>
							<input type='text' Readonly name='curso[]' value=''><br>
						</div>
						
						<div class='row'>
							<label>Instituição</label>
						</div>
						<div class='row'>
							<input type='text'Readonly name='instituicao[]' value=''><br>
						</div>
						<div class='row'>
							<label>Data de Conclusao</label>
						</div>
						<div class='row'>
							<input type='date'  Readonly name='dtconclusao[]' value=''><br>
						</div>
				</div>
						
						<?php }?>
				</div>
		
		</hr>
		<h2>Habilidades</h2>
		<?php
			if((isset($reg['id']))){
				$row = $habilidades->SelectHabilidadeckeced($reg['id']);
			}else{
				$row = $habilidades->getAll();
			}
			
			
			if( $row->rowcount()>=1){
				foreach($row as $data){		
					echo"<input type='checkbox' Readonly name='habilidades[]' value='{$data['id']}'";
						if((isset($reg['id']))){
							if($data['usado'] != ''){
								echo "checked";
							}
						}
					echo "><label>{$data['descricao']}</label><br>";
				}
			}
			
		
		?>	
		
	</form>
	</div>
	
	</div>
</body>
</html>