<?php

namespace PackageSuitePdf\Composition;

use PackageSuitePdf\Object\PdfObject;

interface CompositionBuildInterface
{
    /**
     * @return CompositionBuildInterface
     */
    public function build() : CompositionBuildInterface;

    /**
     * @return PdfObject
     */
    public function get() : PdfObject;
}