<?php
session_start();
include_once('connection.php');

$read_data = "SELECT u.id as uid, u.usuario, u.email,
en.rua, en.numero, en.bairro, p.bio, p.idade, p.profissao 
FROM usuario as u INNER JOIN endereco as en ON u.id = en.usuario_id 
INNER JOIN perfil as p ON u.id = p.pusuario_id";
$query_data = $conn->query($read_data);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <h1>Lista de cadastro</h1>
    <?php 
    if(isset($_SESSION['apg'])){
        echo $_SESSION['apg'];
        unset($_SESSION['apg']);
    }
    ?>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Usuário</th>
      <th scope="col">Email</th>
      <th scope="col">Rua</th>
      <th scope="col">Número</th>
      <th scope="col">Bairro</th>
      <th scope="col">Bio</th>
      <th scope="col">Idade</th>
      <th scope="col">Profissão</th>
    </tr>
  </thead>
  <?php
    while($row = $query_data->fetch_assoc()) {  
        echo "<tbody>";
        echo "<tr>";
        echo "<td>" . $row['usuario'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['rua']  . "</td>";
        echo "<td>" . $row['numero'] . "</td>";
        echo "<td>" . $row['bairro'] . "</td>";
        echo "<td>" . $row['bio'] . "</td>";
        echo "<td>" . $row['idade'] . "</td>";
        echo "<td>" . $row['profissao'] . "</td>";
        echo "<td><a class='btn btn-danger' href='apagar.php?id=" . $row['uid'] . "'>Apagar</a> <a class='btn btn-info' href='edit-venda.php?id=" . $row['uid'] . "'>Editar</a></td>";
        echo "</tr>";
        echo "</tbody>";

    }
    ?>
 


  
</table>
</body>
</html>