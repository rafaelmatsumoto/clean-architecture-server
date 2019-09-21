<?php

declare(strict_types=1);

namespace TodoItemTest\Driver;

use TodoItem\Driver\SqliteRepository;
use PHPUnit\Framework\TestCase;
use TodoItem\UseCase\Service;
use TodoItem\Entity\TodoItem;

class SqliteRepositoryTest extends TestCase
{
    private $conn;
    private $repo;

    public function setup(): void
    {
        $this->conn = new \PDO('sqlite::memory:');
        $this->repo = new SqliteRepository($this->conn);
    }
    
    public function testStore()
    {
        $b = new TodoItem;
        $b->title = 'Walk with the dog';
        $b->done = 0;
        $b->createdAt = new \Datetime();

        $id = $this->repo->store($b);
        $this->assertEquals(1, $id);
    }

    public function testSearchAndFindAll()
    {
        $b = new TodoItem;
        $b->title = 'Walk with the dog';
        $b->done = 0;
        $b->createdAt = new \Datetime();

        $b2 = new TodoItem;
        $b2->title = 'Walk with the kids';
        $b2->done = 0;
        $b2->createdAt = new \Datetime();

        $id = $this->repo->store($b);
        $id2 = $this->repo->store($b2);
        
        $s1 = $this->repo->search('dog');
        $this->assertEquals(1, $s1[0]->id);
        $all = $this->repo->findAll();
        $this->assertEquals(1, $all[0]->id);
        $this->assertEquals(2, $all[1]->id);
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

        $id = $this->repo->store($b);
        $id2 = $this->repo->store($b2);

        $deleted = $this->repo->delete($id);
        $this->assertEquals(true, $deleted);

        $deleted = $this->repo->delete($id2);
        $this->assertEquals(true, $deleted);
    }
}
