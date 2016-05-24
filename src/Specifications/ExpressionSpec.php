<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */

namespace voov\Spec\Specifications;


use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use voov\Spec\Exceptions\NotBooleanExpression;

class ExpressionSpec extends CallableSpec
{
    /**
     * @var ExpressionLanguage
     */
    protected $parser;

    /**
     * @var \Symfony\Component\ExpressionLanguage\ParsedExpression
     */
    protected $expression;

    /**
     * @var string
     */
    protected $expressionString;

    /**
     * ExpressionSpec constructor.
     * @param $expression string
     */
    public function __construct($expression)
    {
        $this->parser = new ExpressionLanguage();
        $this->expression = $this->parser->parse($expression, []);
        $this->expressionString = $expression;
    }


    /**
     * Returns true if object satisfies the specification
     * @param $spec
     * @return bool
     * @throws NotBooleanExpression
     */
    public function isSatisfiedBy($spec)
    {
        $ret = $this->parser->evaluate($this->expression, $spec);
        if(!is_bool($ret)) throw new NotBooleanExpression("{$this->expressionString} must be boolean expression!");

        return $ret;
    }
}