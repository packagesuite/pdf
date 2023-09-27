<?php

namespace PackageSuitePdf\Composition\Color;

class ColorRGB
{
    /**
     * @var float
     */
    protected float $red;

    /**
     * @var float
     */
    protected float $green;

    /**
     * @var float
     */
    protected float $blue;

    /**
     * @param float $red
     * @param float $green
     * @param float $blue
     */
    public function __construct(float $red = 255.00, float $green = 255.00, float $blue = 255.00)
    {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }

    /**
     * @param float $red
     * @param float $green
     * @param float $blue
     * @return ColorRGB
     */
    public function set(float $red, float $green, float $blue): ColorRGB
    {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;

        return $this;
    }

    /**
     * @return float
     */
    public function getRed(): float
    {
        return number_format($this->red, 2);
    }

    /**
     * @return float
     */
    public function getGreen(): float
    {
        return $this->green;
    }

    /**
     * @return float
     */
    public function getBlue(): float
    {
        return $this->blue;
    }
}