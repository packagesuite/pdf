<?php


require_once "./../../vendor/autoload.php";

require_once './../../vendor/setasign/fpdf/fpdf.php';

$fpdf = new FPDF();
$fpdf->AddPage();
$fpdf->SetFont('Arial');
$fpdf->Cell(18, 0.5, "Caçarola");

$fpdf->Output('F', 'teste.pdf');

