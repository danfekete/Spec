<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 * daniel.fekete@voov.hu
 */

namespace voov\Spec\Contracts;


use voov\Spec\Specification;

interface BuilderInterface
{
    /**
     * Build a specification from params
     * @param $params
     * @return SpecificationInterface|SpecificationInterface[]
     */
    public function build($params);
}