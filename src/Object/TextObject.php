<?php

namespace PackageSuitePdf\Object;

use PackageSuitePdf\Composition\Cell\CellStyle;

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
     * @var CellStyle|null
     */
    private ?CellStyle $cellStyle;

    /**
     * @var int
     */
    private int $fontSize = 10;

    /**
     * @param string $text
     * @param PositionTextObject $positionTextObject
     * @param CellStyle|null $cellStyle
     */
    public function __construct(
        string $text,
        PositionTextObject $positionTextObject,
        CellStyle $cellStyle = null
    ) {
        $this->text = $text;
        $this->positionTextObject = $positionTextObject;
        $this->cellStyle = $cellStyle;
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
     * @param CellStyle $cellStyle
     * @return TextObject
     */
    public function setCellStyle(CellStyle $cellStyle): TextObject
    {
        $this->cellStyle = $cellStyle;

        return $this;
    }

    /**
     * @return PdfObject
     */
    protected function build(): PdfObject
    {
        $position = $this->positionTextObject->build()->__toString();

        $style = "";
        $color = false;
        $border = false;

        if ($this->cellStyle instanceof CellStyle) {
            if ($border = $this->cellStyle->border()) {
                $style .= sprintf(
                    "%.2f %.2f %.2f %01.2f re ",
                    $border->getAxisX(),
                    $border->getAxisY(),
                    $border->getWidth(),
                    $border->getHeight(),
                );
            }

            if ($color = $this->cellStyle->color()) {
                $style .= sprintf(
                    "q %01.2f %01.2f %01.2f rg ",
                    $color->getRed(),
                    $color->getGreen(),
                    $color->getBlue(),
                );
            }
        }

        $content = $style;
        $content .= "BT {$position} /Font1 {$this->fontSize} Tf ({$this->text}) Tj ET";

        if ($color) {
            $content .= " Q";
        }

        var_dump($content);

        return $this->add($content);
    }
}