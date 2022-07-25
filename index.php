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
    <form action="add.php" method="post">
        <label>Usuario</label>
        <input type="text" name="user" id="user">
        <label>Email</label>
        <input type="email" name="email" id="email">
        <label>Rua</label>
        <input type="text" name="rua" id="rua">
        <label>Numero</label>
        <input type="number" name="numero" id="numero">
        <label>Bairro</label>
        <input type="text" name="bairro" id="bairro">
        <input type="submit" value="Cadastrar" name="cad_usuario">
    </form>
</body>
</html>
