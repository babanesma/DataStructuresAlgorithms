<?php

namespace Unit\Babanesma\DataStructures\LinkedList;

use Babanesma\DataStructures\LinkedList\Node;
use PHPUnit\Framework\TestCase;

/**
 * NodeTest
 * @group LinkeList
 */
class NodeTest extends TestCase
{
    public function testNode()
    {
        $node = new Node('A');
        $node2 = new Node('B');
        $node->setNext($node2);

        $this->assertEquals('[A] --> ', sprintf($node));
        $this->assertEquals('A', $node->getLabel());
        $this->assertEquals($node2, $node->getNext());

        // assert changes
        $node->setLabel('C');
        $this->assertEquals('C', $node->getLabel());

        $node3 = new Node('D');
        $node->setNext($node3);

        $this->assertEquals('[D] --> ', sprintf($node->getNext()));
    }
}
