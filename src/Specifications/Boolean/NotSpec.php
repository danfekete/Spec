<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */

namespace voov\Spec\Specifications\Boolean;


use voov\Spec\Contracts\SpecificationInterface;
use voov\Spec\Specifications\CallableSpec;

class NotSpec extends CallableSpec
{
    /**
     * @var SpecificationInterface
     */
    private $rule;

    /**
     * NotSpec constructor.
     * @param SpecificationInterface $rule
     */
    public function __construct(SpecificationInterface $rule)
    {
        $this->rule = $rule;
    }


    /**
     * Returns true if object satisfies the specification
     * @param $spec
     * @return boolean
     */
    public function isSatisfiedBy($spec)
    {
        return call_user_func($this->rule, $spec) ? false : true;
    }
}