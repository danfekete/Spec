<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */

namespace voov\Spec\Specifications\Boolean;


class OrSpec extends BooleanChain
{

    /**
     * Returns true if object satisfies the specification
     * @param $spec
     * @return boolean
     */
    public function isSatisfiedBy($spec)
    {
        foreach ($this->rules as $rule) {
            // if any rule return true, we return true
            if($rule($spec)) return true;
        }

        return false;
    }
}