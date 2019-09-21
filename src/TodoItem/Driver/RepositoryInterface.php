<?php

namespace TodoItem\Driver;

use TodoItem\Entity\TodoItem;

interface RepositoryInterface
{
    public function find(int $id) : TodoItem;

    public function search(string $query);

    public function findAll();

    public function store(TodoItem $todoItem): int;

    public function delete(int $id) : bool;
}
