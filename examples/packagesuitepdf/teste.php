<?php

require_once "./../../vendor/autoload.php";

use Packagesuite\Object\TextObject;

$pdf = new \Packagesuite\Pdf();



$pdf->addRow("asasas");
$pdf->addLineBreak();
$pdf->addRow("dddd");
$pdf->buildPdf();