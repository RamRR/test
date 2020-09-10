<?php

namespace app\repositories;

use app\entities\Visitor\Visitor;
use app\entities\Visitor\Id;

class MemoryVisitorRepository implements VisitorRepository
{
    private $items = [];

    public function get(Id $id): Visitor
    {
        if (!isset($this->items[$id->getId()])) {
            throw new NotFoundException('Visitor not found.');
        }
        return clone $this->items[$id->getId()];
    }

    public function add(Visitor $visitor): void
    {
        $this->items[$visitor->getId()->getId()] = $visitor;
    }

    public function save(Visitor $visitor): void
    {
        $this->items[$visitor->getId()->getId()] = $visitor;
    }

    public function remove(Visitor $visitor): void
    {
        if ($this->items[$visitor->getId()->getId()]) {
            unset($this->items[$visitor->getId()->getId()]);
        }
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
