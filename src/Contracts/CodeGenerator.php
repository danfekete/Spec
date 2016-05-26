<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 * daniel.fekete@voov.hu
 */

namespace danfekete\Spec\Contracts;


interface CodeGenerator
{
    /**
     * Generate the expression language code
     * @return string
     */
    public function generate();
}