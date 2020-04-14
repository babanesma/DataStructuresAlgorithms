<?php

namespace Babanesma\DataStructures\LinkedList;

use OutOfRangeException;

class LinkedList
{
    /**
     * Head Node
     *
     * @var Node
     */
    protected $head;

    /**
     * Tail Node
     *
     * @var Node
     */
    protected $tail;

    /**
     * @var int
     */
    protected $size;

    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
        $this->size = 0;
    }

    public function isEmpty(): bool
    {
        return $this->size == 0;
    }

    public function size(): int
    {
        return $this->size;
    }

    public function add(Node $node): void
    {
        if ($this->isEmpty()) {
            $this->head = $this->tail = $node;
        } else {
            $this->tail->setNext($node);
            $this->tail = $node;
        }

        $this->size++;
    }

    public function addFirst(Node $node): void
    {
        if ($this->isEmpty()) {
            $this->head = $this->tail = $node;
        } else {
            $node->setNext($this->head);
            $this->head = $node;
        }
        $this->size++;
    }

    public function clear(): void
    {
        $this->head = $this->tail = null;
        $this->size = 0;
    }

    public function addAt(int $index, Node $node): void
    {
        if ($index < 0) {
            throw new OutOfRangeException('$index should be greater than or equal 0');
        }

        if ($index > $this->size()) {
            throw new OutOfRangeException('$index is greater than list size');
        }

        // add head
        if ($index == 0) {
            $this->addFirst($node);
            return;
        }

        // add tail
        if ($index == $this->size()) {
            $this->add($node);
            return;
        }

        $i = 0;
        $prev = null;
        $current = $this->head;
        while ($i != $index) {
            $prev = $current;
            $current = $current->getNext();
            $i++;
        }

        $prev->setNext($node);
        $node->setNext($current);

        $this->size++;
    }

    public function removeAt($index): void
    {
        if ($index < 0) {
            throw new OutOfRangeException('$index should be greater than or equal 0');
        }

        if ($index >= $this->size()) {
            throw new OutOfRangeException('$index is greater than list size');
        }

        // special case to remove head
        if ($index == 0) {
            $this->head = $this->head->getNext();
            $this->size--;
            return;
        }

        $i = 0;

        $prev = null;
        $current = $this->head;
        while ($i != $index) {
            $prev = $current;

            $current = $current->getNext();
            $i++;
        }

        // sepcial case to remove tail
        if ($i == ($this->size() - 1)) {
            $prev->setNext(null);
            $this->tail = $prev;
        } else {
            $prev->setNext($current->getNext());
        }

        $current = null;
        $this->size--;
    }

    public function reverse()
    {
        $prev = null;
        $current = $this->head;

        $this->tail = $current;

        while ($current != null) {
            $next = $current->getNext();
            $current->setNext($prev);
            $prev = $current;
            $current = $next;
        }

        $this->head = $prev;
    }

    public function getHead(): ?Node
    {
        return $this->head;
    }

    public function getTail(): ?Node
    {
        return $this->tail;
    }

    public function __toString()
    {
        $listString = '';

        $current = $this->head;
        while ($current != null) {
            $listString .= sprintf($current);
            $current = $current->getNext();
        }

        return $listString;
    }
}
