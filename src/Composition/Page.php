<?php

namespace PackageSuitePdf\Composition;

class Page
{
    /**
     * @var Cell[]
     */
    protected array $cells = [];

    /**
     * @var array
     */
    protected array $size;

    /**
     * @throws PageSizeException
     */
    public function __construct(
        $orientation = 'P',
        $size = 'A4',
        $rotation = '',

    ) {
        $this->size = EnumPageSize::getArraySize($size);
    }

    /**
     * @return $this
     */
    public function cell(Cell $cell) : Page
    {
        $this->cells[] = $cell;

        return $this;
    }

    /**
     * @return Cell[]
     */
    public function cells(): array
    {
        return $this->cells;
    }
}