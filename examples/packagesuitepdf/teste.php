<?php

use PackageSuitePdf\Composition\Cell\Cell;
use PackageSuitePdf\Composition\Cell\CellStyle;

require_once "./../../vendor/autoload.php";


$pdf = new \PackageSuitePdf\Pdf();

$composer = $pdf->getComposer();

$cell = new Cell("Text 1", 50, 30);
$cellStyle = (new CellStyle())->setColor(255, 0, 0)->setBorder(15, 805, 45, 45);

$cell->setStyle($cellStyle);

$composer->page()
    ->cell($cell)
    ->cell(new Cell("Text 2", 50, 50))
    ->cell(new Cell("Text 3", 50,70))
    ->cell(new Cell("Text 4", 50, 90))
    ->cell(new Cell("Text 5", 50, 110));


$pdf->export($composer);