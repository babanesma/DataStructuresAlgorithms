<?php

namespace Babanesma\DataStructures\Collections;

use OutOfRangeException;

class Stack
{
    protected int $size;

    /**
     * Create an instance of the stack
     * Can be constructed with ready items
     *
     * @param array $items
     */
    public function __construct(protected array $items = [])
    {
        $this->size = count($items);
    }

    /**
     * Add an element on the top of the stack
     *
     * @param mixed $item
     * @return self
     */
    public function push($item)
    {
        array_push($this->items, $item);
        $this->size++;
        return $this;
    }

    /**
     * Remove and return the element on the top of the stack
     *
     * @return mixed
     */
    public function pop()
    {
        if ($this->isEmpty()) {
            throw new OutOfRangeException('Stack is empty');
        }
        $this->size--;
        return array_pop($this->items);
    }

    /**
     * Return but not remove the element on the top of the stack
     *
     * @return mixed
     */
    public function peek()
    {
        if ($this->isEmpty()) {
            throw new OutOfRangeException('Stack is empty');
        }
        $item = end($this->items);
        reset($this->items);
        return $item;
    }

    /**
     * Return the length of the stack
     *
     * @return int
     */
    public function size()
    {
        return $this->size;
    }

    /**
     * Check if the stack is empty
     *
     * @return boolean
     */
    public function isEmpty()
    {
        return $this->size == 0;
    }
}
