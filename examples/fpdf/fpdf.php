<?php


require_once "./../../vendor/autoload.php";

require_once './../../vendor/setasign/fpdf/fpdf.php';

$fpdf = new FPDF();
$fpdf->SetCompression(false);
$fpdf->AddPage();
$fpdf->SetFont('Arial');
$fpdf->SetTextColor('Arial');
$fpdf->Cell(18, 0.5, "Caçarola", 1);

$fpdf->Output('F', 'teste.pdf');

