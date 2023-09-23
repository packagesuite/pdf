<?php

namespace Packagesuite\Object;

class Catalog extends PdfObject
{
    /**
     * @var Type
     */
    protected Type $type = Type::CATALOG;

    /**
     * @return PdfObject
     */
    protected function build(): PdfObject
    {
        $this->object = "<< /Type {$this->getType()} /Pages 2 0 R >>";

        return $this;
    }
}