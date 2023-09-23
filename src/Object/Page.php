<?php

namespace Packagesuite\Object;

class Page extends PdfObject
{
    /**
     * @var Type
     */
    protected Type $type = Type::PAGE;

    /**
     * @return PdfObject
     */
    protected function build(): PdfObject
    {
        $this->object = "<< /Type {$this->getType()} /Parent 2 0 R /MediaBox [ 0 0 595 842 ] /Resources 4 0 R /Contents 5 0 R >>";

        return $this;
    }
}