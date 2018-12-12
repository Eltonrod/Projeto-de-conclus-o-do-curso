<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");
//include('verificaLogin.php');
//include('delete.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, inicial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="css/estiloservico.css">
	<title>Ambiente de serviço</title>
	<link type="text/html" href="index.html">

</head>
<body>
<main>
 <header class="topo">
		<h2>AMBIENTE DE SERVICO</h2>
	</header>
	<div id="central" class="menu">
		<p>Usuário: <?php echo $_SESSION['usuario'];?> <b><i>||conectado||</i></b>
			<a href="logout.php">Sair</a></p>
		<img src="img/Logo_Projeto.png">
		<BR><BR>
		<input type="button" style="width:160;height:40" onclick="formCadastro();" value="CADASTRAR CLIENTE" id="receita1" class="botoes">
		<input type="button" style="width:160;height:40" onclick="formConsulta();" value="CONSULTA CLIENTE" id="receita2" class="botoes">
		<input type="button" style="width:160;height:40" onclick="formExcluir();" value="EXCLUIR CLIENTE" id="receita3" class="botoes">
		<input type="button" style="width:160;height:40" onclick="formAbrirChamado();" value="ABRIR CHAMADO" id="receita4" class="botoes">
		<input type="button" style="width:160;height:40" onclick="formTratarChamado();" value="TRATAR CHAMADO" id="receita5" class="botoes">
		<input type="button" style="width:160;height:40" onclick="formRelatorio();" value="GERAR RELATÓRIO" id="receita6" class="botoes">
		<BR>
		<a style="background: #8FBC8F; font-size: 18px; text-align: center; text-decoration: none; color: #800000; font-weight: bold" href="index.html" target= "_blank">Ir para o Site</a>
	</div>
	   <div class="formularios">
			<!-- FORM DE CADASTRO -->
			<div id="1" class="escondida">
				<form id="cadastro" class="form" name="cadastro" method="POST" action="cadastro.php">
						<BR>
						<h3>NOVO CADASTRO</h3>
						<fieldset>
						<legend>Cadastrar cliente:</legend>
						<BR>
						<input type="text" name="empresa" id="empresa" placeholder="Nome da empresa (Caso seja empresa)" size="50">
						<BR><BR>
						<input type="text" name="nome" id="nomeCad" placeholder="Digite o seu nome" size="50" required>
						<BR><BR>
						Data de nascimento:
						<input type="date" name="dtNascimento" id="dtNascimento" placeholder="Data de nascimento" required>
						<BR><BR>
						<input type="text" name="cpf" id="cpf" placeholder="Digite o seu CPF" required>
						<BR><BR>
						<input type="text" name="tel_fixo" id="tel_fixo"placeholder="Telefone fixo">
						<BR><BR>
						<input type="text" name="tel_cel" placeholder="Telefone celular"required>
						<BR><BR>
						<input type="text" name="email" placeholder="E-mail" size="50" required>
						<BR><BR>
						<input type="text" name="logradouro" id="logradouro"placeholder="Logradouro" size="50" required>
						<BR><BR>
						<input type="text" name="bairro" id="bairro" size="30" placeholder="Bairro"required>
						<BR><BR>
						<input type="text" name="cidade" id="cidade" placeholder="Cidade" size="30" required>
						<BR><BR>
						<input type="text" name="uf" id="uf"placeholder="UF" size="1" required>
						<BR>
						</fieldset>
						<BR>
							<center><input type="submit" style="width:90;height:30" value="Enviar">
							<input type="reset" style="width:90;height:30" value="Reset"></center>
            </form>
						<!--	<p>Deseja receber e-mails promocionais?	<input type="checkbox">-->

			</DIV>
					<!-- FORM DE ALTERAR CLIENTE -->
	  <div id="2" class="escondida">
				<form id="consulta" class="form" name="consulta">

				<div div="consultaPesquisa">
					<BR>
					<h3>CONSULTAR CLIENTE</h3>
				<fieldset>
						<legend>Localizar cliente:</legend>
					<input type="text" name="nome" id="nome" placeholder="Digite o nome" size="50">
					<BR>
 					<input type="text" name="id" id="id" placeholder="Digite o id" size="10">
					<BR><BR>
					<input type="submit" onclick="return ConsultaAjax();" style="width:90;height:30" value="Consultar">
					<input type="reset" style="width:90;height:30" value="Reset">
					<BR>
				</fieldset>
					</form>
				</div>
					<fieldset>
						<legend>Resultado da pesquisa:</legend>

						<p id="consulta-id"></p>
						<p id="consulta-empresa"></p>
						<p id="consulta-nome"></p>
						<p id="consulta-dtNascimento"></p>
						<p id="consulta-cpf"></span>
						<p id="consulta-tel_fixo"></p>
						<p id="consulta-tel_celular"></p>
						<p id="consulta-bairro"></p>
						<p id="consulta-cidade"></p>
						<p id="consulta-uf"></p>
						</fieldset>
					<BR>
			</div>

					<!-- FORM DE EXCLUIR CADASTRO -->
			<div id="3" class="escondida">
					<form id="excluir"class="form"  name="excluir">
				<div div="excluirCliente">

					<h3>EXCLUSÃO DE CLIENTE</h3>
					<fieldset>
					<legend>Localizar cliente:</legend>
					<input type="text" name="nome" id="excluirNome" placeholder="Digite o nome" size="50">
					<BR>
					<input type="text" name="id" id="excluirId" placeholder="Digite o id" size="10">
					<BR>
					<input type="submit" onclick="return excluirAjax();" style="width:90;height:30" value="Consultar">
					<input type="reset" style="width:90;height:30" value="Reset">
				</fieldset>
				</form>
				</div>
					<fieldset>
						<legend>Resultado da pesquisa:</legend>
						<p id="excluir-id"></p>
						<p id="excluir-empresa"></p>
						<p id="excluir-nome"></p>
						<p id="excluir-dtNascimento"></p>
						<p id="excluir-cpf"></span>
						<p id="excluir-tel_fixo"></p>
						<p id="excluir-tel_celular"></p>
						<p id="excluir-bairro"></p>
						<p id="excluir-cidade"></p>
						<p id="excluir-uf"></p>
	<input type="submit" onclick="return excluirCadastroAjax()" style="width:90;height:30" value="Deletar">
					</fieldset>
					<br>


				</div>

							<!-- FORM DE ABRIR CHAMADO -->
				<div id="4" class="escondida">
							<form id="abrirChamado" class="form"  name="cadastro">
								<BR>
								<h3>ABERTURA DE CHAMADO</h3>

							<div id="consultaChamado">
								<fieldset>
								<legend>Localizar cliente:</legend>
								<input type="text" name="nome" id="abrirChamadoNome" placeholder="Digite o nome do cliente" size="17">
								<BR>
								<input type="text" name="id" id="abrirChamadoId" placeholder="ID do cliente" size="10">
								<BR><BR>
								<input type="submit" onclick="return abrirChamadoAjax(); " style="width:90;height:30" value="Consultar">
								</form>
							</fieldset>
							<fieldset>
								<legend>Dados do cliente:</legend>
								<p id="abrirChamado-id"></p>
								<p id="abrirChamado-empresa"></p>
								<p id="abrirChamado-nome"></p>
							</fieldset>
							</div>
							<div id="regServico">
								<fieldset>
									<legend>Ordem de Serviço:</legend>
									Equipamento:<input type="text" name="abrirChamadoEquip" id="abrirChamadoEquip" size="40">

									<p>Tipo de serviço:
		    						<select name="tipoServico" id="tipoServico">
		    							<option value="Revisão">Revisão</option>
		    							<option value="Manutenção">Manutenção</option>
		    							<option value="Periodo">Periodo em garantia</option>
		    							<option value="Devolução">Devolução</option>
		    							<option value="Troca">Troca</option>
											<option value="Outros">Outros</option>
		    						</select></p>
								</fieldset>
							<fieldset>
							<center><H3>REGISTRO DE ATIVIDADES</H3></CENTER>
								<p>Descrição do problema:<br>
								<textarea name="descricao" id="descricao" cols="90%" rows="3"></textarea><BR>
								<input type="submit" onclick="return criarOsAjax();" style="width:90;height:30" value="Salvar">
								<input type="reset" style="width:90;height:30" value="Limpar">
								</fieldset>
							</div>
					</div>
								<!-- FORM DE TRATAR CHAMADO -->
					<div id="5" class="escondida">
								<form id="tratarChamado"class="form"  name="cadastro" method="POST" action="acao.php">
									<BR>
									<h3>TRATAMENTO DE CHAMADOS</h3>

								<div id="consultaChamado">
									<fieldset>
									<legend>Localizar cliente:</legend>
									<input type="text" name="consultarChamadoOs" id="consultarChamadoOs" placeholder="Digite a OS" size="10">
									<BR>
									<input type="text" name="consultarChamadoNome" id="consultarChamadoNome" placeholder="Digite o nome do cliente" size="17">
									<BR>
									<input type="submit" onclick="return tratarOsAjax(); " style="width:90;height:30" value="Consultar">
									</form>
								</fieldset>
								<fieldset>
									<legend>Dados do cliente:</legend>
									<p id="consultaId"></p>
									<p id="consultaNome"></p>
								</fieldset>
								<fieldset>
									<legend>Ordem de Serviço:</legend>
									<p id="consulta-os"></p>
									<p id="consulta-dtEntrada"></p>
								</fieldset>
							</div>
								<div id="regServico">
							<fieldset>
								<center><H3>REGISTRO DE ATIVIDADES</H3></CENTER>
								<p id="consulta-tipo_servico"></p>
								<p id="consultaEquipamento"></p>
								<p id="consultaDescricao"></p>
								<hr>
								<p>Atividade realizada:
									<select name="registrarAtividade" id="registrarAtividade">
										<option value="Entrada">Entrada do equipamento</option>
										<option value="Avaliação">Avaliação do equipamento</option>
										<option value="Orçamento">Gerar Orçamento</option>
										<option value="Em reparo">Realizar reparação</option>
										<option value="Finalizada">Finalizar OS</option>
									</select></p>
									<p>Mensagem:<br>
									<textarea name="novaDescricao" id="novaDescricao" cols="90%" rows="3"></textarea><BR>
									<input type="submit" onclick="return updateOsAjax();"style="width:90;height:30" value="Salvar">
									<input type="reset" style="width:90;height:30" value="Limpar">
									</fieldset>
								</div>
					</div>

									<!-- FORM DE GERAR RELATÓRIO -->
						<div id="6" class="escondida">
							<div div="consultaRelatorio">
									<h1><center>RELATÓRIOS GERÊNCIAIS</center></h1>
								<BR>	<BR><BR>
									<div id="tiposRelatórios">
										<a href="consultaCliente.php" target="_blank"><img src="img/clientes.jpg" width="220px" height="230px"></a>
										<a href="consultaChamados.php"target="_blank"><img src="img/chamados.jpg" width="220px"height="230px"></a>
										<a href="consultaMensagens.php"target="_blank"><img src="img/mensagem.png" width="220px"height="230px"></a>
								</div>
							</div>
							<br>

								<BR>
					</div>
			</div>




			<!--script Ajax para consulta de cliente-->
				<script>
				function relatorioCadastroAjax(){

					//document.getElementById('consulta-esconde').style.display.block;
					var request = new XMLHttpRequest();
					//console.log(request);
					request.onreadystatechange = function() {
						if(request.readyState === 4) {
							if(request.status === 200) {
								var objRelatorioCadastro = JSON.parse(request.responseText);
								document.getElementById('relatorio-id').innerHTML = objRelatorioCadastro.id;
								document.getElementById('relatorio-empresa').innerHTML = objRelatorioCadastro.empresa;
								document.getElementById('relatorio-nome').innerHTML = objRelatorioCadastro.nome;
								document.getElementById('relatorio-dtNascimento').innerHTML = objRelatorioCadastro.dtNascimento;
								document.getElementById('relatorio-cpf').innerHTML = objRelatorioCadastro.cpf;
								document.getElementById('relatorio-tel_fixo').innerHTML = objRelatorioCadastro.tel_fixo;
								document.getElementById('relatorio-tel_celular').innerHTML = objRelatorioCadastro.tel_cel;
								document.getElementById('relatorio-bairro').innerHTML = objRelatorioCadastro.bairro;
								document.getElementById('relatorio-cidade').innerHTML = objRelatorioCadastro.cidade;
								document.getElementById('relatorio-uf').innerHTML = objRelatorioCadastro.uf;
							} else {
								alert('Erro: ' +  request.status + ' ' + request.statusText);
							}
						}
					}
					var url = "http://localhost:8079/Projeto_PIM/consultaCadastro.php";
					request.open('Get', url);
					request.send();
					return false;
				}

				</script>

				<!--LOCALIZAR OS-->
				<script>
				function relatorioCadastroAjax(){


					var request = new XMLHttpRequest();

					request.onreadystatechange = function() {
						if(request.readyState === 4) {
							if(request.status === 200) {

								var objRelatorioCadastro = JSON.parse(request.responseText);
								//alert(objConsulta.nome);
								document.getElementById('relatorio-id').innerHTML = objRelatorioCadastro.id;
								document.getElementById('relatorio-empresa').innerHTML = objRelatorioCadastro.empresa;
								document.getElementById('relatorio-nome').innerHTML = objRelatorioCadastro.nome;
								document.getElementById('relatorio-dtNascimento').innerHTML = objRelatorioCadastro.dtNascimento;
								document.getElementById('relatorio-cpf').innerHTML = objRelatorioCadastro.cpf;
								document.getElementById('relatorio-tel_fixo').innerHTML = objRelatorioCadastro.tel_fixo;
								document.getElementById('relatorio-tel_celular').innerHTML = objRelatorioCadastro.tel_cel;
								document.getElementById('relatorio-bairro').innerHTML = objRelatorioCadastro.bairro;
								document.getElementById('relatorio-cidade').innerHTML = objRelatorioCadastro.cidade;
								document.getElementById('relatorio-uf').innerHTML = objRelatorioCadastro.uf;
							} else {
								alert('Erro: ' +  request.status + ' ' + request.statusText);
							}
						}
					}
					var url = "http://localhost:8079/Projeto_PIM/consultaCadastro.php";
					request.open('Get', url);
					request.send();
					return false;
				}

				</script>







	</main>

	<script type="text/javascript">
	function abrir() {
		var main = document.getElementById("central");
		var item = main.getElementsByTagName("input");
		//var formul = document.getElementsByClassName("escondida");
		//formul.style.display= "none";
		if (item) {
		for (var i=0;i<item.length;i++) {
			item[i].onclick = function() {
				var el = document.getElementById(this.id.substr(7,7));
				if (el.style.display == "block")
 						el.style.display = "none";

				else
					el.style.display = "block";

				}
			}
		}
	}
	window.onload=abrir;

	</script>

