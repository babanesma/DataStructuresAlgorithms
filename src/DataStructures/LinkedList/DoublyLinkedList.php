<?php

namespace Babanesma\DataStructures\LinkedList;

use OutOfRangeException;

class DoublyLinkedList
{
    protected DoublyNode|null $head;
    protected DoublyNode|null $tail;
    protected int $size;

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

    public function add(DoublyNode $node): void
    {
        if ($this->isEmpty()) {
            $this->head = $this->tail = $node;
        } else {
            $node->setPrev($this->tail);
            $this->tail->setNext($node);
            $this->tail = $node;
        }

        $this->size++;
    }

    public function addFirst(DoublyNode $node): void
    {
        if ($this->isEmpty()) {
            $this->head = $this->tail = $node;
        } else {
            $node->setNext($this->head);
            $this->head->setPrev($node);
            $this->head = $node;
        }
        $this->size++;
    }

    public function clear(): void
    {
        $this->head = $this->tail = null;
        $this->size = 0;
    }

    public function addAt(int $index, DoublyNode $node): void
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
        $next = $current->getNext();
        while ($i != $index) {
            $prev = $current;
            $current = $current->getNext();
            $next = $next->getNext();
            $i++;
        }

        $prev->setNext($node);

        $node->setNext($current);
        $node->setPrev($prev);

        $this->size++;
    }

    public function removeAt(int $index): void
    {
        if ($index < 0) {
            throw new OutOfRangeException('$index should be greater than or equal 0');
        }

        if ($index > $this->size()) {
            throw new OutOfRangeException('$index is greater than list size');
        }

        // special case to remove head
        if ($index == 0) {
            $this->head = $this->head->getNext();
            $this->head->setPrev(null);
            $this->size--;
            return;
        }

        $i = 0;

        $prev = null;
        $current = $this->head;
        $next = $current->getNext();

        while ($i != $index) {
            $prev = $current;
            $current = $current ? $current->getNext() : null;
            $next = $next ? $next->getNext() : null;
            $i++;
        }

        // sepcial case to remove tail
        if ($i == ($this->size() - 1)) {
            $prev->setNext(null);
            $this->tail = $prev;
        } else {
            $prev->setNext($next);
            $next->setPrev($prev);
        }

        $current = null;
        $this->size--;
    }

    public function reverse(): self
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
        return $this;
    }

    public function getHead(): ?DoublyNode
    {
        return $this->head;
    }

    public function getTail(): ?DoublyNode
    {
        return $this->tail;
    }

    public function __toString(): string
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
