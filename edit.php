<?php

require_once('check.php');

if (!empty($_GET['id'])) {
	$id = $_GET['id'];
	require_once('db.registro.php');

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$sql = "SELECT * FROM cadastro_clientes WHERE id = $id";
	$lista = mysqli_query($link, $sql);

	if ($lista === false) {
		// Se a consulta falhar, imprima o erro e termine o script
		die(mysqli_error($link));
	}

	$dados_usuario = mysqli_fetch_assoc($lista);

	// Processar os dados do usuário
	$usuario = $dados_usuario['nome_cliente'];
	$tipo = $dados_usuario['tipo_cliente'];
	$doc = $dados_usuario['doc_cliente'];
	$rg = $dados_usuario['rg_cliente'];
	$city = $dados_usuario['city_cliente'];
	$estado = $dados_usuario['estado_cliente'];
	$bairro = $dados_usuario['bairro_cliente'];
	$rua = $dados_usuario['rua_cliente'];
	$numero = $dados_usuario['numero_cliente'];
	$tel = $dados_usuario['tel_cliente'];
	$email = $dados_usuario['email_cliente'];
	$pass = $dados_usuario['pass_cliente'];
	$obs = $dados_usuario['obs_cliente'];
} else {
	die("GET NAO DEFINIDO");
}
?>

<!doctype html>

<html>

<head>
	<title>Formulário de Clientes</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="edit.css">

	<title>Cadastro</title>

</head>

<body class="body_form">

	<div class="container">
		<header>Edição</header>

		<form method="post" action="saveEdit.php" id="formcadastro">
			<div class="form first">
				<div class="details personal">

					<div class="fields">

						<div>
							<input type="hidden" name="id" value=<?= $id ?>>
						</div>;


						<div class="input-field">
							<label>Nome Completo:</label>
							<input type="text" name="nome_cliente" value="<?= $usuario ?>">
						</div>

						<div class="input-field">
							<label for="tipo_cliente">Tipo de Cliente:</label>
							<select name="tipo_cliente" id="tipo_cliente">
								<option value="">Select</option>
								<option <?= $tipo == "Pessoa fisica" ? 'selected' : '' ?> value="Pessoa fisica">Pessoa física</option>
								<option <?= $tipo == "Pessoa juridica" ? 'selected' : '' ?> value="Pessoa juridica">Pessoa juridica</option>
							</select>
						</div>

						<div class="input-field">
							<label>CPF/CNPJ:</label>
							<input type="text" name="doc_cliente" value="<?php echo $doc ?>">
						</div>

						<div class="input-field">
							<label>RG/Ie:</label>
							<input type="text" name="rg_cliente" value="<?php echo $rg ?>">
						</div>

						<div class="input-field">
							<label>Cidade:</label>
							<input type="text" name="city_cliente" value="<?php echo $city ?>">
						</div>

						<div class="input-field">
							<label for="estado_cliente">Estado:</label>
							<select name="estado_cliente" id="estado_cliente">
								<optgroup label="região sudeste">
									<option value="">selecione</option>
									<option <?= $estado == "SP" ? 'selected' : '' ?> value="SP">SP</option>
									<option <?= $estado == "RJ" ? 'selected' : '' ?> value="RJ">RJ</option>
									<option <?= $estado == "AC" ? 'selected' : '' ?> value="AC">Acre</option>
									<option <?= $estado == "AL" ? 'selected' : '' ?> value="AL">Alagoas</option>
									<option <?= $estado == "AP" ? 'selected' : '' ?> value="AP">Amapá</option>
									<option <?= $estado == "AM" ? 'selected' : '' ?> value="AM">Amazonas</option>
							</select>
						</div>

						<div class="input-field">
							<label>Bairro:</label>
							<input type="text" name="bairro_cliente" value="<?php echo $bairro ?>">
						</div>

						<div class="input-field">
							<label>Rua:</label>
							<input type="text" name="rua_cliente" value="<?php echo $rua ?>">
						</div>

						<div class="input-field">
							<label>Numero:</label>
							<input type="Number" name="numero_cliente" value="<?php echo $numero ?>">
						</div>

						<div class="input-field">
							<label>Telefone:</label>
							<input type="text" name="tel_cliente" value="<?php echo $tel ?>">
						</div>

						<div class="input-field">
							<label>Email:</label>
							<input type="text" name="email_cliente" value="<?php echo $email ?>">
						</div>

						<div class="input-field">
							<label>Senha:</label>
							<input type="password" name="pass_cliente" value="<?php echo $pass ?>">
						</div>

					</div>

				</div>
			</div>
			<div class="inferior-tabela">
				<button class="botao" type="submit" name="update" id="update">Editar</button>

			</div>
		</form>

	</div>
	<a class="voltar-btn" id="voltar-btn" href="javascript:history.back()">Voltar</a>
</body>