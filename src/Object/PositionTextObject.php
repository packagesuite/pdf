<?php

namespace Packagesuite\Object;

class PositionTextObject extends PdfObject
{
    protected float $marginLeft = 0;
    protected float $marginRigth = 0;
    protected float $marginTop = 0;
    protected float $marginBottom = 0;
    protected float $x = 0;
    protected float $y = 0;

    public function __construct(
        $x,
        $y,
        $marginLeft,
        $marginTop,
        $marginRigth,
        $marginBottom,
    ) {
        $this->y = $y;
        $this->x = $x;
        $this->marginLeft = $marginLeft;
        $this->marginTop = $marginTop;
        $this->marginRigth = $marginRigth;
        $this->marginBottom = $marginBottom;

        parent::__construct();
    }

    protected function build(): PdfObject
    {
        $this->object = " {$this->marginLeft} {$this->marginTop} {$this->marginRigth} {$this->marginBottom} {$this->x} $this->y Tm";

        return $this;
    }
}