<?php
session_start(); 
include_once('connection.php');

$delete = "DELETE FROM usuario WHERE usuario.id=" . $_GET['id'];


if($query_delete = $conn->query($delete) === TRUE) {
    $_SESSION['apg'] = "<p style='color:green;'>Usuário apagado com sucesso!</p>";
    header('Location: list_cad.php');
        
}

?>