<?php

namespace Babanesma\DataStructures\Collections;

use OutOfRangeException;

abstract class PriorityQueue extends Queue
{
    abstract public function compare($value1, $value2): int;

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new OutOfRangeException("Queue is empty");
        }

        $max = array_key_first($this->items);
        foreach ($this->items as $key => $value) {
            $compare = $this->compare($value, $this->items[$max]);
            if ($compare == 1) { // $value is higher priority than $items[$max]
                $max = $key;
            }
        }

        $item = $this->items[$max];

        unset($this->items[$max]);
        $this->size--;

        reset($this->items);

        return $item;
    }
}
