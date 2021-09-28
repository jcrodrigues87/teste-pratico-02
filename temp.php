<?php
	include "conf.php";
	
	
	
	$PessoaDal = new DalCad_pessoa($banco);
	if(isset($_POST['Gravar'])){
		
		$cadpessoa = new EntitiesCad_pessoa();
		$cadpessoa->setnome($_POST['nome']);
		$cadpessoa->setdtnascimento($_POST['dtnascimento']);
		$cadpessoa->setemail($_POST['email']);
		$cadpessoa->settelefone($_POST['telefone']);
		$cadpessoa->setcep($_POST['cep']);
		$cadpessoa->setuf($_POST['uf']);
		$cadpessoa->setcidade($_POST['cidade']);
		$cadpessoa->setbairro($_POST['bairro']);
		$cadpessoa->setrua($_POST['rua']);
		$cadpessoa->setnumero($_POST['numero']);
		$cadpessoa->setcomplemento($_POST['complemento']);
		
		$cadpessoa->setformacao($_POST['curso'],$_POST['instituicao'],$_POST['dtconclusao']);
		
		if(isset($_POST['habilidades'])){
			$cadpessoa->sethabilidades($_POST['habilidades']);
		}
		
		if($_POST['id'] != 'Novo'){
			$cadpessoa->setid($_POST['id']);
			$PessoaDal->Edit($cadpessoa);
		}else{	
			$PessoaDal->insert($cadpessoa);
			
		}
	}
	
	if(isset($_GET['id'])){
		$pessoaregistro = $PessoaDal->selectID($_GET['id']);
		$reg = $pessoaregistro->fetch();
		
		$formacao = new DalCadFormacao($banco);
		$rowformacao = $formacao ->selectid($_GET['id']);
	
	}
	
	
	$habilidades = new DalCadHabilidade($banco);
	
?>
<html lang='pb-br'>
<head>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
		
	<meta http-equiv='refresh' content='500'>	
		
		
	<title>Registro banco de talentos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
	<script>
		 $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });	
	</script>
	
	
	
	<style>
		.form-group{padding:10px;}
	</style>
	
