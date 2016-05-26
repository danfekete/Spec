<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */

namespace voov\Spec\Specifications;


use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use voov\Spec\Contracts\CodeGenerator;
use voov\Spec\Exceptions\NotBooleanExpression;

class ExpressionSpec implements CodeGenerator
{

    /**
     * @var string
     */
    protected $expression;

    /**
     * ExpressionSpec constructor.
     * @param $expression
     */
    public function __construct($expression)
    {
        $this->expression = $expression;
    }

    /**
     * Generate the expression language code
     * @return string
     */
    public function generate()
    {
        return $this->expression;
    }
}