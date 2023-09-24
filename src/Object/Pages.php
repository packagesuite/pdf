<?php

namespace PackageSuitePdf\Object;

/**
 * TODO What is this? I dont know, but for while this need to be like that to work
 */
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
        return $this->add("<< /Type {$this->getType()} /Kids [ 3 0 R ] /Count 1 >>");
    }
}