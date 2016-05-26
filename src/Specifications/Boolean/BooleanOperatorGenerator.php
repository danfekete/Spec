<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 * daniel.fekete@voov.hu
 */

namespace danfekete\Spec\Specifications\Boolean;


use danfekete\Spec\Contracts\CodeGenerator;

abstract class BooleanOperatorGenerator extends BooleanChain
{

    /**
     * MUST be overridden
     * @var string
     */
    protected $operator;

    /**
     * Generate the expression language code
     * @return string
     */
    public function generate()
    {
        $compiled = array_map(function (CodeGenerator $item) {

            return $item->generate();

        }, $this->rules);

        return sprintf('(%s)', implode($this->operator, $compiled));
    }
}