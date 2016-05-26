<?php
use voov\Spec\Specification;
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
        $spec = new Specification(new ExpressionSpec('1 == 1'));
        $this->assertTrue($spec->isSatisfiedBy([]));

    }

    public function testObjectExpression()
    {
        $d = new stdClass();
        $d->x = 1;
        $spec = new Specification(new ExpressionSpec('d.x == 1'));
        $this->assertTrue($spec->isSatisfiedBy(['d' => $d]));
    }

    public function testExpressionChains()
    {
        $d = new stdClass();
        $d->x = 1;
        $x = new AndSpec(
            new ExpressionSpec('d.x == 1'),
            new ExpressionSpec('d.x > 0')
        );
        $spec = new Specification($x);
        $this->assertTrue($spec->isSatisfiedBy(['d' => $d]));
    }
}
