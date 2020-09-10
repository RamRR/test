<?php
namespace app\services;

use app\dispatchers\EventDispatcher;
use app\entities\Visitor\Gender;
use app\entities\Visitor\Id;
use app\entities\Visitor\Name;
use app\repositories\VisitorRepository;
use app\entities\Visitor\Visitor;
use app\services\dto\VisitorCreateDto;

class VisitorService
{
    private $visitors;
    private $dispatcher;

    public function __construct(VisitorRepository $visitors, EventDispatcher $dispatcher)
    {
        $this->visitors = $visitors;
        $this->dispatcher = $dispatcher;
    }

    public function create(VisitorCreateDto $dto): Visitor
    {
        $visitor = new Visitor(
            Id::next(),
            new Name(
                $dto->name->last,
                $dto->name->first,
                $dto->name->middle
            ),
            new Gender(
                $dto->gender->gender
            )
        );
        $this->visitors->add($visitor);
        $this->dispatcher->dispatch($visitor->releaseEvents());
        return $visitor;
    }

    /**
     * @return VisitorRepository
     */
    public function getVisitors(): VisitorRepository
    {
        return $this->visitors;
    }
}