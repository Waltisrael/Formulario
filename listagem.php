<?php

require_once('db.registro.php');

require_once('check.php');

$objDb = new db();
$link = $objDb->conecta_mysql();


$sql = "SELECT * FROM cadastro_clientes ORDER BY ID ASC";
$lista = mysqli_query($link, $sql);

$dados_usuario = mysqli_fetch_array($lista);
//var_dump($dados_usuario);


?>

<!doctype html>
<html>

<head>
  <title>Clientes cadastrados</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="list.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class='body_listagem'>
  <div class="corpo">
    <div class="style_list">
      <header class="cliente">
        <h1>Clientes cadastrados:</h1><span><a class="novo-btn" id="novo-btn" href="/formulario/cadastro/"><i class="bi bi-clipboard2-plus-fill"></i></a></span>
      </header>

      <p><strong>Nesta página poderá registrar e editar todos os clientes cadastrados no sistema.</strong></p><br>

      <div id="container">
        <table class='table'>

          <thead>
            <tr style="background-color: #dddddd;">
              <th>#</th>
              <th>Nome</th>
              <th>Tipo de cliente</th>
              <th>Documento</th>
              <th>RG</th>
              <th>Cidade</th>
              <th>Estado</th>
              <th>Bairro</th>
              <th>Rua</th>
              <th>Numero</th>
              <th>Telefone</th>
              <th>Email</th>
              <th>...</th>
            </tr>
          </thead>

          <tbody>
            <?php
            mysqli_data_seek($lista, 0);
            while ($user_data = mysqli_fetch_assoc($lista)) {
            ?>
              <tr>
                <td><?= $user_data['id'] ?></td>
                <td><?= $user_data['nome_cliente'] ?></td>
                <td><?= $user_data['tipo_cliente'] ?></td>
                <td><?= $user_data['doc_cliente'] ?></td>
                <td><?= $user_data['rg_cliente'] ?></td>
                <td><?= $user_data['city_cliente'] ?></td>
                <td><?= $user_data['estado_cliente'] ?></td>
                <td><?= $user_data['bairro_cliente'] ?></td>
                <td><?= $user_data['rua_cliente'] ?></td>
                <td><?= $user_data['numero_cliente'] ?></td>
                <td><?= $user_data['tel_cliente'] ?></td>
                <td><?= $user_data['email_cliente'] ?></td>
                <td class='btn-edit2'>
                  <a class='btn_edit' href="edit.php?id=<?= $user_data['id'] ?>"><i class='bi bi-pencil-fill'></i></a>
                  <a class='btn-edit' href="delete.php?id=<?= $user_data['id'] ?>"><i class="bi bi-trash"></i></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="btn-container">
        <a class='logout-button' href="logout.php"><i class="bi bi-box-arrow-right"></i>Logout</a>
        <a class="voltar-btn" id="voltar-btn" href="javascript:history.back()"><i class="bi bi-arrow-right-square-fill"></i></a>
        <a class="home-btn" id="voltar-btn" href="/formulario/"><i class="bi bi-house-down-fill"></i></a>

      </div>
    </div>
  </div>
</body>

</html>