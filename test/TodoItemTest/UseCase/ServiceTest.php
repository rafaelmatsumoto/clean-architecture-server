<?php

declare(strict_types=1);

namespace TodoItemTest\UseCase;

use TodoItem\Driver\InmemRepository;
use PHPUnit\Framework\TestCase;
use TodoItem\UseCase\Service;
use TodoItem\Entity\TodoItem;

class ServiceTest extends TestCase
{
    private $repo;
    private $service;

    public function setup(): void
    {
        $this->repo = new InmemRepository;
        $this->service = new Service($this->repo);
    }

    public function testStore()
    {
        $b = new TodoItem;
        $b->title = 'Walk with the dog';
        $b->done = 0;
        $b->createdAt = new \Datetime();

        $id = $this->service->store($b);
        $this->assertEquals(1, $id);
    }

    public function testFindSingleTodo()
    {
        $b = new TodoItem;
        $b->title = 'Walk with the dog';
        $b->done = 0;
        $b->createdAt = new \Datetime();
        $this->service->store($b);
        $firstTodo = $this->service->find(1);
        $this->assertEquals(1, $firstTodo->id);
    }

    public function testSearchAndFindAll()
    {
        $b = new TodoItem;
        $b->title = 'Walk with the dog';
        $b->done = 0;
        $b->createdAt = new \Datetime();

        $b2 = new TodoItem;
        $b2->title = 'Walk with them kids';
        $b2->done = 0;
        $b2->createdAt = new \Datetime();

        $id = $this->service->store($b);
        $this->assertEquals(1, $id);
        $id2 = $this->service->store($b2);
        $this->assertEquals(2, $id2);

        $s1 = $this->service->search('Walk with the dog');
        $this->assertEquals(1, $s1->id);
        $all = $this->service->findAll();
        $this->assertEquals(1, $all[1]->id);
        $this->assertEquals(2, $all[2]->id);
    }

    public function testDelete()
    {
        $b = new TodoItem;
        $b->title = 'Walk with the dog';
        $b->done = 0;
        $b->createdAt = new \Datetime();

        $b2 = new TodoItem;
        $b2->title = 'Walk with the kids';
        $b2->done = 0;
        $b2->createdAt = new \Datetime();

        $id = $this->service->store($b);
        $id2 = $this->service->store($b2);

        $deleted = $this->service->delete($id2);
        $this->assertEquals(true, $deleted);
    }
}
