<?php

use PackageSuitePdf\Composition\Cell;

require_once "./../../vendor/autoload.php";


$pdf = new \PackageSuitePdf\Pdf();

$composer = $pdf->getComposer();

$composer->page()
    ->cell(new Cell("Texto", 50, 30))
    ->cell(new Cell("Texto 2", 50, 50))
    ->cell(new Cell("Texto 3", 50,70))
    ->cell(new Cell("Texto 4", 50, 90))
    ->cell(new Cell("Texto 5", 50, 110));

$pdf->export($composer);