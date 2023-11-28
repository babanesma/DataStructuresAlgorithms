<?php

namespace Babanesma\DataStructures\Collections;

use OutOfRangeException;

class Queue
{
    protected int $size;

    /**
     * Create an instance of the queue
     * Can be constructed with ready items
     *
     * @param array $items
     */
    public function __construct(protected array $items = [])
    {
        $this->items = $items;

        $this->size = count($items);
    }

    /**
     * Add an element at the end of the queue
     *
     * @param mixed $item
     * @return self
     */
    public function enqueue($item)
    {
        $this->items[] = $item;
        $this->size++;
        return $this;
    }

    /**
     * Remove and return the element in the beginning of the queue
     *
     * @return mixed
     */
    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new OutOfRangeException("Queue is empty");
        }
        $element = array_shift($this->items);
        $this->size--;
        return $element;
    }

    /**
     * Return but not remove the element on the top of the queue
     *
     * @return mixed
     */
    public function peek()
    {
        if ($this->isEmpty()) {
            throw new OutOfRangeException('Queue is empty');
        }
        return $this->items[0];
    }

    /**
     * Return the length of the queue
     *
     * @return int
     */
    public function size()
    {
        return $this->size;
    }

    /**
     * Check if the queue is empty
     *
     * @return boolean
     */
    public function isEmpty()
    {
        return $this->size == 0;
    }
}
