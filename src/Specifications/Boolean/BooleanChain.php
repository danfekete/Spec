<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */

namespace voov\Spec\Specifications\Boolean;


use voov\Spec\Contracts\CodeGenerator;
use voov\Spec\Contracts\SpecificationInterface;
use voov\Spec\Specifications\CallableSpec;

abstract class BooleanChain implements CodeGenerator
{

    /**
     * @var \voov\Spec\Contracts\CodeGenerator[]
     */
    protected $rules;

    /**
     * BooleanChain constructor.
     * @param \voov\Spec\Contracts\CodeGenerator[] ...$rules
     */
    public function __construct(CodeGenerator ...$rules)
    {

        $this->rules = $rules;
    }

    /**
     * Add rule
     * @param CodeGenerator $rule
     * @return $this
     */
    public function add(CodeGenerator $rule)
    {
        $this->rules[] = $rule;
        return $this;
    }

    /**
     * Add many rules at once
     * @param array|CodeGenerator[] $rules
     * @return $this
     */
    public function addMany(array $rules)
    {
        array_push($this->rules, $rules);
        return $this;
    }
}