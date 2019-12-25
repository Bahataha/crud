<?php

namespace Duke\CrudGenerator\Concerns;

interface WithLimit
{
    /**
     * @return int
     */
    public function limit(): int;
}
