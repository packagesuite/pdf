<?php

namespace PackageSuitePdf\Object;

use PackageSuitePdf\Dimensions\AxisX;
use PackageSuitePdf\Dimensions\AxisY;
use PackageSuitePdf\Exceptions\Axis\AxisLimitExecption;

class PositionTextObject extends PdfObject
{
    //-- Margin left está esticando o texto
    protected float $marginLeft = 0;

    //-- Margin Right está inclinando o texto
    protected float $marginRigth = 0;

    //-- Margin top está rotacionando o texto
    protected float $marginTop = 0;

    //-- Margin Bottom está achatando o texto nele mesmo
    protected float $marginBottom = 0;

    protected float $x = 0;

    protected float $y = 0;

    /**
     * @throws AxisLimitExecption
     */
    public function __construct(
        $x,
        $y,
        $marginLeft = 1,
        $marginTop = 0,
        $marginRigth = 0,
        $marginBottom = 1,
    ) {
        $this->y = AxisY::calculateAxis($y);
        $this->x = AxisX::calculateAxis($x);
        $this->marginLeft = $marginLeft;
        $this->marginTop = $marginTop;
        $this->marginRigth = $marginRigth;
        $this->marginBottom = $marginBottom;
    }

    protected function build(): PdfObject
    {
        return $this->add(" {$this->marginLeft} {$this->marginTop} {$this->marginRigth} {$this->marginBottom} {$this->x} {$this->y} Tm");
    }

    public function setMarginLeft(float $marginLeft): void
    {
        $this->marginLeft = $marginLeft;
    }

    public function setMarginRigth(float $marginRigth): void
    {
        $this->marginRigth = $marginRigth;
    }

    public function setMarginTop(float $marginTop): void
    {
        $this->marginTop = $marginTop;
    }

    public function setMarginBottom(float $marginBottom): void
    {
        $this->marginBottom = $marginBottom;
    }

    public function setX(float $x): void
    {
        $this->x = $x;
    }

    public function setY(float $y): void
    {
        $this->y = $y;
    }
}