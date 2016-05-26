<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */

namespace voov\Spec\Specifications\Boolean;

use voov\Spec\Contracts\CodeGenerator;
use voov\Spec\Specifications\CallableSpec;

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