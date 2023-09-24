<?php

namespace PackageSuitePdf\Object;

/**
 * TODO What is this? I dont know, but for while this need to be like that to work
 */
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
        return $this->add("<< /Type {$this->getType()} /Parent 2 0 R /MediaBox [ 0 0 595 842 ] /Resources 4 0 R /Contents 5 0 R >>");
    }
}