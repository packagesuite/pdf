<?php

namespace PackageSuitePdf\Object;

class Lenght extends PdfObject
{
    /**
     * @var Type
     */
    protected Type $type = Type::LENGTH;

    /**
     * @return PdfObject
     */
    protected function build(): PdfObject
    {
        return $this->add("<< {$this->getType()} 10 >>");
    }
}