</head>
<body>
	
	<div class='container'>
	<div class='row'>
	<h1>Adicionar</h1>
	<a href='lista.php'>Voltar</a>
	<hr>
	</div>
	<div class='row'>
	<h2>Dados Pessoais</h2>
	<form action='' method='POST'>
		
		<div class='row'>
			<div class='col-sm-2'>
				<label>Código.</label>
			</div>
		</div>
		<div class='row'>
			<div class='col'>
				<input type='text' Readonly  name='id' value='<?php if((isset($reg['id']))){echo $reg['id'];}else{echo "Novo";}?>' >
			</div>
		</div>
		
	
	
		
		<div class='row'>
			<div class='col-sm-2'>
				<label>Nome</label>
			</div>
		</div><div class='row'>
			<div class='col'>
				<input type='text' name='nome' value='<?php if((isset($reg['nome']))){echo $reg['nome'];}?>' required>
			</div>
		</div>
		
		<div class='row'>
			<div class='col-sm-2'>
				<label>Data Nascimento</label>
			</div>
			</div><div class='row'>
			<div class='col'>
				<input type='date' name='dtnascimento' value='<?php if((isset($reg['dtnascimento']))){echo $reg['dtnascimento'];}?>' required>
			</div>
		</div>
		
		<div class='row'>
			<div class='col-sm-2'>	
				<label>E-mail</label>
			</div>
			</div><div class='row'>
			<div class='col'>
				<input type='' name='email' value='<?php if((isset($reg['email']))){echo $reg['email'];}?>' required ><br>
			</div>
		</div>
		
		
		<div class='row'>
			<div class='col-sm-2'>
				<label>Telefone</label>
				</div><div class='row'>
			</div>
			<div class='col'>
				<input type='text' placeholder='Telefone' name='telefone' value='<?php if((isset($reg['telefone']))){echo $reg['telefone'];}?>'><br>
			</div>
		</div>
		
		<div class='row'>
			<div class='col-sm-1'>	
				<label>Cep</label>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-2'>
				<input type='text' name='cep' id='cep' value='<?php if((isset($reg['cep']))){echo $reg['cep'];}?>' size="10" maxlength="9"><br>
			</div>
		</div>
		<div class='row'>			
			<div class='col-sm-1'>	
				<label>Estado</label>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-2'>
				<input type='text' size='5' name='uf' id='uf' value='<?php if((isset($reg['uf']))){echo $reg['uf'];}?>'><br>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-1'>	
				<label>Cidade</label>
			</div>
		</div>
		<div class='row'>
			<div class='col-sm-2'>
				<input type='text' name='cidade' id='cidade' value='<?php if((isset($reg['cidade']))){echo $reg['cidade'];}?>	'><br>
			</div>
			
			<div class='row'>
				<div class='col-sm-2'>	
					<label>Bairro</label>
				</div>
			</div>
			<div class='row'>
				<div class='col'>
					<input type='text' name='bairro' id='bairro' value='<?php if((isset($reg['bairro']))){echo $reg['bairro'];}?>'><br>
				</div>
			</div>
			<div class='row'>
				<div class='col-sm-2'>	
					<label>Rua</label>
				</div>
			<div class='row'>
				<div class='col'>
					<input type='text' name='rua' value='<?php if((isset($reg['rua']))){echo $reg['rua'];}?>' id='rua'><br>
				</div>
			</div>
			<div class='row'>
				<div class='col-sm-2'>	
					<label>Numero</label>
				</div>
			</div>
			<div class='row'>
				<div class='col'>
					<input type='text' name='numero' id='numero' value='<?php if((isset($reg['numero']))){echo $reg['numero'];}?>'><br>
				</div>
			</div>	
				<div class='row'>
					<div class='col-sm-2'>	
						<label>Complemento</label>
					</div>
					</div><div class='row'>
					<div class='col'>
						<input type='text' name='complemento' value=''><br>
					</div>
				</div>
		
		
		
		<h2>Formação</h2>
		<div class='row'>
			<div class='col'>
				<div id='formacao'>
					<button type='button' id='addcampos'>Adicionar Formação</button>
				</div>
			</div>
				
					<?php 
						if((isset($reg['id']))){
						foreach($rowformacao->fetchall() as $rowform){
						?>
						<div class='row'>
							<div class='col'>
								<div class='form-group'>
									<label>Curso</label>
								</div>
							</div>
						</div>
						<div class='row'>
							<div class-'col'>
								<input type='text' name='curso[]' value='<?php if((isset($rowform['curso']))){echo $rowform['curso'];}?>'><br>
							</div>
						</div>
						<div class='row'>
							<div class='col'>
								<label>Instituição</label>
							</div>
						</div>
						<div class='row'>
							<div class='col'>
								<input type='text' name='instituicao[]' value='<?php if((isset($rowform['instituicao']))){echo $rowform['instituicao'];}?>'><br>
							</div>
						</div>
						<div class='row'>
							<div class='col'>
								<label>Data de Conclusao</label>
							</div>
						</div>
						<div class='row'>
							<div class='col'>
								<input type='date' name='dtconclusao[]' value='<?php if((isset($rowform['dataconclusao']))){echo $rowform['dataconclusao'];}?>'><br>
							</div>
						</div>
								
						<?php
						}
						}else{
					?>
					<div class='form-group'>
						<div class='row'>
							<div class='col'>
								<div class='form-group'>
									<label>Curso</label>
								</div>
							</div>
						</div>
						<div class='row'>
							<div class='col'>
								<input type='text' name='curso[]' value=''><br>
							</div>
						</div>
						<div class='row'>
							<div class='col'>
								<label>Instituição</label>
							</div>
						</div>
						<div class='row'>
							<div class='col'>
								<input type='text' name='instituicao[]' value=''><br>
							</div>
						</div>
						<div class='row'>
							<div class='col'>
								<label>Data de Conclusao</label>
							</div>
						</div>
						<div class='row'>
							<div class='col'>
								<input type='date' name='dtconclusao[]' value=''><br>
							</div>
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
					echo"<input type='checkbox' name='habilidades[]' value='{$data['id']}'";
						if((isset($reg['id']))){
							if($data['usado'] != ''){
								echo "checked";
							}
						}
					echo "><label>{$data['descricao']}</label><br>";
				}
			}
			
		
		?>	
		<input type='submit' name='Gravar' value='Gravar'><br>
	</form>
	</div>
	<script>
		$("#addcampos").click(function()
		{
			$("#formacao").append("");
			$("#formacao").append("");
			$("#formacao").append("			");
			$("#formacao").append("				");
			$("#formacao").append("					");
			$("#formacao").append("									");
			$("#formacao").append("");
			$("#formacao").append("				");
			$("#formacao").append("			</div>");
			$("#formacao").append("			<div class='row'>");
			$("#formacao").append("				<div class-'col'>");
			$("#formacao").append("					<input type='text' name='curso[]' value=''>");
			$("#formacao").append("				</div>");
			$("#formacao").append("			</div>");
			$("#formacao").append("			<div class='row'>");
			$("#formacao").append("				<div class='col'>");
			$("#formacao").append("					<label>Instituição</label>");
			$("#formacao").append("				</div>");");
			$("#formacao").append("			</div>");
			$("#formacao").append("			<div class='row'>");
			$("#formacao").append("				<div class='col'>");
			$("#formacao").append("					<input type='text' name='instituicao[]' value=''>");
			$("#formacao").append("				</div>");
			$("#formacao").append("			</div>");
			$("#formacao").append("			<div class='row'>");
			$("#formacao").append("				<div class='col'>");
			$("#formacao").append("					<label>Data de Conclusao</label>");
			$("#formacao").append("				</div>");
			$("#formacao").append("			</div>");
			$("#formacao").append("			<div class='row'>");
			$("#formacao").append("				<div class='col'>");
			$("#formacao").append("					<input type='date' name='dtconclusao[]' value=''>");
			$("#formacao").append("				</div>");
			$("#formacao").append("			</div>");
			
			alert("me cliclou");
			
			
			
			$("#formacao").append("</div>");
			
		});
	</script>
	</div>
</body>
</html>