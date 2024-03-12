<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="login.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>Login</title>
</head>

<body>
<a class="home-btn" id="home-btn" href="/formulario/"><i class="bi bi-house-down-fill"></i></a>
<div id="login-form">
    <h2>Login</h2>
    <form method="POST" id="login">
      <div class="form-group">
        <label for="username">E-mail:</label>
        <input type="text" id="username" name="email_cliente" required>
      </div>
      <div class="form-group">
        <label for="password">Senha:</label>
        <input type="password" id="password" name="pass_cliente" required>
      </div>
      <button type="submit">Login</button>
      </form>
      <a id="rec" href="recuperar_senha.php">Esqueceu a senha?</a>
    <a class="voltar-btn" id="voltar-btn" href="javascript:history.back()">Voltar</a>
  </div>


  <script>
    const form = document.getElementById('login')

    form.addEventListener('submit', evento => {
      evento.preventDefault();

      const formData = new FormData(form);
      const data = Object.fromEntries(formData);

      fetch('http://localhost/Formulario/processar_login.php', {

        method: 'POST',
        body: formData
      }).then(res => res.json()).then(data => {
        if (data.result == true) {

          alert("Login realizado com sucesso!")
          window.location.assign("http://localhost/Formulario/listagem.php")




        } else {

          alert("Usuário ou senha incorretos")
        }


      })

    })
  </script>
</body>

</html>
