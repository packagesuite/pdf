<?php

namespace Packagesuite\Object;

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
        $this->object = "<< {$this->getType()} 10 >>";

        return $this;
    }
}