<?php

namespace TodoItem\UseCase;

use TodoItem\Entity\TodoItem;
use TodoItem\Driver\RepositoryInterface;

interface UseCaseInterface
{
    public function __construct(RepositoryInterface $repository);

    public function search(string $query);

    public function findAll();

    public function store(TodoItem $todoItem): int;

    public function delete(int $id) : bool;
}