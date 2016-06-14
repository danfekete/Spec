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
     * Set the params for the builder
     * @param $params
     */
    public function setParams($params);

    /**
     * Get params for the builder
     * @return array
     */
    public function getParams();

    /**
     * Build a specification from params
     * @return CodeGenerator
     */
    public function build();
}