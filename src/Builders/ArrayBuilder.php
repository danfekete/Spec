<?php
/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 * daniel.fekete@voov.hu
 */

namespace voov\Spec\Builders;


use voov\Spec\Contracts\BuilderInterface;
use voov\Spec\Exceptions\UnknownSpec;
use voov\Spec\Specification;
use voov\Spec\Specifications\Boolean\AndSpec;
use voov\Spec\Specifications\Boolean\NotSpec;
use voov\Spec\Specifications\Boolean\OrSpec;
use voov\Spec\Specifications\ExpressionSpec;

class ArrayBuilder implements BuilderInterface
{

    /**
     * Build a specification from params
     * @param $params
     * @return Specification
     */
    public function build($params)
    {
        $specs = [];
        foreach ($params as $key => $param) {

            switch ($key) {
                case 'and':
                    $spec = new AndSpec();
                    $spec->addMany((array)$this->build($param));
                    $specs[] = $spec;
                    break;
                case 'or':
                    $spec = new OrSpec();
                    $spec->addMany((array)$this->build($param));
                    $specs[] = $spec;
                    break;
                case 'not':
                    $specs[] = new NotSpec($this->build($param));
                    break;
                case 'lang':
                case 'e':
                case 'exp':

                    if(empty($param['vars'])) $vars = [];
                    else $vars = $param['vars'];

                    $specs[] = new ExpressionSpec($param['code'], (array)$vars);
                    break;
                default:
                    throw new UnknownSpec("Unknown spec: {$key}");
            }
        }
        
        return $specs;
    }
}