<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */

namespace voov\Spec\Specifications\Boolean;

use voov\Spec\Specifications\CallableSpec;

class NotSpec extends CallableSpec
{


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