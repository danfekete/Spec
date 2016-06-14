<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 * daniel.fekete@voov.hu
 */

namespace danfekete\Spec\Builders;


class JsonBuilder extends ArrayBuilder
{
    public function setParams($params)
    {
        return parent::setParams(json_decode($params, true));
    }

}