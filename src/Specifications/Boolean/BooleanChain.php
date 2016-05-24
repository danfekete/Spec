<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */

namespace voov\Spec\Specifications\Boolean;


use voov\Spec\Contracts\SpecificationInterface;
use voov\Spec\Specifications\CallableSpec;

abstract class BooleanChain extends CallableSpec
{

    /**
     * @var \voov\Spec\Contracts\SpecificationInterface[]
     */
    protected $rules;

    /**
     * BooleanChain constructor.
     * @param \voov\Spec\Contracts\SpecificationInterface[] ...$rules
     */
    public function __construct(SpecificationInterface ...$rules)
    {

        $this->rules = $rules;
    }

    /**
     * Add rule
     * @param SpecificationInterface $rule
     * @return $this
     */
    public function add(SpecificationInterface $rule)
    {
        $this->rules[] = $rule;
        return $this;
    }


}