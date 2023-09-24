<?php


require_once "./../../vendor/autoload.php";

require_once './../../vendor/setasign/fpdf/fpdf.php';

$fpdf = new FPDF();
$fpdf->SetCompression(false);
$fpdf->AddPage();
$fpdf->SetFont('Arial');
$fpdf->Cell(18, 0.5, "Caçarola", 0, 0.5);
$fpdf->Ln(2);
$fpdf->Cell(18, 0.5, "Caçarola 2", 0, 0.5);

$fpdf->Output('F', 'teste.pdf');