<!--script Ajax para consulta de cliente-->
	<script>
	function ConsultaAjax(){
		//document.getElementById('consulta-esconde').style.display.block;
		var request = new XMLHttpRequest();
		//console.log(request);
		request.onreadystatechange = function() {
			if(request.readyState === 4) {
				if(request.status === 200) {
					//alert(request.responseText);
					//var objConsulta = JSON.parse(request.responseText);
					//console.log(request.responseText);
					var objConsulta = JSON.parse(request.responseText);
					//alert(objConsulta.nome);
					document.getElementById('consulta-id').innerHTML = "<b>ID:</b> " + objConsulta.id;
					document.getElementById('consulta-empresa').innerHTML = "<b>Empresa:</b> " + objConsulta.empresa;
					document.getElementById('consulta-nome').innerHTML ="<b>Nome:</b> " + objConsulta.nome;
					document.getElementById('consulta-dtNascimento').innerHTML = "<b>Data de Nascimento:</b> " +  objConsulta.dtNascimento;
					document.getElementById('consulta-cpf').innerHTML = "<b>CPF:</b> " + objConsulta.cpf;
					document.getElementById('consulta-tel_fixo').innerHTML ="<b>Telefone:</b> " +  objConsulta.tel_fixo;
					document.getElementById('consulta-tel_celular').innerHTML = "<b>Celular:</b> " + objConsulta.tel_cel;
					document.getElementById('consulta-bairro').innerHTML = "<b>Bairro:</b> " + objConsulta.bairro;
					document.getElementById('consulta-cidade').innerHTML = "<b>Cidade:</b> " + objConsulta.cidade;
					document.getElementById('consulta-uf').innerHTML = "<b>UF:</b> " + objConsulta.uf;
				} else {
					alert('Erro: ' +  request.status + ' ' + request.statusText);
				}
			}
		}
		var url = "http://localhost:8079/Projeto_PIM/consultaAjax.php";
		var id = document.getElementById('id').value;
		var nome = document.getElementById('nome').value;
		//alert(url+"?id="+id+"&nome="+nome);
		request.open('Get', url+"?id="+id+"&nome="+nome);
		request.send();
		return false;
	}

	</script>

