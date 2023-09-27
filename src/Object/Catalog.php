<?php

namespace PackageSuitePdf\Object;

/**
 * TODO What is this? I dont know, but for while this need to be like that to work
 *
 * This, is the object that references the other object that says the pdf configuration
 */
class Catalog extends PdfObject
{
    /**
     * @var Type
     */
    protected Type $type = Type::CATALOG;

    /**
     * @var int
     */
    protected int $pagesObjectReference;

    /**
     * @return PdfObject
     */
    protected function build(): PdfObject
    {
        return $this->add("<< /Type {$this->getType()} /Pages {$this->getPagesObjectReference()} 0 R >>");
    }

    /**
     * @param int $pagesObjectReference
     * @return void
     */
    public function setPagesObjectReference(int $pagesObjectReference): void
    {
        $this->pagesObjectReference = $pagesObjectReference;
    }

    /**
     * @return int
     */
    private function getPagesObjectReference(): int
    {
        return $this->pagesObjectReference;
    }
}