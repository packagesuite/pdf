<?php

use PackageSuitePdf\Composition\Cell;

require_once "./../../vendor/autoload.php";


$pdf = new \PackageSuitePdf\Pdf();

$composer = $pdf->getComposer();


$cell = new Cell("Texto", 50, 30);
$composer->cell($cell);

$cell = new Cell("Texto 2", 50, 50);
$composer->cell($cell);

$cell = new Cell("Texto 3", 50,70);
$composer->cell($cell);

$cell = new Cell("Texto 4", 50, 90);
$composer->cell($cell);

$cell = new Cell("Texto 5", 50, 110);
$composer->cell($cell);

$pdf->export($composer);