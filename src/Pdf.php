<?php

namespace PackageSuitePdf;

use PackageSuitePdf\Composition\Cell;
use PackageSuitePdf\Composition\Composer;
use PackageSuitePdf\Object\Catalog;
use PackageSuitePdf\Object\Page;
use PackageSuitePdf\Object\Pages;
use PackageSuitePdf\Object\PdfObject;
use PackageSuitePdf\Object\PositionTextObject;
use PackageSuitePdf\Object\ProcSet;
use PackageSuitePdf\Object\TextObject;
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
     * @var array
     */
    private array $referenceTable;

    public function __construct()
    {
        $this->buffer = '';
        $this->composer = new Composer();

        $this->addObject(new Catalog());
        $this->addObject(new Pages());
        $this->addObject(new Page());
        $this->addObject(new ProcSet());
    }

    /**
     * @param PdfObject $object
     * @return Pdf
     */
    private function addObject(PdfObject $object): static
    {
        $this->objects[] = $object;

        return $this;
    }

    /**
     * @return void
     */
    public function buildPdf(): void
    {
        $this->buffer("%PDF-1.7" . PHP_EOL);

        $objectNumber = 0;

        /**
         * @var int $key
         * @var Object\PdfObject $object
         */
        foreach ($this->objects as $object) {
            $this->newObject($object, $objectNumber);
            $objectNumber++;
        }

        $this->makeXreference();

        $this->buffer("%%EOF" . PHP_EOL);

        file_put_contents("teste.pdf", $this->buffer);
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
            ->buffer("<< /Root 1 0 R  /Size 14 >>" . PHP_EOL)
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
     * @param int $objectNumber
     * @return void
     */
    private function newObject(PdfObject $object, int $objectNumber): void
    {
        $object = sprintf($object->toPdfObject(), $objectNumber + 1);

        $this->buffer($object);

        $this->referenceTable[$objectNumber] = strlen($this->buffer);
    }

    public function addRow(string $text, PositionTextObject $positionTextObject)
    {
        $this->addObject(new TextObject($text, $positionTextObject));

        return $this;
    }

    public function addLineBreak(PositionTextObject $positionTextObject)
    {
        $this->addObject(new TextObject("", $positionTextObject));

        return $this;
    }

    /**
     * @return Composer
     */
    public function getComposer(): Composer
    {
        return $this->composer;
    }

    public function export(Composer $composer)
    {
        $this->buffer("%PDF-1.7" . PHP_EOL);

        $objectNumber = 0;

        /**
         * @var int $key
         * @var Object\PdfObject $object
         */
        foreach ($this->objects as $object) {
            $this->newObject($object, $objectNumber);
            $objectNumber++;
        }

        $textObjectPool = new TextObjectPool();
        /** @var Cell $cell */
        foreach ($composer->cells() as $cell) {
            $textObjectPool->addText($cell->getTextObject());
        }

        $this->newObject($textObjectPool, $objectNumber);

        $this->makeXreference();

        $this->buffer("%%EOF" . PHP_EOL);

        file_put_contents("teste_compose.pdf", $this->buffer);

    }
}