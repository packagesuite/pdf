<?php

namespace Packagesuite\Object;

abstract class PdfObject
{
    /**
     * @var Type
     */
    protected Type $type;

    /**
     * @var string
     */
    protected string $object;

    public function __construct()
    {
        return $this->build();
    }

    /**
     * @return PdfObject
     */
    abstract protected function build() : PdfObject;

    /**
     * @return string
     */
    protected function getType(): string
    {
        $type = $this->type->label($this->type);

        return "/{$type}";
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->object;
    }
}