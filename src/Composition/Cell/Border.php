<?php

namespace PackageSuitePdf\Composition\Cell;

class Border
{
    /**
     * @var float
     */
    private float $axisX;
    /**
     * @var float
     */
    private float $axisY;
    /**
     * @var float
     */
    private float $width;
    /**
     * @var float
     */
    private float $height;

    /**
     * @param float $axisX
     * @param float $axisY
     * @param float $width
     * @param float $height
     */
    public function __construct(float $axisX = 0, float $axisY = 0, float $width = 0, float $height = 0)
    {
        $this->axisX = $axisX;
        $this->axisY = $axisY;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @return float
     */
    public function getAxisX(): float
    {
        return $this->axisX;
    }

    /**
     * @return float
     */
    public function getAxisY(): float
    {
        return $this->axisY;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }
}