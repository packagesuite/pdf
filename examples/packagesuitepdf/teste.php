<?php

use PackageSuitePdf\Composition\Cell;
use PackageSuitePdf\Object\PositionTextObject;
use PackageSuitePdf\Object\TextObject;

require_once "./../../vendor/autoload.php";


$pdf = new \PackageSuitePdf\Pdf();

$composer = $pdf->getComposer();


$positionTextObject = new PositionTextObject(50, 30);
$textObject = new TextObject("Texto", $positionTextObject);
$cell = new Cell($textObject);

$composer->cell($cell);

$positionTextObject = new PositionTextObject(50, 50);
$textObject = new TextObject("Texto 2", $positionTextObject);
$cell = new Cell($textObject);

$composer->cell($cell);

$positionTextObject = new PositionTextObject(50, 70);
$textObject = new TextObject("Texto 3", $positionTextObject);
$cell = new Cell($textObject);

$composer->cell($cell);


$positionTextObject = new PositionTextObject(50, 90);
$textObject = new TextObject("Texto 4", $positionTextObject);
$cell = new Cell($textObject);

$composer->cell($cell);


$positionTextObject = new PositionTextObject(50, 110);
$textObject = new TextObject("Texto 5", $positionTextObject);
$cell = new Cell($textObject);

$composer->cell($cell);

//$positionTextObject = new PositionTextObject(50, 5, 1,0, 0,1);
//$pdf->addRow("asasas", $positionTextObject);
//
//$positionTextObject = new PositionTextObject(50, 15, 1,0, 0,1);
//$pdf->addRow("asasa 2 s", $positionTextObject);

//
//$y += 50;
//$x += 50;
//$marginTop += 50;
//$positionTextObject = new PositionTextObject($x, $y, 1,0, $marginTop,1);

//$pdf->addLineBreak($positionTextObject);
//
//$y += 50;
//$x += 50;
//$marginTop += 50;
//$positionTextObject = new PositionTextObject($x, $y, 1,0, $marginTop,1);
//
//$pdf->addRow("dddd", $positionTextObject);
//$pdf->buildPdf();

$pdf->export($composer);