<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */

namespace danfekete\Spec;


use danfekete\Spec\Contracts\BuilderInterface;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use danfekete\Spec\Contracts\CodeGenerator;
use danfekete\Spec\Contracts\SpecificationInterface;
use danfekete\Spec\Exceptions\NotBooleanExpression;

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
     * Creates a new spec from builder
     * @param BuilderInterface $builder
     * @return static
     */
    public static function fromBuilder(BuilderInterface $builder)
    {
        $o = new static($builder->build());
        return $o;
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
