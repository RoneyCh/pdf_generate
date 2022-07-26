<?php
session_start();
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
    <a href="consult.php">Gerar consulta PDF</a>
    <h1>Cadastro</h1>
    <?php 
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form action="add.php" method="post" style="display: flex; flex-direction:column">
        <h2>Usuario</h2>
        <div style="margin-bottom: 20px;">
        <label>Usuario</label>
        <input type="text" name="user" id="user" required>
        <label>Email</label>
        <input type="email" name="email" id="email" required>
        </div>
        <h2>Endereço</h2>
        <div style="margin-bottom:20px;">
        <label>Rua</label>
        <input type="text" name="rua" id="rua" required>
        <label>Numero</label>
        <input type="number" name="numero" id="numero" required>
        <label>Bairro</label>
        <input type="text" name="bairro" id="bairro" required>
        </div>
        <h2>Perfil</h2>
        <div style="margin-bottom:20px;">
        <label>Bio</label>
        <input type="text" name="bio" id="bio" required>
        <label>Idade</label>
        <input type="number" name="idade" id="idade" required>
        <label>Profissão</label>
        <input type="text" name="prof" id="prof" required>
        </div>
        <input type="submit" value="Cadastrar" name="cad_usuario">
    </form>
</body>
</html>
