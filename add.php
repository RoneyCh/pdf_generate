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
$bio = $dados['bio'];
$idade = $dados['idade'];
$prof = $dados['prof'];

if (!empty($dados['cad_usuario'])) {
    mysqli_autocommit($conn, FALSE);
    $add_user =  "INSERT INTO usuario (usuario, email, created) VALUES ('$user', '$email', NOW())";
    // trying to insert in multiple tables with mysqli but can't insert into perfil table yet
    if (mysqli_query($conn, $add_user) === TRUE) {
        $cad_id = mysqli_insert_id($conn);
        $id_cad = $cad_id;
        $add_info = "INSERT INTO endereco (rua,numero,bairro,usuario_id) VALUES ('$rua', '$numero', '$bairro', '$cad_id')";
        $add_perfil .= "INSERT INTO perfil (bio, idade, profissao, pusuario_id) VALUES ('$bio', '$idade', '$prof', '$id_cad')";
        
        if (mysqli_query($conn, $add_info) === TRUE) {
            mysqli_query($conn, $add_perfil);
            $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
            header('Location: index.php');
            }
        }
    
    if (!mysqli_commit($conn)) {
        $_SESSION['msg'] = "<p style='color:red;'>Não foi possível cadastrar!</p>";
        header('Location: index.php');
        exit();
    }
}
