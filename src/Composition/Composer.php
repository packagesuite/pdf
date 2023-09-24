<?php

namespace PackageSuitePdf\Composition;

class Composer
{
    /**
     * @var Cell[]
     */
    protected array $cells = [];

    /**
     *
     */
    public function __construct()
    {
    }


    /**
     * @return $this
     */
    public function cell(Cell $cell) : Composer
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