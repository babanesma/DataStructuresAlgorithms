<?php

namespace Unit\Babanesma\DataStructures\Collections;

use Babanesma\DataStructures\Collections\Stack;
use OutOfRangeException;
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testAddElement()
    {
        $st = new Stack();

        $st->push(1);
        $st->push(2);
        $st->push(3);

        $this->assertEquals($st->size(), 3);
        $this->assertEquals($st->peek(), 3);
    }

    public function testPeekThrowsException()
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('Stack is empty');

        $st = new Stack();

        $st->peek();
    }

    public function testPopThrowsException()
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('Stack is empty');

        $st = new Stack();

        $st->pop();
    }

    public function testRemove()
    {
        $st = new Stack();

        $st->push(1);
        $st->push(2);
        $st->push(3);

        $e = $st->pop();

        $this->assertEquals($e, 3);
        $this->assertEquals($st->size(), 2);
        $this->assertEquals($st->peek(), 2);
    }
}
