<?php

namespace Duke\CrudGenerator\Concerns;

interface WithValidation
{
    /**
     * @return array
     */
    public function rules(): array;
}
