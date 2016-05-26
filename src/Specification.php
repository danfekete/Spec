<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */

namespace voov\Spec;


use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use voov\Spec\Contracts\CodeGenerator;
use voov\Spec\Contracts\SpecificationInterface;
use voov\Spec\Exceptions\NotBooleanExpression;
use voov\Spec\Specifications\CallableSpec;

class Specification implements SpecificationInterface
{
    /**
     * @var CodeGenerator
     */
    private $generator;

    /**
     * Specification constructor.
     * @param CodeGenerator $generator
     */
    public function __construct(CodeGenerator $generator)
    {
        $this->generator = $generator;
    }


    /**
     * Returns true if object satisfies the specification
     * @param $spec
     * @return boolean
     */
    public function isSatisfiedBy($spec)
    {
        $lang = new ExpressionLanguage(); // TODO: add caching
        $ret = $lang->evaluate($this->generator->generate(), $spec);
        if (!is_bool($ret)) throw new NotBooleanExpression;

        return $ret;
    }
}