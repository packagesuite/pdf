<?php

namespace PackageSuitePdf\Object;

enum Type
{
    case CATALOG;
    case PAGES;
    case PAGE;
    case PROCSET;
    case LENGTH;
    case TEXT;

    /**
     * @param Type $type
     * @return string
     */
    public function label(Type $type): string
    {
        return match ($type) {
            Type::CATALOG => 'Catalog',
            Type::PAGES => 'Pages',
            Type::PAGE => 'Page',
            Type::PROCSET => 'ProcSet',
            Type::LENGTH => 'Length',
            Type::TEXT => 'BT',
        };
    }
}