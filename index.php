<?php
	include "conf.php";
	$pessoadal  = new DalCad_pessoa($banco);
	$habilidades = new DalCadHabilidade($banco);
	$habi =  $habilidades->getAll();
	
	
	if(isset($_GET['habilidades'])){
		$a = 0;
		$aux;
	}
	
	
?>	
<html lang='pb-br'>
<head>
	<meta charset='UTF-8'>
	<title>Listagem Banco de Talentos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	<div class='container'>
		<div class='row'>
			<h1>Listagem</h1>
			<a href='cadastro.php'>Novo Registro</a>
		</div>
		<div class='row'>
			<form action ='' method='GET'>
				<label>Pesquisar Nome: </label>
					<input type='search' name='search' value='<?php if(isset($_GET['search'])){echo $_GET['search'];}?>'>
					
					<div class='col'>
						Selecionar Habilidades:
					</div>
					<div class='col'>
						<?php
							if( $habi->rowcount()>=1){
								foreach($habi as $data){		
									echo "<label>{$data['descricao']}</label>";
									echo"<input type='checkbox' name='habilidades[]' value='{$data['id']}'";
										if(isset($_GET['habilidades'])){
											foreach($_GET['habilidades'] as $hab){
												if($hab == $data['id'])
												{
													echo "checked";
												}
											}
										}
									
									echo "> | ";
								}
							}					 
						?>
					</div>		
				<input type='submit' name='buscar' value='Buscar' name='Buscar'>
			</form>
		</div>
	<div class='row'>		
		<table class="table">
			<thead>
				<tr>
					<th>Código</th>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Telefone</th>
					<th>Habilidades</th>
					<th>Ação</th>
				</tr>
			</thead>
			<?php
				if(isset($_GET['search'])){
					if(isset($_GET['habilidades'])){
						$dados = $pessoadal->selectWhere($_GET['search'],$_GET['habilidades']);
					}
					else{
						$dados = $pessoadal->selectWhere($_GET['search']);
					}
					
				}
				else{
					$dados = $pessoadal->SelectAll();	
				}
				
				
				
				if($dados->rowcount() == 0){
					echo "nenhum registro localizado faca primeiro cadastro.<br> <a href='grava.php'>Clique para fazer primeiro cadastro</a>";
				}else{
					foreach($dados->fetchall() as $row)
					{
						echo "<tr>";
						echo "	<td>{$row['codigo']}</td>";
						echo "	<td>{$row['nome']}</td>";
						echo "	<td>{$row['email']}</td>";
						echo "	<td>{$row['telefone']}</td>";
						echo "	<td>{$row['descricao']}</td>";
						
						
						echo "</td>";
						echo  "<td>
								<a href='visualiza.php?id={$row['codigo']}'>Visualizar</a>  | 
								<a href='cadastro.php?id={$row['codigo']}'>Editar</a> 
						</td>";
						echo "</tr>";
					}
				}
			?>
			
		<tbody>
		</tbody>
	</table>
	</div>
	
	</div>
</body>
</html>