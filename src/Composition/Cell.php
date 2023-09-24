<?php

namespace PackageSuitePdf\Composition;

use PackageSuitePdf\Object\TextObject;

class Cell
{
    protected TextObject $textObject;

    public function __construct(
        TextObject $textObject
    ) {
        $this->textObject = $textObject;
    }

    /**
     * @return TextObject
     */
    public function getTextObject(): TextObject
    {
        return $this->textObject;
    }
}