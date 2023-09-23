<?php

namespace Packagesuite;

use Packagesuite\Object\Catalog;
use Packagesuite\Object\Page;
use Packagesuite\Object\Pages;
use Packagesuite\Object\PdfObject;
use Packagesuite\Object\ProcSet;
use Packagesuite\Object\TextObject;

class Pdf
{
    /**
     * @var Object[]
     */
    private array $objects;

    /**
     * @var string
     */
    private string $buffer;

    /**
     * @var array
     */
    private array $referenceTable;

    public function __construct()
    {
        $this->buffer = '';
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
        $this->addToBuffer("%PDF-1.7" . PHP_EOL);

        $objectNumber = 0;

        /**
         * @var int $key
         * @var Object\PdfObject $object
         */
        foreach ($this->objects as $object) {
            $this->newObject($object, $objectNumber);
            $objectNumber++;
        }

        $this->addToBuffer(PHP_EOL);

        $this->makeXreference();

        $this->addToBuffer("%%EOF" . PHP_EOL);

        file_put_contents("teste.pdf", $this->buffer);
    }

    private function makeXreference(): void
    {
        $this->addToBuffer("xref" . PHP_EOL);

        $numberOfObjects = count($this->objects) + 1;

        $this->addToBuffer( "0 {$numberOfObjects}" . PHP_EOL);
        $this->addToBuffer("0000000000 65535 f" . PHP_EOL);

        foreach ($this->objects as $key => $object) {
            $length = $this->referenceTable[$key];
            $bufferLength = str_pad($length, 10, '0', STR_PAD_LEFT);
            $this->addToBuffer(sprintf("%s 00000 n", $bufferLength) . PHP_EOL);
        }

        $this->addToBuffer("trailer" . PHP_EOL);
        $this->addToBuffer("<< /Root 1 0 R  /Size 14 >>" . PHP_EOL);
        $this->addToBuffer("startxref" . PHP_EOL);
        $this->addToBuffer(strlen($this->buffer) . PHP_EOL);
    }

    /**
     * @param string $content
     * @return void
     */
    private function addToBuffer(string $content): void
    {
        $this->buffer .= $content;
    }

    /**
     * @param PdfObject $object
     * @param int $objectNumber
     * @return void
     */
    private function newObject(PdfObject $object, int $objectNumber): void
    {
        $newObjectNumber = $objectNumber + 1;

        $this->addToBuffer("{$newObjectNumber} 0 obj" . PHP_EOL);
        $this->addToBuffer($object->__toString() . PHP_EOL);
        $this->addToBuffer("endobj" . PHP_EOL);


        $this->referenceTable[$objectNumber] = strlen($this->buffer);
    }

    public function addRow(string $text)
    {
        $this->addObject(new TextObject($text));

        return $this;
    }

    public function addLineBreak()
    {
        $this->addObject(new TextObject(""));

        return $this;
    }
}