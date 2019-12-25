<?php

namespace Duke\CrudGenerator\Concerns;

interface SkipsUnknownSheets
{
    /**
     * @param string|int $sheetName
     */
    public function onUnknownSheet($sheetName);
}
