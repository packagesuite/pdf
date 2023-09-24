<?php

namespace PackageSuitePdf\Object;

class TextObjectPool extends PdfObject implements CompressableInterface
{
    /**
     * @var TextObject[]
     */
    protected array $textObjects = [];

    /**
     * @param array $textObjects
     */
    public function __construct(array $textObjects = [])
    {
        $this->textObjects = $textObjects;
    }

    /**
     * @return PdfObject
     */
    protected function build(): PdfObject
    {
        $content = "";
        $headerCompression = "";

        foreach ($this->textObjects as $textObject) {
            $content .= $textObject->build()->__toString() . PHP_EOL;
        }

        if ($this->isCompressable()) {
            $content = $this->compress($content);
            $headerCompression = "/Filter /FlateDecode";
        }

        $length = strlen($content);

        return $this->add("<< {$headerCompression} /Length {$length} $headerCompression >>\nstream\n{$content}\nendstream");
    }
}