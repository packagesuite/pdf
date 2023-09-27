<?php

namespace PackageSuitePdf\Composition\Page;

enum EnumPageSize: string
{
    case A3 = 'A3';
    case A4 = 'A4';
    case A5 = 'A5';

    /**
     * @param string $type
     * @return float[]
     * @throws PageSizeException
     */
    public static function getArraySize(string $type = 'A4'): array
    {
        return match (self::getSize($type)) {
            EnumPageSize::A3 => [
                'x' => 841.89,
                'y' => 1190.55
            ],
            EnumPageSize::A4 => [
                'x' => 595.28,
                'y' => 841.89
            ],
            EnumPageSize::A5 => [
                'x' => 420.94,
                'y' => 595.28
            ]
        };
    }

    /**
     * @throws PageSizeException
     */
    public static function getSize(string $type = 'A4'): EnumPageSize
    {
        $type = strtoupper($type);

        return match ($type) {
            'A3' => EnumPageSize::A3,
            'A4' => EnumPageSize::A4,
            'A5' => EnumPageSize::A5,
            default => throw new PageSizeException('The size is not valid!')
        };
    }
}
