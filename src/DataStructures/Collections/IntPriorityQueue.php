<?php

namespace Babanesma\DataStructures\Collections;

class IntPriorityQueue extends PriorityQueue
{
    public function compare($value1, $value2): int
    {
        return $value1 <=> $value2;
    }
}
