<?php

namespace PackageSuitePdf\Composition\Cell;

use PackageSuitePdf\Composition\Color\ColorRGB;

class CellStyle
{
    /**
     * @var ColorRGB|null
     */
    protected ?ColorRGB $color = null;

    /**
     * @var Border|null
     */
    protected ?Border $border = null;

    /**
     * @param float $red
     * @param float $green
     * @param float $blue
     * @return CellStyle
     */
    public function setColor(float $red = 255.00, float $green = 255.00, float $blue = 255.00) : CellStyle
    {
        $this->color = new ColorRGB($red, $green, $blue);

        return $this;
    }

    /**
     * @param float $axisX
     * @param float $axisY
     * @param float $width
     * @param float $height
     * @return CellStyle
     */
    public function setBorder(float $axisX = 0, float $axisY = 0, float $width = 0, float $height = 0) : CellStyle
    {
        $this->border = new Border($axisX, $axisY, $width, $height);

        return $this;
    }

    /**
     * @return Border|null
     */
    public function border(): ?Border
    {
        return $this->border;
    }

    /**
     * @return ColorRGB|null
     */
    public function color(): ?ColorRGB
    {
        return $this->color;
    }
}