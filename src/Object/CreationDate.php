<?php

namespace PackageSuitePdf\Object;

use DateTimeImmutable;

class CreationDate extends PdfObject
{

    protected function build(): PdfObject
    {
        $date = (new DateTimeImmutable())->format('YdmHis0');

        $this->buffer = "<< /Producer (PackageSuite 0.0.1) /CreationDate (D:{$date}+00'00') >>";

        return $this;
    }
}