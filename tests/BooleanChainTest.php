<?php
use voov\Spec\SpecificationBuilder;
use voov\Spec\Specifications\Boolean\AndSpec;
use voov\Spec\Specifications\Boolean\NotSpec;
use voov\Spec\Specifications\Boolean\OrSpec;
use voov\Spec\Specifications\ExpressionSpec;

/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */
class BooleanChainTest extends PHPUnit_Framework_TestCase
{

    protected $generator;

    public function setUp() {
        $this->generator = $this->getMockBuilder('\voov\Spec\Contracts\CodeGenerator')
            ->disableOriginalConstructor()
            ->getMock();

        $this->generator->method('generate')->willReturn('1');
    }

    public function testAndChain()
    {
        $and = new AndSpec($this->generator, $this->generator);
        $this->assertEquals($and->generate(), "(1 && 1)");
        $and->add($this->generator);
        $this->assertEquals($and->generate(), "(1 && 1 && 1)");
    }

    public function testOrChain()
    {
        $or = new OrSpec($this->generator, $this->generator);
        $this->assertEquals($or->generate(), "(1 || 1)");
        $or->add($this->generator);
        $this->assertEquals($or->generate(), "(1 || 1 || 1)");
    }



    public function testNot()
    {
        $not = new NotSpec($this->generator);
        $this->assertEquals($not->generate(), "(!1)");
    }

    public function testAndOrChain()
    {
        $chain = new AndSpec(
            new OrSpec(
                $this->generator,
                $this->generator
            ),
            new NotSpec($this->generator),
            $this->generator
        );
        $this->assertEquals($chain->generate(), "((1 || 1) && (!1) && 1)");
    }

    public function testAddMany()
    {
        $chain = new AndSpec();
        $chain->addMany([
            new ExpressionSpec('1 == 1'),
            new ExpressionSpec('1 == 1'),
        ]);

        $this->assertEquals($chain->generate(), "(1 == 1 && 1 == 1)");
    }
}
