<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */

namespace voov\Spec\Specifications;


use voov\Spec\Contracts\SpecificationInterface;

abstract class CallableSpec implements SpecificationInterface
{
    /**
     * Needed for chaining
     * @param null $spec
     * @return boolean
     */
    public function __invoke($spec = null)
    {
        return $this->isSatisfiedBy($spec);
    }

}