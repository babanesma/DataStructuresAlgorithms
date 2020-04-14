<?php

namespace Babanesma\DataStructures\LinkedList;

class Node
{
    /**
     * @var object
     */
    protected $label;

    /**
     * @var Node
     */
    protected $next;

    public function __construct($label, Node $next = null)
    {
        $this->label = $label;
        $this->next = $next;
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setNext(Node $next = null): void
    {
        $this->next = $next;
    }

    public function getNext(): ?Node
    {
        return $this->next;
    }

    public function __toString(): string
    {
        return '[' . (string) $this->label . '] --> ' ;
    }
}
