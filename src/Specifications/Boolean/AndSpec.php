<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */

namespace voov\Spec\Specifications\Boolean;


class AndSpec extends BooleanChain
{

    /**
     * Returns true if object satisfies the specification
     * @param $spec
     * @return boolean
     */
    public function isSatisfiedBy($spec)
    {
        foreach ($this->rules as $rule) {
            // if either rule (spec) returns false, we return false
            if(!$rule($spec)) return false;
        }

        return true;
    }
}