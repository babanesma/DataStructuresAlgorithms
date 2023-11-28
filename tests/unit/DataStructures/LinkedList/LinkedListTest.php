<?php

namespace Unit\Babanesma\DataStructures\LinkedList;

use Babanesma\DataStructures\LinkedList\LinkedList;
use Babanesma\DataStructures\LinkedList\Node;
use OutOfRangeException;
use PHPUnit\Framework\TestCase;

class LinkedListTest extends TestCase
{
    public function testConstruct()
    {
        $ll = new LinkedList();
        $this->assertEquals(null, $ll->getHead());
        $this->assertEquals(null, $ll->getTail());
    }

    public static function provideSimpleLinkedList()
    {
        $ll = new LinkedList();

        $ll->add(new Node('A'));
        $ll->add(new Node('B'));
        $ll->add(new Node('C'));
        $ll->add(new Node('D'));

        return [
            [$ll]
        ];
    }

    /**
     * @dataProvider provideSimpleLinkedList
     */
    public function testListStringRepresentation(LinkedList $ll)
    {
        $this->assertEquals('[A] --> [B] --> [C] --> [D] --> ', sprintf($ll));
    }

    /**
     * @dataProvider provideSimpleLinkedList
     */
    public function testAddFirst(LinkedList $ll)
    {
        $ll->addFirst(new Node('E'));

        $this->assertEquals('E', $ll->getHead()->getLabel());
        $this->assertEquals(5, $ll->size());
    }

    public function testAddFirstToEmptyList()
    {
        $ll = new LinkedList();

        $ll->addFirst(new Node('A'));
        $this->assertEquals(1, $ll->size());
        $this->assertEquals('[A] --> ', sprintf($ll));
    }

    /**
     * @dataProvider provideSimpleLinkedList
     */
    public function testAdd(LinkedList $ll)
    {
        $ll->add(new Node('E'));

        $this->assertEquals('E', $ll->getTail()->getLabel());
        $this->assertEquals(5, $ll->size());
    }

    public function testAddToEmptyLinkedList()
    {
        $ll = new LinkedList();

        $ll->add(new Node('A'));

        $this->assertEquals('A', $ll->getHead()->getLabel());
        $this->assertEquals('A', $ll->getTail()->getLabel());
        $this->assertEquals(1, $ll->size());
    }


    /**
     * @dataProvider provideSimpleLinkedList
     */
    public function testAddAt(LinkedList $ll)
    {
        $ll->addAt(2, new Node('inserted'));

        $this->assertEquals(5, $ll->size());
        $this->assertEquals('[A] --> [B] --> [inserted] --> [C] --> [D] --> ', sprintf($ll));

        // test add head
        $ll->addAt(0, new Node('1'));
        $this->assertEquals(6, $ll->size());
        $this->assertEquals('[1] --> [A] --> [B] --> [inserted] --> [C] --> [D] --> ', sprintf($ll));

        // test add tail
        $ll->addAt(6, new Node('z'));
        $this->assertEquals(7, $ll->size());
        $this->assertEquals('[1] --> [A] --> [B] --> [inserted] --> [C] --> [D] --> [z] --> ', sprintf($ll));
    }

    public function testAddAtThrowsExceptionWhenIndexIsBelowZero()
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('$index should be greater than or equal 0');

        $ll = new LinkedList();
        $ll->addAt(-1, new Node('A'));
    }

    /**
     * @dataProvider provideSimpleLinkedList
     */
    public function testAddAtThrowsExceptionWhenIndexIsGreaterThanSize(LinkedList $ll)
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('$index is greater than list size');

        $ll->addAt(6, new Node('A'));
    }

    /**
     * @dataProvider provideSimpleLinkedList
     */
    public function testReverse(LinkedList $ll)
    {
        $ll->reverse();
        $this->assertEquals('[D] --> [C] --> [B] --> [A] --> ', sprintf($ll));
    }

    /**
     * @dataProvider provideSimpleLinkedList
     */
    public function testRemove(LinkedList $ll)
    {
        $ll->removeAt(2);

        $this->assertEquals(3, $ll->size());
        $this->assertEquals('[A] --> [B] --> [D] --> ', sprintf($ll));
    }

    /**
     * @dataProvider provideSimpleLinkedList
     */
    public function testRemoveHead(LinkedList $ll)
    {
        $ll->removeAt(0);

        $this->assertEquals(3, $ll->size());
        $this->assertEquals('B', $ll->getHead()->getLabel());
    }

    /**
     * @dataProvider provideSimpleLinkedList
     */
    public function testRemoveTail(LinkedList $ll)
    {
        $ll->removeAt(3);

        $this->assertEquals(3, $ll->size());
        $this->assertEquals('C', $ll->getTail()->getLabel());
    }

    /**
     * @dataProvider provideSimpleLinkedList
     */
    public function testRemoveThrowsExceptionWhenIndexIsBelowZeroException(LinkedList $ll)
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('$index should be greater than or equal 0');

        $ll->removeAt(-1);
    }

        /**
     * @dataProvider provideSimpleLinkedList
     */
    public function testRemoveThrowsExceptionWhenIndexIsGreaterThanSize(LinkedList $ll)
    {
        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('$index is greater than list size');

        $ll->removeAt(6);
    }


    /**
     * @dataProvider provideSimpleLinkedList
     */
    public function testClear(LinkedList $ll)
    {
        $ll->clear();

        $this->assertEquals(0, $ll->size());
        $this->assertTrue($ll->isEmpty());
        $this->assertNull($ll->getHead());
        $this->assertNull($ll->getTail());
    }
}
