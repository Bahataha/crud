<?php

namespace Duke\CrudGenerator\Concerns;

interface WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int;
}
