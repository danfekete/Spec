<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */

namespace danfekete\Spec\Specifications\Boolean;

use danfekete\Spec\Contracts\CodeGenerator;
use danfekete\Spec\Specifications\CallableSpec;

class NotSpec implements CodeGenerator
{
    /**
     * @var CodeGenerator
     */
    protected $generator;

    /**
     * NotSpec constructor.
     * @param CodeGenerator $generator
     */
    public function __construct(CodeGenerator $generator)
    {
        $this->generator = $generator;
    }


    /**
     * Generate the expression language code
     * @return string
     */
    public function generate()
    {
        return sprintf('(!%s)', $this->generator->generate());
    }
}