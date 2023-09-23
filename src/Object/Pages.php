<?php

namespace Packagesuite\Object;

class Pages extends PdfObject
{
    /**
     * @var Type
     */
    protected Type $type = Type::PAGES;

    /**
     * @return PdfObject
     */
    protected function build(): PdfObject
    {
        $this->object = "<< /Type {$this->getType()} /Kids [ 3 0 R ] /Count 1 >>";

        return $this;
    }
}