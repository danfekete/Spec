<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */

namespace voov\Spec;


use voov\Spec\Contracts\SpecificationInterface;

class SpecificationBuilder
{
    public static function build(SpecificationInterface $spec)
    {
        return new Specification($spec);
    }
}