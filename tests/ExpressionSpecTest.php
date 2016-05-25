<?php
use voov\Spec\Specifications\ExpressionSpec;

/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 * daniel.fekete@voov.hu
 */
class ExpressionSpecTest extends PHPUnit_Framework_TestCase
{

    public function testSimpleExpression()
    {
        $e = new ExpressionSpec("3 == 3");
        $this->assertTrue($e->isSatisfiedBy([]));

        $eNot = new ExpressionSpec("3 == 2");
        $this->assertFalse($eNot->isSatisfiedBy([]));
    }

    public function testObjectExpression()
    {
        $obj = new stdClass();
        $obj->value = 3;

        $e = new ExpressionSpec("3 == o.value", ['o']);
        $this->assertTrue($e->isSatisfiedBy(['o' => $obj]));
    }
}
