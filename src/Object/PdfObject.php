<?php

namespace PackageSuitePdf\Object;

abstract class PdfObject
{
    /**
     * @var Type
     */
    protected Type $type;

    /**
     * @var string
     */
    protected string $buffer = '';

    /**
     * @var bool
     */
    protected bool $compress = true;

    /**
     * @return PdfObject
     */
    abstract protected function build(): PdfObject;

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
        return $this->buffer;
    }

    /**
     * @param string $content
     * @return $this
     */
    protected function add(string $content): PdfObject
    {
        $this->buffer .= $content . PHP_EOL;

        return $this;
    }

    /**
     * @return $this
     */
    public function toPdfObject(): string
    {
        $this->buffer = '';
        $this->build();

        $object = "%s 0 obj" . PHP_EOL;
        $object .= $this->__toString();
        $object .= "endobj" . PHP_EOL;

        return $object;
    }

    /**
     * @return bool
     */
    protected function isCompressable(): bool
    {
        if ($this instanceof CompressableInterface && $this->compress) {
            return true;
        }

        return false;
    }

    /**
     * @param string $content
     * @return string
     */
    public function compress(string $content): string
    {
        if ($this->isCompressable()) {
            $content = gzcompress($content);
        }

        return $content;
    }
}