<!--script Ajax para selecionar o cliente a ser excluído-->

	<script>
	function excluirAjax(){
		//document.getElementById('consulta-esconde').style.display.block;
		var request = new XMLHttpRequest();
		//console.log(request);
		request.onreadystatechange = function() {
			if(request.readyState === 4) {
				if(request.status === 200) {
					//alert(request.responseText);
					//var objConsulta = JSON.parse(request.responseText);
					//console.log(request.responseText);
					var objExcluir = JSON.parse(request.responseText);
					//alert(objConsulta.nome);
					document.getElementById('excluir-id').innerHTML = "<b>ID:</b> " + objExcluir.excluirId;
					document.getElementById('excluir-empresa').innerHTML = "<b>Empresa:</b> " + objExcluir.excluirEmpresa;
					document.getElementById('excluir-nome').innerHTML ="<b>Nome:</b> " + objExcluir.excluirNome;
					document.getElementById('excluir-dtNascimento').innerHTML = "<b>Data de Nascimento:</b> " +  objExcluir.excluirDtNascimento;
					document.getElementById('excluir-cpf').innerHTML = "<b>CPF:</b> " + objExcluir.excluirCpf;
					document.getElementById('excluir-tel_fixo').innerHTML ="<b>Telefone:</b> " +  objExcluir.excluirTel_fixo;
					document.getElementById('excluir-tel_celular').innerHTML = "<b>Celular:</b> " + objExcluir.excluirTel_cel;
					document.getElementById('excluir-bairro').innerHTML = "<b>Bairro:</b> " + objExcluir.excluirBairro;
					document.getElementById('excluir-cidade').innerHTML = "<b>Cidade:</b> " + objExcluir.excluirCidade;
					document.getElementById('excluir-uf').innerHTML = "<b>UF:</b> " + objExcluir.excluirUf;
				} else {
					alert('Erro: ' +  request.status + ' ' + request.statusText);
				}
			}
		}
		var url = "http://localhost:8079/Projeto_PIM/excluirAjax.php";
		var excluirId = document.getElementById('excluirId').value;
		var excluirNome = document.getElementById('excluirNome').value;
		//alert(url+"?id="+id+"&nome="+nome);
		request.open('Get', url+"?excluirId="+excluirId+"&excluirNome="+excluirNome);
		request.send();
		return false;
	}

	</script>
	<!--Botão para excluir cadastro-->
	<script>
	function excluirCadastroAjax(){
		var request = new XMLHttpRequest();
		//console.log(request);
		request.onreadystatechange = function() {
			if(request.readyState === 4) {
				if(request.status === 200) {
					var objexcluirCadastro = JSON.parse(request.responseText);
					status = "Excluído com sucesso";
					if (objexcluirCadastro.status == "ok") {
						document.getElementById('excluir-id').innerHTML = "<center><b>*** Cadastro excluído com sucesso! ***</b></center> ";
						document.getElementById('excluir-empresa').innerHTML = "";
						document.getElementById('excluir-nome').innerHTML = "";
						document.getElementById('excluir-dtNascimento').innerHTML = "";
						document.getElementById('excluir-cpf').innerHTML = "";
						document.getElementById('excluir-tel_fixo').innerHTML = "";
						document.getElementById('excluir-tel_celular').innerHTML = "";
						document.getElementById('excluir-bairro').innerHTML = "";
						document.getElementById('excluir-cidade').innerHTML = "";
						document.getElementById('excluir-uf').innerHTML = "";


					}else{
						document.getElementById('excluir-id').innerHTML = "<b>ERRO: Cadastro não excluído!</b> ";
					}

				} else {
					alert("ERRO: Cadastro não excluído");
				}
			}
		}
		var url = "http://localhost:8079/Projeto_PIM/deletarCadastro.php";
		var excluirId = document.getElementById('excluirId').value;
		var excluirNome = document.getElementById('excluirNome').value;
		request.open('Get', url+"?excluirId="+excluirId+"&excluirNome="+excluirNome);
		request.send();
		return false;
	}

	</script>

							<!--Script para registrar chamado-->
		<script>
		nomeEmpresa = "";
		idCliente = "";
		nomeCliente = "";
		function criarOsAjax(){
			var request = new XMLHttpRequest();
			//console.log(request);
				request.onreadystatechange = function() {
					if(request.readyState === 4) {
						if(request.status === 200) {
				  	var objAbrirOs = JSON.parse(request.responseText);
						document.getElementById('abrirChamado-id').innerHTML = "";
						document.getElementById('abrirChamado-empresa').innerHTML = "<p style='text-align: center; font-size:19px;color:blue;padding: 10px 0'>** Chamado aberto com sucesso! **</p>";
						document.getElementById('abrirChamado-nome').innerHTML = "";
						MostrarOsAjax()
					} else {
				alert('Erro: ' +  request.status + ' ' + request.statusText);
			}
			}
			}
			var url = "http://localhost:8079/Projeto_PIM/criarOs.php";
			var gravarEmpresa = nomeEmpresa;
			var gravarIdCliente = idCliente;
			var gravarCliente = nomeCliente;
			var gravarEquipamento = document.getElementById('abrirChamadoEquip').value;
			var gravarTipoServico = document.getElementById('tipoServico').value;
			var gravarDescricao = document.getElementById('descricao').value;

			request.open('Get', url+"?gravarEmpresa="+gravarEmpresa+"&gravarIdCliente="+gravarIdCliente+"&gravarCliente="+gravarCliente+"&gravarEquipamento="+gravarEquipamento+"&gravarTipoServico="+gravarTipoServico+"&gravarDescricao="+gravarDescricao);

		request.send();
		return false;
		}
		</script>


			<!--Script para abrir chamado-->

		<script>
			function abrirChamadoAjax(){
				var request = new XMLHttpRequest();
				//console.log(request);
				request.onreadystatechange = function() {
					if(request.readyState === 4) {
						if(request.status === 200) {
							var objAbrirChamado = JSON.parse(request.responseText);
							document.getElementById('abrirChamado-id').innerHTML = "<b>ID:</b> " + objAbrirChamado.abrirChamadoId;
							idCliente = objAbrirChamado.abrirChamadoId;
							document.getElementById('abrirChamado-empresa').innerHTML = "<b>Empresa:</b> " + objAbrirChamado.abrirChamadoEmpresa;
							nomeEmpresa = objAbrirChamado.abrirChamadoEmpresa;
							document.getElementById('abrirChamado-nome').innerHTML ="<b>Nome:</b> " + objAbrirChamado.abrirChamadoNome;
							nomeCliente = objAbrirChamado.abrirChamadoNome;
						} else {
							alert('Erro: ' +  request.status + ' ' + request.statusText);
						}
					}
				}
				var url = "http://localhost:8079/Projeto_PIM/abrirChamadoAjax.php";
				var abrirChamadoId = document.getElementById('abrirChamadoId').value;
				var abrirChamadoNome = document.getElementById('abrirChamadoNome').value;

				request.open('Get', url+"?abrirChamadoId="+abrirChamadoId+"&abrirChamadoNome="+abrirChamadoNome);
				request.send();
				return false;
			}

			</script>

			<!--TRABALHANDO NO ARQUIVO atividadesOs.PHP PARA REALIZAR O UPDATE-->

			<script>
			function MostrarOsAjax(){
				//document.getElementById('consulta-esconde').style.display.block;
				var request = new XMLHttpRequest();
				//console.log(request);
				request.onreadystatechange = function() {
					if(request.readyState === 4) {
						if(request.status === 200) {
							//alert(request.responseText);
							//var objConsulta = JSON.parse(request.responseText);
							//console.log(request.responseText);
							var objOs = JSON.parse(request.responseText);
							//alert(objConsulta.nome);
							document.getElementById('abrirChamado-nome').innerHTML = "<center><b>Número da <i><b>OS</b></i> gerada: </b>" + objOs.os + "</center>";
						} else {
							alert('Erro: ' +  request.status + ' ' + request.statusText);
						}
					}
				}
				var url = "http://localhost:8079/Projeto_PIM/mostrarOs.php";
			//	var excluirId = document.getElementById('excluirId').value;
			//	var excluirNome = document.getElementById('excluirNome').value;
				//alert(url+"?id="+id+"&nome="+nome);
				request.open('Get', url);
				request.send();
				return false;
			}

			</script>




