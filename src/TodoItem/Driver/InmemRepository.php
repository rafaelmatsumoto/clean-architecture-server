<?php

namespace TodoItem\Driver;

use TodoItem\Entity\TodoItem;

class InmemRepository implements RepositoryInterface
{
    private $ids;
    private $todoItems;

    public function find(int $id) : TodoItem
    {
        return $this->todoItems[$id];
    }

    public function search(string $query)
    {
        foreach ($this->todoItems as $key => $value) {
            if ($value->title == $query) {
                return $value;
            }
        }
    }

    public function findAll()
    {
        return $this->todoItems;
    }

    public function store(TodoItem $todoItem): int
    {
        $this->ids++;
        $todoItem->id = $this->ids;
        $this->todoItems[$this->ids] = $todoItem;
        return $this->ids;
    }

    public function delete(int $id) : bool
    {
        unset($this->todoItems[$id]);
        return true;
    }
}