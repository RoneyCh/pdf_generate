<?php
session_start();
include_once('connection.php');

// receber os dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$user = $dados['user'];
$email = $dados['email'];
$rua = $dados['rua'];
$numero = $dados['numero'];
$bairro = $dados['bairro'];

if (!empty($dados['cad_usuario'])) {
    mysqli_autocommit($conn, FALSE);
    $add_user =  "INSERT INTO usuario (usuario, email, created) VALUES ('$user', '$email', NOW())";
    if (mysqli_query($conn, $add_user) === TRUE) {
        $cad_id = mysqli_insert_id($conn);
        $add_address = "INSERT INTO endereco (rua,numero,bairro,usuario_id) VALUES ('$rua', '$numero', '$bairro', '$cad_id')";
        mysqli_query($conn, $add_address);

        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
        header('Location: index.php');
    }
    if (!mysqli_commit($conn)) {
        $_SESSION['msg'] = "<p style='color:red;'>Não foi possível cadastrar!</p>";
        header('Location: index.php');
        exit();
    }
}
