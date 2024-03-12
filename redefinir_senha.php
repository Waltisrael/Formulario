<?php
session_start();

// Verificar se o token de redefinição de senha está presente na sessão
if (!isset($_SESSION['reset_token']) || !isset($_SESSION['reset_email'])) {
    echo "Solicitação inválida de redefinição de senha.";
    exit();
}

$token = $_SESSION['reset_token'];
$email = $_SESSION['reset_email'];

// Verificar se o token é válido (você pode adicionar uma verificação de expiração se desejar)

// Processar a redefinição de senha se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('db.registro.php');

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $nova_senha = $_POST['nova_senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    // Verificar se as senhas coincidem
    if ($nova_senha !== $confirmar_senha) {
        echo "As senhas não coincidem.";
        exit();
    }

    // Hash da nova senha
    $hashed_password = password_hash($nova_senha, PASSWORD_DEFAULT);

    // Atualizar a senha no banco de dados
    $sql = "UPDATE cadastro_clientes SET pass_cliente = '$hashed_password' WHERE email_cliente = '$email'";
    $resultado = mysqli_query($link, $sql);

    if ($resultado) {
        echo "Senha atualizada com sucesso.";
        // Remover as variáveis de sessão de redefinição de senha após o processo ser concluído
        unset($_SESSION['reset_token']);
        unset($_SESSION['reset_email']);
        $_SESSION['senha_atualizada'] = true;
    } else {
        echo "Ocorreu um erro ao atualizar a senha.";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="senha.css">
    <title>Redefinir Senha</title>
</head>
<body>
    <h1>Redefinir Senha</h1>
    <?php
    // Verificar se a senha foi atualizada com sucesso
    if (isset($_SESSION['senha_atualizada']) && $_SESSION['senha_atualizada'] === true) {
        
    ?>
    <script>
      alert("Senha atualizada com sucesso")
      window.location.assign("http://localhost/Formulario/login.php")
    </script>
    <?php
    }
    ?>
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nova_senha">Nova Senha:</label>
        <input type="password" id="nova_senha" name="nova_senha" required><br><br>
        <label for="confirmar_senha">Confirmar Nova Senha:</label>
        <input type="password" id="confirmar_senha" name="confirmar_senha" required><br><br>
        <input type="submit" value="Redefinir Senha">
    </form>

</body>
</html>
