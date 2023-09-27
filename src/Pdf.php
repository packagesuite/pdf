<?php

namespace PackageSuitePdf;

use PackageSuitePdf\Composition\Cell;
use PackageSuitePdf\Composition\Composer;
use PackageSuitePdf\Object\Catalog;
use PackageSuitePdf\Object\Page;
use PackageSuitePdf\Object\Pages;
use PackageSuitePdf\Object\PdfObject;
use PackageSuitePdf\Object\ProcSet;
use PackageSuitePdf\Object\TextObjectPool;

class Pdf
{
    /**
     * @var PdfObject[]
     */
    private array $objects;

    /**
     * @var string
     */
    private string $buffer;

    /**
     * @var Composer
     */
    protected Composer $composer;

    /**
     * @var Catalog
     */
    protected Catalog $catalog;

    /**
     * @var array
     */
    private array $referenceTable;

    public function __construct()
    {
        $this->buffer = '';
        $this->objects = [];
        $this->composer = new Composer();
    }

    /**
     * @param PdfObject $object
     * @return void
     */
    private function registryObject(PdfObject $object): void
    {
        $count = count($this->objects) + 1;
        $object->setObjectNumber($count);

        $this->objects[] = $object;
    }

    private function makeXreference(): void
    {
        $this->buffer("xref" . PHP_EOL);

        $numberOfObjects = count($this->objects) + 1;

        $this->buffer( "0 {$numberOfObjects}" . PHP_EOL)
            ->buffer("0000000000 65535 f" . PHP_EOL);

        foreach ($this->objects as $key => $object) {
            $length = $this->referenceTable[$key];
            $bufferLength = str_pad($length, 10, '0', STR_PAD_LEFT);
            $this->buffer(sprintf("%s 00000 n", $bufferLength) . PHP_EOL);
        }

        $this->buffer("trailer" . PHP_EOL)
            ->buffer("<< /Root {$this->catalog->getObjectNumber()} 0 R  /Size 14 >>" . PHP_EOL)
            ->buffer("startxref" . PHP_EOL)
            ->buffer(strlen($this->buffer) . PHP_EOL);
    }

    /**
     * @param string $content
     * @return Pdf
     */
    private function buffer(string $content): Pdf
    {
        $this->buffer .= $content;

        return $this;
    }

    /**
     * @param PdfObject $object
     * @return void
     */
    private function newObject(PdfObject $object): void
    {
        $objectNumber = $object->getObjectNumber();
        $object = sprintf($object->toPdfObject(), $objectNumber);

        $this->buffer($object);

        $this->referenceTable[($objectNumber - 1)] = strlen($this->buffer);
    }

    /**
     * @return Composer
     */
    public function getComposer(): Composer
    {
        return $this->composer;
    }

    public function export(Composer $composer): void
    {
        $this->buffer("%PDF-1.7" . PHP_EOL);

        $procSet = new ProcSet();
        $this->registryObject($procSet);

        $pages = new Pages();
        $this->registryObject($pages);

        $catalog = new Catalog();
        $catalog->setPagesObjectReference(($pages->getObjectNumber()));
        $this->registryObject($catalog);
        $this->catalog = $catalog;

        foreach ($composer->pages() as $page) {
            $textObjects = array_map(fn (Cell $cell) => $cell->get(), $page->cells());
            $textObjectPool = new TextObjectPool($textObjects);

            $this->registryObject($textObjectPool);

            $page = new Page();
            $page->setParent($pages->getObjectNumber());
            $page->setContentsObject($textObjectPool->getObjectNumber());
            $page->setResoucesObject($procSet->getObjectNumber());

            $this->registryObject($page);

            $pages->addKid($page->getObjectNumber());
        }

        foreach ($this->objects as $object) {
            $this->newObject($object);
        }

        $this->makeXreference();

        $this->buffer("%%EOF" . PHP_EOL);

        file_put_contents("teste_compose.pdf", $this->buffer);
    }
}