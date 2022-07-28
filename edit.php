<?php 
session_start();

include_once('connection.php');

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$user = $dados['user'];
$email = $dados['email'];
$rua = $dados['rua'];
$numero = $dados['numero'];
$bairro = $dados['bairro'];
$bio = $dados['bio'];
$idade = $dados['idade'];
$prof = $dados['prof'];
$id = $dados['id'];

if (!empty($dados['edit_usuario'])) {
$update = "UPDATE usuario as u LEFT JOIN endereco as en ON u.id=en.usuario_id LEFT JOIN perfil as p 
ON u.id=p.pusuario_id SET u.usuario='$user', u.email='$email', en.rua='$rua', 
en.numero='$numero',en.bairro='$bairro', p.bio='$bio', 
p.idade='$idade', p.profissao='$prof' WHERE u.id='$id'";


if($query_update = $conn->query($update)) {
    $_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso!</p>";
    header('Location: edit-venda.php?id='.$id);
}
else {
    $_SESSION['msg'] = "<p style='color:red;'>Não foi possível editar!</p>";
    header('Location: edit-venda.php?id='.$id);
}

}
