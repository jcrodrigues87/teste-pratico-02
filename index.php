<?php
	include "conf.php";
	$pessoadal  = new DalCad_pessoa($banco);
	$habilidades = new DalCadHabilidade($banco);
	$habi =  $habilidades->getAll();	
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
			<center><h1>Banco de Talentos</h1></center>
			<h2>Visualizar</h2>
		
			<div col='col-sm-1'><a href='cadastro.php' class='btn btn-primary'>Novo Registro</a></br>
			<hr>
		</div>
		<div class='row'>
			<!--   Form de pesquisa  -->
			<form action ='' method='GET'>
				<label>Pesquisar Nome: </label>
					<input type='search' name='search' value='<?php if(isset($_GET['search'])){echo $_GET['search'];}?>'>
					<div class='col'>
						Selecionar Habilidades:
					</div>
					<div class='col'>
						<?php
							if( $habi->rowcount()>=1){
								//Lista todas as habilidades do cadastradas
								foreach($habi as $data){		
									echo "<label>{$data['descricao']}</label>";
									echo"<input type='checkbox' name='habilidades[]' value='{$data['id']}'";
										//verifica se campo do cheke box ja foi marcado antes manter mesmos padroes da ultima pesquisa selecionado
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
			<!-- Fim form de pesquisa-->
		</div>
	<div class='row'>		
		<table class="table table-hover">
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
					$dados = $pessoadal->selectWhere();	
				}
				
			
	
				if($dados->rowcount() == 0){
					echo "nenhum registro localizado faca primeiro cadastro.<br> <a href='cadastro.php'>Clique para fazer primeiro cadastro</a>";
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
								<a href='visualiza.php?id={$row['codigo']}'><img src='img/visualizar.png' width='15px' alt='Visualizar'></a> 
								<a href='cadastro.php?id={$row['codigo']}'><img src='img/edit.png' width='15px' alt= 'editar registo'></a> 
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