<?php
session_start();
include_once('connection.php');

$consult = "SELECT * FROM usuario as u LEFT JOIN endereco as en ON u.id = en.usuario_id LEFT JOIN perfil as p ON u.id = p.pusuario_id WHERE u.id=" . $_GET['id'];
$query_edit = $conn->query($consult);
$row = $query_edit->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="display: flex">
    <a href="index.php" style="margin: 10px">Cadastro</a>
    <a href="consult.php" style="margin: 10px">Gerar consulta PDF</a>
    <a href="list_cad.php" style="margin: 10px">Lista de cadastros</a>
    </div>
    <h1>Editar cadastro</h1>
    <?php 
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form action="edit.php" method="post" style="display: flex; flex-direction:column">
        <h2>Usuario</h2>
        <div style="margin-bottom: 20px;">
        <label>Usuario</label>
        <input type="text" name="user" id="user" value="<?php echo $row['usuario'] ?>" required>
        <label>Email</label>
        <input type="email" name="email" id="email" value="<?php echo $row['email'] ?>" required>
        </div>
        <h2>Endereço</h2>
        <div style="margin-bottom:20px;">
        <label>Rua</label>
        <input type="text" name="rua" id="rua" value="<?php echo $row['rua'] ?>" required>
        <label>Numero</label>
        <input type="number" name="numero" id="numero" value="<?php echo $row['numero'] ?>" required>
        <label>Bairro</label>
        <input type="text" name="bairro" id="bairro" value="<?php echo $row['bairro'] ?>" required>
        </div>
        <h2>Perfil</h2>
        <div style="margin-bottom:20px;">
        <label>Bio</label>
        <input type="text" name="bio" id="bio" value="<?php echo $row['bio'] ?>" required>
        <label>Idade</label>
        <input type="number" name="idade" id="idade" value="<?php echo $row['idade'] ?>" required>
        <label>Profissão</label>
        <input type="text" name="prof" id="prof" value="<?php echo $row['profissao'] ?>" required>
        </div>
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <input type="submit" value="Editar" name="edit_usuario"> 
    </form>
</body>
</html>