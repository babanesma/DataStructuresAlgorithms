<?php

namespace Unit\Babanesma\DataStructures\Collections;

use Babanesma\DataStructures\Collections\Queue;
use OutOfRangeException;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    public function testConstructor()
    {
        $qu = new Queue(1);

        $this->assertEquals(1, $qu->peek());
    }
    public function testAddElement()
    {
        $qu = new Queue();

        $qu->enqueue(1);
        $qu->enqueue(2);
        $qu->enqueue(3);

        $this->assertEquals(3, $qu->size());
        $this->assertEquals(1, $qu->peek());
    }

    public function testPeekThrowsException()
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('Queue is empty');

        $qu = new Queue();

        $qu->peek();
    }

    public function testPopThrowsException()
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('Queue is empty');

        $qu = new Queue();

        $qu->dequeue();
    }

    public function testRemove()
    {
        $qu = new Queue();

        $qu->enqueue(1);
        $qu->enqueue(2);
        $qu->enqueue(3);

        $e = $qu->dequeue();

        $this->assertEquals(1, $e);
        $this->assertEquals(2, $qu->size());
        $this->assertEquals(2, $qu->peek());
    }
}
