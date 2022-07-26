<?php
include_once('connection.php');
require_once 'fpdf184/fpdf.php';


$get_user = "SELECT * FROM usuario as u LEFT JOIN endereco as en ON en.usuario_id=u.id LEFT JOIN perfil as p ON u.id = p.pusuario_id";
$result_user = mysqli_query($conn, $get_user);

$pdf = new FPDF();
$pdf->AddPage('H');

$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(190, 10, utf8_decode("Usuários cadastrados"), 0, 0, 'C');
$pdf->Ln(15);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(20, 7, utf8_decode("Usuario"), 1, 0, 'C');
$pdf->Cell(60, 7, utf8_decode("Email"), 1, 0, 'C');
$pdf->Cell(40, 7, utf8_decode("Rua"), 1, 0, 'C');
$pdf->Cell(20, 7, utf8_decode("Nº"), 1, 0, 'C');
$pdf->Cell(30, 7, utf8_decode("Bairro"), 1, 0, 'C');
$pdf->Cell(40, 7, utf8_decode("Bio"), 1, 0, 'C');
$pdf->Cell(20, 7, utf8_decode("Idade"), 1, 0, 'C');
$pdf->Cell(40, 7, utf8_decode("Profissao"), 1, 0, 'C');
$pdf->Ln();

while ($user_get = $result_user->fetch_assoc()) {

    $pdf->Cell(20, 7, utf8_decode($user_get['usuario']), 1, 0, 'C');
    $pdf->Cell(60, 7, utf8_decode($user_get['email']), 1, 0, 'C');
    $pdf->Cell(40, 7, utf8_decode($user_get['rua']), 1, 0, 'C');
    $pdf->Cell(20, 7, utf8_decode($user_get['numero']), 1, 0, 'C');
    $pdf->Cell(30, 7, utf8_decode($user_get['bairro']), 1, 0, 'C');
    $pdf->Cell(40, 7, utf8_decode($user_get['bio']), 1, 0, 'C');
    $pdf->Cell(20, 7, utf8_decode($user_get['idade']), 1, 0, 'C');
    $pdf->Cell(40, 7, utf8_decode($user_get['profissao']), 1, 0, 'C');
    $pdf->Ln();
}

$pdf->Output();
