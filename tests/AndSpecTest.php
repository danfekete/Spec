<?php

/**
 * Copyright (c) 2016, VOOV LLC.
 * All rights reserved.
 * Written by Daniel Fekete
 */
class AndSpecTest extends PHPUnit_Framework_TestCase
{

    protected $trueMock;
    protected $falseMock;

    public function setUp() {
        $this->trueMock = $this->getMockBuilder('\voov\Spec\Specifications\CallableSpec')
            ->disableOriginalConstructor()
            ->getMock();

        $this->trueMock->method('isSatisfiedBy')->willReturn(true);

        $this->falseMock = $this->getMockBuilder('\voov\Spec\Specifications\CallableSpec')
            ->disableOriginalConstructor()
            ->getMock();

        $this->falseMock->method('isSatisfiedBy')->willReturn(false);
    }

    public function testAndChain()
    {
        $and = new \voov\Spec\Specifications\Boolean\AndSpec($this->trueMock, $this->trueMock);

        $this->assertTrue($and->isSatisfiedBy(null));

        $and->add($this->falseMock);

        $this->assertFalse($and->isSatisfiedBy(null));
    }
}
