<?php

namespace Babanesma\DataStructures\LinkedList;

class DoublyNode extends Node
{
    /**
     * @var Node
     */
    protected $prev;

    public function __construct($label, Node $next = null, Node $prev = null)
    {
        parent::__construct($label, $next);
        $this->prev = $prev;
    }

    public function setPrev(Node $prev = null): self
    {
        $this->prev = $prev;
        return $this;
    }

    public function getPrev(): Node
    {
        return $this->prev;
    }

    public function __toString(): string
    {
        return '[' . (string) $this->label . '] <--> ' ;
    }
}
