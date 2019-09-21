<?php

namespace TodoItem\Driver;

use TodoItem\Entity\TodoItem;

class SqliteRepository implements RepositoryInterface
{
    private $conn;

    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
        $this->conn->exec("CREATE TABLE IF NOT EXISTS todos (
                    id INTEGER PRIMARY KEY, 
                    title TEXT, 
                    done INTEGER DEFAULT 0,
                    created_at integer)");
    }

    public function find(int $id) : TodoItem
    {
        $result = $this->conn->query("SELECT * FROM todos where id =$id");
        $todoItem = new TodoItem;
        $todoItem->id = $m[0]['id'];
        $todoItem->title = $m[0]['title'];
        $todoItem->done = $m[0]['done'];
        $todoItem->createdAt = $m[0]['created_at'];
        return $todoItem;
    }

    public function search(string $query)
    {
        $all = [];
        $result = $this->conn->query("SELECT * FROM todos where title like '%$query%'");
        foreach ($result as $m) {
            $todoItem = new TodoItem;
            $todoItem->id = $m['id'];
            $todoItem->title = $m['title'];
            $todoItem->done = $m['done'];
            $todoItem->createdAt = $m['created_at'];
            $all[] = $todoItem;
        }
        return $all;
    }

    public function findAll()
    {
        $all = [];
        $result = $this->conn->query('SELECT * FROM todos');
        foreach ($result as $m) {
                $todoItem = new TodoItem;
                $todoItem->id = $m['id'];
                $todoItem->title = $m['title'];
                $todoItem->done = $m['done'];
                $todoItem->createdAt = $m['created_at'];
                $all[] = $todoItem;
        }
        return $all;
    }

    public function store(TodoItem $todoItem): int
    {
        $todoItem->createdAt = $todoItem->createdAt->getTimeStamp();
        $stmt = $this->conn->prepare('insert into todos (title, done, created_at) values (:title, :done, :created_at)');
        $stmt->bindParam(':title',$todoItem->title);
        $stmt->bindParam(':done', $todoItem->done);
        $stmt->bindParam(':created_at', $todoItem->createdAt);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function delete(int $id) : bool
    {
        $result = $this->conn->query("delete FROM todos where id =$id");
        return true;
    }
}