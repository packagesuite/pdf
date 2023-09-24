<?php

namespace PackageSuitePdf\Dimensions;

use PackageSuitePdf\Exceptions\Axis\AxisLimitExecption;

class AxisY implements CalculateAxisInterface
{

    /**
     * @var float|int
     */
    private static float|int $minY = 5;

    /**
     * @var float|int
     */
    private static float|int $maxY = 830;

    /**
     * @throws AxisLimitExecption
     */
    public static function calculateAxis($valueAxis): int|float
    {
        $finalAxis = (self::$maxY - $valueAxis);

        if ($finalAxis < self::$minY) {
            throw new AxisLimitExecption(
                "The axis Y, ultrapassed the minimum limit! The content may not apperar on PDF!"
            );
        }

        if ($finalAxis > self::$maxY) {
            throw new AxisLimitExecption(
                "The axis Y, ultrapassed the maximum limit! The content may not apperar on PDF!"
            );
        }

        return $finalAxis;
    }
}