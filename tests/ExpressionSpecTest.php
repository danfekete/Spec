<?php
use voov\Spec\SpecificationBuilder;
use voov\Spec\Specifications\Boolean\AndSpec;
use voov\Spec\Specifications\Boolean\OrSpec;
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

    public function testExpressionChains()
    {
        $obj = new stdClass();
        $obj->value = 3;

        $ret = SpecificationBuilder::build(new AndSpec(

            new ExpressionSpec('o.value == 3', ['o']),
            new ExpressionSpec('o.value > 2', ['o']),

            new OrSpec(
                new ExpressionSpec('o.value > 0', ['o']),
                new ExpressionSpec('o.value == 0', ['o'])
            )

        ))->run(['o' => $obj]);

        $this->assertTrue($ret);
    }
}
