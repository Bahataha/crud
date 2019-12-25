<?php

namespace Duke\CrudGenerator\Concerns;

use Throwable;

interface SkipsOnError
{
    /**
     * @param Throwable $e
     */
    public function onError(Throwable $e);
}
