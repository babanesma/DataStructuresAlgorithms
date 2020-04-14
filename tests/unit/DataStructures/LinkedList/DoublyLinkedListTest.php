<?php

namespace Unit\Babanesma\DataStructures\LinkedList;

use Babanesma\DataStructures\LinkedList\DoublyLinkedList;
use Babanesma\DataStructures\LinkedList\DoublyNode;
use OutOfRangeException;
use PHPUnit\Framework\TestCase;

class DoublyLinkedListTest extends TestCase
{

    public function testConstruct()
    {
        $dll = new DoublyLinkedList();
        $this->assertEquals(null, $dll->getHead());
        $this->assertEquals(null, $dll->getTail());
    }

    public function provideSimpleDoublyLinkedList()
    {
        $dll = new DoublyLinkedList();

        $dll->add(new DoublyNode('A'));
        $dll->add(new DoublyNode('B'));
        $dll->add(new DoublyNode('C'));
        $dll->add(new DoublyNode('D'));

        return [
            [$dll]
        ];
    }

    /**
     * @dataProvider provideSimpleDoublyLinkedList
     */
    public function testListStringRepresentation(DoublyLinkedList $dll)
    {
        $this->assertEquals('[A] <--> [B] <--> [C] <--> [D] <--> ', sprintf($dll));
    }

    /**
     * @dataProvider provideSimpleDoublyLinkedList
     */
    public function testAddFirst(DoublyLinkedList $dll)
    {
        $dll->addFirst(new DoublyNode('E'));

        $this->assertEquals('E', $dll->getHead()->getLabel());
        $this->assertEquals(5, $dll->size());
    }

    public function testAddFirstToEmptyList()
    {
        $dll = new DoublyLinkedList();

        $dll->addFirst(new DoublyNode('A'));
        $this->assertEquals(1, $dll->size());
        $this->assertEquals('[A] <--> ', sprintf($dll));
    }

    /**
     * @dataProvider provideSimpleDoublyLinkedList
     */
    public function testAdd(DoublyLinkedList $dll)
    {
        $dll->add(new DoublyNode('E'));

        $this->assertEquals('E', $dll->getTail()->getLabel());
        $this->assertEquals(5, $dll->size());
    }

    public function testAddToEmptyDoublyLinkedList()
    {
        $dll = new DoublyLinkedList();

        $dll->add(new DoublyNode('A'));

        $this->assertEquals('A', $dll->getHead()->getLabel());
        $this->assertEquals('A', $dll->getTail()->getLabel());
        $this->assertEquals(1, $dll->size());
    }


    /**
     * @dataProvider provideSimpleDoublyLinkedList
     */
    public function testAddAt(DoublyLinkedList $dll)
    {
        $dll->addAt(2, new DoublyNode('inserted'));

        $this->assertEquals(5, $dll->size());
        $this->assertEquals('[A] <--> [B] <--> [inserted] <--> [C] <--> [D] <--> ', sprintf($dll));

        // test add head
        $dll->addAt(0, new DoublyNode('1'));
        $this->assertEquals(6, $dll->size());
        $this->assertEquals('[1] <--> [A] <--> [B] <--> [inserted] <--> [C] <--> [D] <--> ', sprintf($dll));

        // test add tail
        $dll->addAt(6, new DoublyNode('z'));
        $this->assertEquals(7, $dll->size());
        $this->assertEquals('[1] <--> [A] <--> [B] <--> [inserted] <--> [C] <--> [D] <--> [z] <--> ', sprintf($dll));
    }

    public function testAddAtThrowsExceptionWhenIndexIsBelowZero()
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('$index should be greater than or equal 0');

        $dll = new DoublyLinkedList();
        $dll->addAt(-1, new DoublyNode('A'));
    }

    /**
     * @dataProvider provideSimpleDoublyLinkedList
     */
    public function testAddAtThrowsExceptionWhenIndexIsGreaterThanSize(DoublyLinkedList $dll)
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('$index is greater than list size');

        $dll->addAt(6, new DoublyNode('A'));
    }

    /**
     * @dataProvider provideSimpleDoublyLinkedList
     */
    public function testReverse(DoublyLinkedList $dll)
    {
        $dll->reverse();
        $this->assertEquals('[D] <--> [C] <--> [B] <--> [A] <--> ', sprintf($dll));
    }

    /**
     * @dataProvider provideSimpleDoublyLinkedList
     */
    public function testRemove(DoublyLinkedList $dll)
    {
        $dll->removeAt(2);

        $this->assertEquals(3, $dll->size());
        $this->assertEquals('[A] <--> [B] <--> [D] <--> ', sprintf($dll));
    }

    /**
     * @dataProvider provideSimpleDoublyLinkedList
     */
    public function testRemoveHead(DoublyLinkedList $dll)
    {
        $dll->removeAt(0);

        $this->assertEquals(3, $dll->size());
        $this->assertEquals('B', $dll->getHead()->getLabel());
    }

    /**
     * @dataProvider provideSimpleDoublyLinkedList
     */
    public function testRemoveTail(DoublyLinkedList $dll)
    {
        $dll->removeAt(3);

        $this->assertEquals(3, $dll->size());
        $this->assertEquals('C', $dll->getTail()->getLabel());
    }

    /**
     * @dataProvider provideSimpleDoublyLinkedList
     */
    public function testRemoveThrowsExceptionWhenIndexIsBelowZeroException(DoublyLinkedList $dll)
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('$index should be greater than or equal 0');

        $dll->removeAt(-1);
    }

        /**
     * @dataProvider provideSimpleDoublyLinkedList
     */
    public function testRemoveThrowsExceptionWhenIndexIsGreaterThanSize(DoublyLinkedList $dll)
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('$index is greater than list size');

        $dll->removeAt(6);
    }


    /**
     * @dataProvider provideSimpleDoublyLinkedList
     */
    public function testClear(DoublyLinkedList $dll)
    {
        $dll->clear();

        $this->assertEquals(0, $dll->size());
        $this->assertTrue($dll->isEmpty());
        $this->assertNull($dll->getHead());
        $this->assertNull($dll->getTail());
    }
}
