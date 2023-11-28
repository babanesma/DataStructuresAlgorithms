<?php

namespace Babanesma\DataStructures\Collections;

use OutOfRangeException;

/**
 * Counter map
 *
 * Holds the count of each object, Objects are unique.
 * Keys are populated using spl_object_id
 *
 * $counter = new Counter();
 * $a = new a();
 * $b = new b();
 *
 * $counter->add($a);
 * $counter->add($a);
 * $counter->add($b);
 * $counter->add($c);
 * $counter->remove($b);
 *
 * $counter->count($a); // 2
 * $counter->count($b); // 0
 * $counter->count($c); // 1
 */
class Counter
{
    protected array $objects;

    protected array $objectsCounter;

    /**
     * Creates an instance of counter map
     */
    public function __construct()
    {
        $this->objects = [];
        $this->objectsCounter = [];
    }

    public function add($element)
    {
        $key = $this->getKey($element);

        $this->objectsCounter[$key]++;
    }

    public function remove($element)
    {
        if (!$this->has($element)) {
            throw new OutOfRangeException("\$element not found");
        }
        $key = $this->getKey($element);
        $this->objectsCounter[$key]--;
    }

    public function count($element)
    {
        $key = $this->getKey($element);

        return $this->objectsCounter[$key];
    }

    public function has($element)
    {
        return in_array($element, $this->objects);
    }

    protected function getKey($element)
    {
        if (!$this->has($element)) {
            $key = $this->generateKey($element);
            $this->objects[$key] = $element;
            $this->objectsCounter[$key] = 0;
        } else {
            $key = array_search($element, $this->objects);
        }

        return $key;
    }

    protected function generateKey($element)
    {
        if (is_object($element)) {
            return spl_object_id($element);
        }
        return $element;
    }
}
