<?php

namespace Babanesma\DataStructures\LinkedList;

class Node
{
    public function __construct(
        protected mixed $label,
        protected Node|null $next = null
    ) {
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
        return '[' . (string) $this->label . '] --> ';
    }
}
