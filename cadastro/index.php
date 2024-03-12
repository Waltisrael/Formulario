<?php

    require_once('../check.php')

?>
<!doctype html>

<html>

<head>
	<title>Formulário de Clientes</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">

	<script>
		//script para CPF
		function formatarCPF() {
			let cpfInput = document.getElementById('cpf_input');
			let cpf = cpfInput.value;

			cpf = cpf.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
			cpf = cpf.replace(/^(\d{3})(\d)/, '$1.$2'); // Adiciona o ponto após o terceiro dígito
			cpf = cpf.replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3'); // Adiciona o ponto após o sexto dígito
			cpf = cpf.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4'); // Adiciona o traço após o nono dígito

			cpfInput.value = cpf;
		}
	</script>

	<script>
		//script para RG
		function formatarRG() {
			let rgInput = document.getElementById('rg_input');
			let rg = rgInput.value;

			rg = rg.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
			rg = rg.replace(/^(\d{2})(\d)/, '$1.$2'); // Adiciona o ponto após o segundo dígito
			rg = rg.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3'); // Adiciona o ponto após o quinto dígito
			rg = rg.replace(/^(\d{2})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4'); // Adiciona o traço após o oitavo dígito

			rgInput.value = rg;
		}
	</script>

	<script>
		//script para celular
		function formatarCelular() {
			let celularInput = document.getElementById('celular_input');
			let celular = celularInput.value;

			celular = celular.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
			celular = celular.replace(/^(\d{2})(\d)/, '($1) $2'); // Adiciona o código de área entre parênteses
			celular = celular.replace(/^(\d{2})\s(\d{5})(\d)/, '($1) $2-$3'); // Adiciona o hífen após o quinto dígito

			celularInput.value = celular;
		}
	</script>


	<title>Cadastro</title>

</head>

<body class="body_form">

	<div class="container">

		<header>
			<sapan>Cadastro</sapan>

		</header>

		<form method="post" action="registro_cliente.php" id="formcadastro">
			<div class="form first">
				<div class="details personal">
					<span class="title">Preencha com seus dados:</span>

					<div class="fields">

						<div class="input-field">
							<label>Nome Completo:</label>
							<input type="text" name="nome_cliente" autofocus required>
						</div>

						<div class="input-field">
							<label for="tipo_cliente">Tipo de Cliente:</label>
							<select name="tipo_cliente" id="tipo_cliente">
								<option value="Select">Select</option>
								<option value="PF">Pessoa física</option>
								<option value="PJ">Pessoa juridica</option>
							</select>
						</div>

						<div class="input-field">
							<label>CPF/CNPJ:</label>
							<input type="text" name="doc_cliente" id="cpf_input" placeholder="000.000.000-xx" oninput="formatarCPF()" maxlength="14">
						</div>

						<div class="input-field">
							<label>RG/Ie:</label>
							<input type="text" name="rg_cliente" id="rg_input" placeholder="00.000.000-x" oninput="formatarRG()" maxlength="12">
						</div>

						<div class="input-field">
							<label>Cidade:</label>
							<input type="text" name="city_cliente">
						</div>

						<div class="input-field">
							<label for="estado_cliente">Estado:</label>
							<select name="estado_cliente" id="estado_cliente">
								<optgroup label="região sudeste">
									<option value="selecione" selected>selecione</option>
									<option value="SP">São Paulo</option>
									<option value="RJ">Rio de Janeiro</option>
									<option value="AC">Acre</option>
									<option value="AL">Alagoas</option>
									<option value="AP">Amapá</option>
									<option value="AM">Amazonas</option>
							</select>
						</div>

						<div class="input-field">
							<label>Bairro:</label>
							<input type="text" name="bairro_cliente">
						</div>

						<div class="input-field">
							<label>Rua:</label>
							<input type="text" name="rua_cliente">
						</div>

						<div class="input-field">
							<label>Numero:</label>
							<input type="Number" name="numero_cliente">
						</div>

						<div class="input-field">
							<label>Telefone:</label>
							<input type="text" name="tel_cliente" id="celular_input" placeholder="(12)9999-0000" oninput="formatarCelular()" maxlength="15">
						</div>

						<div class="input-field">
							<label>Email:</label>
							<input type="text" name="email_cliente" placeholder="teste@teste.com.br">
						</div>
						<div class="input-field">
							<label for="password">Senha:</label>
							<input type="password" id="pass_cliente" name="pass_cliente" required>
						</div>
					</div>
					<div class="input-field">
						<label for="obs_cliente">Observações:</label>
						<textarea class="obs_cliente" name="obs_cliente" rows="5"></textarea>

					</div>

				</div>

				<div class="inferior-tabela"><button class="botao" type="submit" onclick="newDoc()">Cadastrar</button></div>
			</div>
		</form>

	</div>
	<a class="voltar-btn" id="voltar-btn" href="javascript:history.back()">Voltar</a>
</body>