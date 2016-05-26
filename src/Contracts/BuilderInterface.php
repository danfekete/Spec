<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 * daniel.fekete@voov.hu
 */

namespace danfekete\Spec\Contracts;


use danfekete\Spec\Specification;

interface BuilderInterface
{
    /**
     * Build a specification from params
     * @param $params
     * @return SpecificationInterface|SpecificationInterface[]
     */
    public function build($params);
}