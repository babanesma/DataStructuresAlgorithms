<?php

namespace Unit\Babanesma\DataStructures\Collections;

use Babanesma\DataStructures\Collections\IntPriorityQueue;
use OutOfRangeException;
use PHPUnit\Framework\TestCase;

class IntPriorityQueueTest extends TestCase
{
    public function testDequeueInPriority()
    {
        $intPriorityQueue = new IntPriorityQueue();

        $intPriorityQueue->enqueue(10)
            ->enqueue(11)
            ->enqueue(6)
            ->enqueue(-1)
            ->enqueue(3);

        $this->assertEquals(11, $intPriorityQueue->dequeue());
        $this->assertEquals(10, $intPriorityQueue->dequeue());
        $this->assertEquals(6, $intPriorityQueue->dequeue());
        $this->assertEquals(3, $intPriorityQueue->dequeue());
        $this->assertEquals(-1, $intPriorityQueue->dequeue());
    }

    public function testDequeueThrowsException()
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('Queue is empty');

        $qu = new IntPriorityQueue();

        $qu->dequeue();
    }
}
