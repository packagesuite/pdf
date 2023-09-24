<?php

namespace PackageSuitePdf\Composition;

use PackageSuitePdf\Exceptions\Axis\AxisLimitExecption;
use PackageSuitePdf\Object\PositionTextObject;
use PackageSuitePdf\Object\TextObject;

class Cell
{
    protected TextObject $textObject;

    /**
     * @throws AxisLimitExecption
     */
    public function __construct(
        string $text,
        int|float $axisX,
        int|float $axisY
    ) {
        $this->textObject = new TextObject($text, new PositionTextObject($axisX, $axisY));
    }

    /**
     * @return TextObject
     */
    public function getTextObject(): TextObject
    {
        return $this->textObject;
    }
}