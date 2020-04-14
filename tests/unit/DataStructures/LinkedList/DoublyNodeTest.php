<?php

namespace Unit\Babanesma\DataStructures\LinkedList;

use Babanesma\DataStructures\LinkedList\DoublyNode;
use PHPUnit\Framework\TestCase;

class DoublyNodeTest extends TestCase
{
    public function testDoublyNode()
    {
        $nodePrev = new DoublyNode('A');
        $node = new DoublyNode('B');
        $nodeNext = new DoublyNode('C');

        $node->setPrev($nodePrev);
        $node->setNext($nodeNext);

        $this->assertEquals('B', $node->getLabel());
        $this->assertEquals('A', $node->getPrev()->getLabel());
        $this->assertEquals('C', $node->getNext()->getLabel());
    }
}
