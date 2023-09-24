<?php

namespace PackageSuitePdf\Composition;

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
     * @throws AxisLimitExecption
     */
    public function __construct(
        string $text,
        int|float $axisX,
        int|float $axisY
    ) {
        $this->positionTextObject = new PositionTextObject($axisX, $axisY);
        $this->text = $text;
    }

    /**
     * @return Cell
     */
    public function build() : Cell
    {
        $this->textObject = new TextObject($this->text, $this->positionTextObject);

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