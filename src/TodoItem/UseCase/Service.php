<?php
namespace TodoItem\UseCase;

use TodoItem\Entity\TodoItem;
use TodoItem\Driver\RepositoryInterface;

class Service implements UseCaseInterface
{
    private $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function search(string $query)
    {
        return $this->repository->search($query);
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }

    public function store(TodoItem $todoItem): int
    {
        $todoItem->createdAt = new \Datetime();
        return $this->repository->store($todoItem);
    }

    public function delete(int $id) : bool
    {
        return $this->repository->delete($id);
    }
}