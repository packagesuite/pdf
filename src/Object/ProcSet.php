<?php

namespace PackageSuitePdf\Object;

/**
 * TODO What is this? I dont know, but for while this need to be like that to work
 * Note 1: I know that is here, that we set the font we will use on PDF
 */
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
        return $this->add("<< {$this->getType()}[ /PDF /Text ] /Font <</Font1 << /Type /Font /Subtype /TrueType /BaseFont /Helvetica >> >> >>");
    }
}