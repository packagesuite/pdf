<?php

namespace PackageSuitePdf\Composition\Cell;

use PackageSuitePdf\Composition\CompositionBuildInterface;
use PackageSuitePdf\Exceptions\Axis\AxisLimitExecption;
use PackageSuitePdf\Object\PositionTextObject;
use PackageSuitePdf\Object\TextObject;

class Cell implements CompositionBuildInterface
{
    /**
     * @var string
     */
    protected string $text;

    /**
     * @var TextObject
     */
    protected TextObject $textObject;

    /**
     * @var CellStyle|null
     */
    protected ?CellStyle $cellStyle;

    /**
     * @throws AxisLimitExecption
     */
    public function __construct(
        string $text,
        int|float $axisX,
        int|float $axisY
    ) {
        $this->positionTextObject = new PositionTextObject($axisX, $axisY);
        $this->text = $text;
        $this->cellStyle = null;
    }

    /**
     * @return Cell
     */
    public function build() : Cell
    {
        $this->textObject = new TextObject(
            $this->text,
            $this->positionTextObject,
            $this->cellStyle
        );

        return $this;
    }

    /**
     * @param CellStyle $cellStyle
     * @return Cell
     */
    public function setStyle(CellStyle $cellStyle): Cell
    {
        $this->cellStyle = $cellStyle;

        return $this;
    }

    /**
     * @return TextObject
     */
    public function get(): TextObject
    {
        return $this->build()->textObject;
    }
}