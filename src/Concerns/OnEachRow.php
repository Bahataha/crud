<?php

namespace Duke\CrudGenerator\Concerns;

use Duke\CrudGenerator\Row;

interface OnEachRow
{
    /**
     * @param Row $row
     */
    public function onRow(Row $row);
}
