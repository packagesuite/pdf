<?php

use PackageSuitePdf\Composition\Cell;

require_once "./../../vendor/autoload.php";


$pdf = new \PackageSuitePdf\Pdf();

$composer = $pdf->getComposer();

$composer->page()
    ->cell(new Cell("Text 1", 50, 30))
    ->cell(new Cell("Text 2", 50, 50))
    ->cell(new Cell("Text 3", 50,70))
    ->cell(new Cell("Text 4", 50, 90))
    ->cell(new Cell("Text 5", 50, 110));

$composer->page()
    ->cell(new Cell("Text 6", 50, 30))
    ->cell(new Cell("Text 7", 50, 50))
    ->cell(new Cell("Text 8", 50,70))
    ->cell(new Cell("Text 9", 50, 90))
    ->cell(new Cell("Text 10", 50, 110));

$composer->page()
    ->cell(new Cell("Text 6", 50, 30))
    ->cell(new Cell("Text 7", 50, 50))
    ->cell(new Cell("Text 8", 50,70))
    ->cell(new Cell("Text 9", 50, 90))
    ->cell(new Cell("Text 10", 50, 110));

$composer->page()
    ->cell(new Cell("Text 6", 50, 30))
    ->cell(new Cell("Text 7", 50, 50))
    ->cell(new Cell("Text 8", 50,70))
    ->cell(new Cell("Text 9", 50, 90))
    ->cell(new Cell("Text 10", 50, 110));

$composer->page()
    ->cell(new Cell("Text 6", 50, 30))
    ->cell(new Cell("Text 7", 50, 50))
    ->cell(new Cell("Text 8", 50,70))
    ->cell(new Cell("Text 9", 50, 90))
    ->cell(new Cell("Text 10", 50, 110));

$composer->page()
    ->cell(new Cell("Text 6", 50, 30))
    ->cell(new Cell("Text 7", 50, 50))
    ->cell(new Cell("Text 8", 50,70))
    ->cell(new Cell("Text 9", 50, 90))
    ->cell(new Cell("Text 10", 50, 110));

$composer->page()
    ->cell(new Cell("Text 6", 50, 30))
    ->cell(new Cell("Text 7", 50, 50))
    ->cell(new Cell("Text 8", 50,70))
    ->cell(new Cell("Text 9", 50, 90))
    ->cell(new Cell("Text 10", 50, 110));

$composer->page()
    ->cell(new Cell("Text 6", 50, 30))
    ->cell(new Cell("Text 7", 50, 50))
    ->cell(new Cell("Text 8", 50,70))
    ->cell(new Cell("Text 9", 50, 90))
    ->cell(new Cell("Text 10", 50, 110));

$composer->page()
    ->cell(new Cell("Text 6", 50, 30))
    ->cell(new Cell("Text 7", 50, 50))
    ->cell(new Cell("Text 8", 50,70))
    ->cell(new Cell("Text 9", 50, 90))
    ->cell(new Cell("Text 10", 50, 110));

$pdf->export($composer);