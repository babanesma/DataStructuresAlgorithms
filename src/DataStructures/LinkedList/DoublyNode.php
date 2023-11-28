<?php

namespace Babanesma\DataStructures\LinkedList;

class DoublyNode
{
    protected int $size;

    public function __construct(
        protected mixed $label,
        protected DoublyNode|null $next = null,
        protected DoublyNode|null $prev = null
    ) {
        $this->size = 0;
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


    public function setPrev(DoublyNode|null $prev = null): self
    {
        $this->prev = $prev;
        return $this;
    }

    public function getPrev(): DoublyNode|null
    {
        return $this->prev;
    }

    public function setNext(DoublyNode|null $next = null): self
    {
        $this->next = $next;
        return $this;
    }

    public function getNext(): DoublyNode|null
    {
        return $this->next;
    }

    public function __toString(): string
    {
        return '[' . (string) $this->label . '] <--> ';
    }
}
