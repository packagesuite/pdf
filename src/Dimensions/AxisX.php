<?php

namespace PackageSuitePdf\Dimensions;

use PackageSuitePdf\Exceptions\Axis\AxisLimitExecption;

class AxisX implements CalculateAxisInterface
{
    /**
     * @var float|int
     */
    private static float|int $minX = 5;

    /**
     * @var float|int
     */
    private static float|int $maxX = 555;

    /**
     * @throws AxisLimitExecption
     */
    public static function calculateAxis($valueAxis): float|int
    {
        $finalAxis = (self::$minX + $valueAxis);

        if ($finalAxis < self::$minX) {
            throw new AxisLimitExecption(
                "The axis X, ultrapassed the minimum limit! The content may not apperar on PDF!"
            );
        }

        if ($finalAxis > self::$maxX) {
            throw new AxisLimitExecption(
                "The axis X, ultrapassed the maximum limit! The content may not apperar on PDF!"
            );
        }

        return $finalAxis;
    }
}