<?php

namespace Packagesuite\Object;

class TextObject extends PdfObject
{
    /**
     * @var string
     */
    private string $text;

    /**
     * @var int
     */
    private int $fontSize = 10;

    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;

        parent::__construct();
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

        $positionTextObject = new PositionTextObject(170, 450, 1,0, 0,1);

        $content = "BT\n{$positionTextObject->__toString()}\n /Font1 {$this->fontSize} Tf\n ({$this->text}) Tj\nET";

//        $content = gzcompress($content);

        $length = strlen($content);

        $this->object = "<< /Length {$length} >>\nstream\n{$content}\nendstream";

        return $this;
    }
}