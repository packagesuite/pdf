<?php

namespace PackageSuitePdf\Object;

/**
 * TODO What is this? I dont know, but for while this need to be like that to work
 */
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
        return $this->add("<< /Type {$this->getType()} /Pages 2 0 R >>");
    }
}