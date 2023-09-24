<?php

namespace PackageSuitePdf\Dimensions;

interface CalculateAxisInterface
{
    /**
     * @param $valueAxis
     * @return int|float
     */
    public static function calculateAxis($valueAxis) : int|float;
}