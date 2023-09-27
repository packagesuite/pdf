<?php

namespace PackageSuitePdf\Composition;

use PackageSuitePdf\Composition\Page\Page;
use PackageSuitePdf\Composition\Page\PageSizeException;

class Composer
{
    /**
     * @var array
     */
    protected array $pages = [];

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @param string $orientation
     * @param string $size
     * @param string $rotation
     * @return Page
     * @throws PageSizeException
     */
    public function page(string $orientation = 'P', string $size = 'A4', string $rotation = ''): Page
    {
        $page = new Page($orientation, $size, $rotation);

        $this->pages[] = $page;

        return $page;
    }

    /**
     * @return Page[]
     */
    public function pages(): array
    {
        return $this->pages;
    }
}