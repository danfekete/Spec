<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 * daniel.fekete@voov.hu
 */

namespace danfekete\Spec\Contracts;


interface Compilable
{
    /**
     * Return the compiled string
     * @return string
     */
    public function compile();
}