<?php

namespace PackageSuitePdf\Object;

class TextObjectPool extends PdfObject
{
    /**
     * @var TextObject[]
     */
    protected array $textObjects = [];

    /**
     * @return PdfObject
     */
    protected function build(): PdfObject
    {
        $content = "";

        foreach ($this->textObjects as $textObject) {
            $content .= $textObject->build()->__toString() . PHP_EOL;
        }

        $length = strlen($content);

        return $this->add("<< /Length {$length} >>\nstream\n{$content}\nendstream");
    }

    /**
     * @param TextObject $textObject
     * @return TextObjectPool
     */
    public function addText(TextObject $textObject) : TextObjectPool
    {
        $this->textObjects[] = $textObject;

        return $this;
    }
}