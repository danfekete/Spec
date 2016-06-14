<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */

namespace danfekete\Spec\Specifications\Boolean;


use danfekete\Spec\Contracts\CodeGenerator;
use danfekete\Spec\Contracts\SpecificationInterface;
use danfekete\Spec\Specifications\CallableSpec;

abstract class BooleanChain implements CodeGenerator
{

    /**
     * @var \danfekete\Spec\Contracts\CodeGenerator[]
     */
    protected $rules;

    /**
     * BooleanChain constructor.
     * @param \danfekete\Spec\Contracts\CodeGenerator[] ...$rules
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
    public function addMany($rules)
    {
        if(!is_array($rules)) $rules = (array)$rules;
        $this->rules += $rules;
        return $this;
    }
}