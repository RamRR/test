<?php

namespace app\repositories;

use app\entities\Visitor\Visitor;
use app\entities\Visitor\Id;

interface VisitorRepository
{
    /**
     * @param Id $id
     * @return Visitor
     * @throws NotFoundException
     */
    public function get(Id $id): Visitor;

    public function add(Visitor $visitor): void;

    public function save(Visitor $visitor): void;

    public function remove(Visitor $visitor): void;
}
