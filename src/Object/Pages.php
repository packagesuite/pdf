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
     * @var array
     */
    protected array $kids;

    /**
     * @return PdfObject
     *
     * The array followin the /Kids describe the objects taht describe each page on PDF:
     *
     *   [1 0 R]
     *   [3 0 R]
     *
     * /Count describe how many pages the PDF has
     */
    protected function build(): PdfObject
    {
        $kidsCount = count($this->kids);

        return $this->add("<< /Type {$this->getType()} /Kids {$this->buildKids()} /Count {$kidsCount} >>");
    }

    /**
     * @param $kidOrder
     * @return Pages
     */
    public function addKid($kidOrder): Pages
    {
        $this->kids[] = $kidOrder;

        return $this;
    }

    /**
     * @return string
     */
    private function buildKids(): string
    {
        $kids = "";

        foreach ($this->kids as $kid) {
            $kids .=  "$kid 0 R ";
        }

        return "[ " . $kids . "] ";
    }
}