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
     * @var int
     */
    protected int $parent;

    /**
     * @var int
     */
    protected int $resoucesObject;

    /**
     * @var int
     */
    protected int $contentsObject;

    /**
     * This object describe the page PDF
     * /Parent: The object that reference to here
     * /MediaBox: This defines the page dimensions
     * /Resources: This describe the object tha have all resources definitions
     * /Contents: This references the object that have the conten of PDF
     *
     * @return PdfObject
     */
    protected function build(): PdfObject
    {
        $page = sprintf(
            '<< /Type %s /Parent %s 0 R /MediaBox %s /Resources %s 0 R /Contents %s 0 R >>',
            $this->getType(),
            $this->getParent(),
            $this->getMediaBox(),
            $this->getResourcesObject(),
            $this->getContentsObject(),
        );

        return $this->add($page);
//        return $this->add("<< /Type {$this->getType()} /Parent {$this->getParent()} 0 R /MediaBox {$this->getMediaBox()} /Resources {$this->getResourcesObject()} 0 R /Contents {$this->getContentsObject()} 0 R >>");
    }

    public function getParent(): int
    {
        return $this->parent;
    }


    public function setParent(int $parent): void
    {
        $this->parent = $parent;
    }

    /**
     * @return int
     */
    private function getResourcesObject(): int
    {
        return $this->resoucesObject;
    }

    /**
     * @param int $resoucesObject
     * @return void
     */
    public function setResoucesObject(int $resoucesObject): void
    {
        $this->resoucesObject = $resoucesObject;
    }

    /**
     * @return int
     */
    private function getContentsObject(): int
    {
        return $this->contentsObject;
    }

    /**
     * @param int $contentsObject
     * @return void
     */
    public function setContentsObject(int $contentsObject): void
    {
        $this->contentsObject = $contentsObject;
    }

    private function getMediaBox(): string
    {
        return "[ 0 0 595 842 ]";
    }
}