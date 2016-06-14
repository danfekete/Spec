<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 * daniel.fekete@voov.hu
 */

namespace danfekete\Spec\Builders;


use danfekete\Spec\Contracts\BuilderInterface;
use danfekete\Spec\Contracts\CodeGenerator;
use danfekete\Spec\Exceptions\UnknownSpec;
use danfekete\Spec\Specification;
use danfekete\Spec\Specifications\Boolean\AndSpec;
use danfekete\Spec\Specifications\Boolean\NotSpec;
use danfekete\Spec\Specifications\Boolean\OrSpec;
use danfekete\Spec\Specifications\ExpressionSpec;

class ArrayBuilder implements BuilderInterface
{
    protected $params;

    /**
     * ArrayBuilder constructor.
     * @param $params
     */
    public function __construct($params)
    {
        $this->setParams($params);
    }

    protected function parseObj($obj)
    {
        if(!is_array($obj)) return null;
        $v = current($obj);
        $k = key($obj);
        $specs = [];
        if(is_array($v)) {
            foreach ($v as $item) {
                $ret = $this->parseObj($item);
                if($ret) $specs[] = $ret;
            }
        }

        switch ($k) {
            case 'and':
                $andSpec = new AndSpec();
                $andSpec->addMany($specs);
                return $andSpec;
            case 'or':
                $orSpec = new OrSpec();
                $orSpec->addMany($specs);
                return $orSpec;
            case 'not':
                return new NotSpec($this->parseObj($v));
            case 'lang':
            case 'e':
            case 'exp':
                return new ExpressionSpec($v);
                break;
            default:
                throw new UnknownSpec("Unknown spec: {$k}");
        }
    }

    /**
     * Build a specification from params
     * @return CodeGenerator
     */
    public function build()
    {
        return $this->parseObj($this->getParams());
    }

    /**
     * Set the params for the builder
     * @param $params
     * @return static
     */
    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

    /**
     * Get params for the builder
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }
}