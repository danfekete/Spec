<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */

namespace voov\Spec\Contracts;


interface SpecificationInterface
{
    /**
     * Returns true if object satisfies the specification
     * @param $spec
     * @return boolean
     */
    public function isSatisfiedBy($spec);

    /**
     * Needed for chaining
     * @param null $spec
     * @return mixed
     */
    public function __invoke($spec=null);
}