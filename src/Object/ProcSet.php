<?php

namespace Packagesuite\Object;

class ProcSet extends PdfObject
{
    /**
     * @var Type
     */
    protected Type $type = Type::PROCSET;

    /**
     * @return PdfObject
     */
    protected function build(): PdfObject
    {
        $this->object = "<< {$this->getType()}[ /PDF /Text ] /Font <</Font1 << /Type /Font /Subtype /TrueType /BaseFont /Helvetica >> >> >>";

        return $this;
    }
}