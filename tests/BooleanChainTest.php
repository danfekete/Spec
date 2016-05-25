<?php
use voov\Spec\SpecificationBuilder;
use voov\Spec\Specifications\Boolean\AndSpec;
use voov\Spec\Specifications\Boolean\OrSpec;

/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */
class BooleanChainTest extends PHPUnit_Framework_TestCase
{

    protected $trueMock;
    protected $falseMock;

    public function setUp() {
        $this->trueMock = $this->getMockBuilder('\voov\Spec\Specifications\CallableSpec')
            ->disableOriginalConstructor()
            ->getMock();

        $this->trueMock->method('isSatisfiedBy')->willReturn(true);
        $this->trueMock->method('__invoke')->willReturn(true);

        $this->falseMock = $this->getMockBuilder('\voov\Spec\Specifications\CallableSpec')
            ->disableOriginalConstructor()
            ->getMock();

        $this->falseMock->method('isSatisfiedBy')->willReturn(false);
        $this->falseMock->method('__invoke')->willReturn(false);
    }

    public function testAndChain()
    {
        $and = new AndSpec($this->trueMock, $this->trueMock);
        $this->assertTrue($and->isSatisfiedBy(null));
        $and->add($this->falseMock);
        $this->assertFalse($and->isSatisfiedBy(null));
    }

    public function testOrChain()
    {
        $or = new OrSpec($this->falseMock, $this->falseMock);
        $this->assertFalse($or->isSatisfiedBy(null));
        $or->add($this->trueMock);
        $this->assertTrue($or->isSatisfiedBy(null));
    }

    public function testAndOrChain()
    {
        $chain = new AndSpec($this->trueMock);
        $chain->add(new OrSpec($this->trueMock, $this->trueMock));
        $this->assertTrue($chain->isSatisfiedBy(null));
    }

    public function testSpecBuilder()
    {
        $spec = SpecificationBuilder::build(new AndSpec($this->trueMock))->run(null);
        $this->assertTrue($spec);
    }
}
