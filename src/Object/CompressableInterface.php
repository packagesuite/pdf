<?php

namespace PackageSuitePdf\Object;

interface CompressableInterface
{
    /**
     * @param string $content
     * @return string
     */
    public function compress(string $content) : string;
}