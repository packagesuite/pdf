<?php

namespace PackageSuitePdf\Object;

class TextObject extends PdfObject
{
    /**
     * @var string
     */
    private string $text;

    /**
     * @var PositionTextObject
     */
    private PositionTextObject $positionTextObject;

    /**
     * @var int
     */
    private int $fontSize = 10;

    /**
     * @param string $text
     * @param PositionTextObject $positionTextObject
     */
    public function __construct(string $text, PositionTextObject $positionTextObject)
    {
        $this->text = $text;
        $this->positionTextObject = $positionTextObject;
    }

    /**
     * @param int $fontSize
     * @return $this
     */
    public function setFontSize(int $fontSize): TextObject
    {
        $this->fontSize = $fontSize;

        return $this;
    }

    /**
     * @return PdfObject
     */
    protected function build(): PdfObject
    {
        $position = $this->positionTextObject->build()->__toString();

        $content = "BT\n{$position}\n /Font1 {$this->fontSize} Tf\n ({$this->text}) Tj\nET";

//        $content = gzcompress($content);
        return $this->add($content);
    }
}