<!--LOCALIZAR OS-->
<script>

function tratarOsAjax(){


var request = new XMLHttpRequest();

request.onreadystatechange = function() {
	if(request.readyState === 4) {
		if(request.status === 200) {

			var objTratarOs = JSON.parse(request.responseText);
			//alert(objConsulta.nome);
			document.getElementById('consultaId').innerHTML = "<b>ID do cliente:</b> " +objTratarOs.consultarChamadoId;
			document.getElementById('consultaNome').innerHTML = "<b>Nome:</b> " + objTratarOs.consultarChamadoNome;
			document.getElementById('consulta-os').innerHTML = "<b>Ordem de serviço:</b> " + objTratarOs.consultarChamadoOs;
			updateOs = objTratarOs.consultarChamadoOs;
			document.getElementById('consulta-dtEntrada').innerHTML =  "<b>Data de entrada:</b> " + objTratarOs.consultarChamadoData;
			document.getElementById('consulta-tipo_servico').innerHTML = "<b>Tipo de serviço:</b> " +objTratarOs.consultarChamadoTipo_servico;
			document.getElementById('consultaEquipamento').innerHTML = "<b>Equipamento:</b> "+ objTratarOs.consultarChamadoEquipamento;
			document.getElementById('consultaDescricao').innerHTML = "<b>Descrição:</b>" + objTratarOs.consultarChamadoDescricao;
		} else {
			alert('Erro: ' +  request.status + ' ' + request.statusText);
		}
	}
}
var url = "http://localhost:8079/Projeto_PIM/localizarOs.php";
var consultarChamadoOs = document.getElementById('consultarChamadoOs').value;
var nome = document.getElementById('consultarChamadoNome').value;
//alert(url+"?id="+id+"&nome="+nome);
request.open('Get', url+"?consultarChamadoOs="+consultarChamadoOs+"&consultarChamadoNome="+consultarChamadoNome);
request.send();
return false;
}

</script>

<script>
updateOs ="";
function updateOsAjax(){

	var request = new XMLHttpRequest();
	//console.log(request);
		request.onreadystatechange = function() {

			if(request.readyState === 4) {
				if(request.status === 200) {

				var objupdateOs = JSON.parse(request.responseText);
				document.getElementById('consultaDescricao').innerHTML = "<p style='text-align: center; font-size:19px;color:blue;padding: 10px 0'>** OS atualizada com sucesso! **</p>";
			} else {
		alert('Erro: ' +  request.status + ' ' + request.statusText);
	}
	}
	}
	var url = "http://localhost:8079/Projeto_PIM/updateTratarOs.php";
	var GravarUpdateOs = updateOs;
	var registrarAtividade = document.getElementById('registrarAtividade').value;
	var novaDescricao = document.getElementById('novaDescricao').value;

	request.open('Get', url+"?GravarUpdateOs="+GravarUpdateOs+"&registrarAtividade="+registrarAtividade+"&novaDescricao="+novaDescricao);

request.send();
return false;
}
</script>


</body>
</html>
