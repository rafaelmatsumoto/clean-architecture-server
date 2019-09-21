<?php

declare(strict_types=1);

namespace TodoItemTest\Driver;

use TodoItem\Driver\SqliteRepository;
use TodoItem\Driver\SqliteRepositoryFactory;
use TodoItem\Driver\RepositoryInterface;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class SqliteRepositoryFactoryTest extends TestCase
{
    public function testFactory()
    {
        $config = [
            'db' => [
                'dsn' => 'sqlite:data/todos.sqlite3',
            ],
        ];
        $this->container = $this->prophesize(ContainerInterface::class);
        $this->container
            ->get('config')
            ->willReturn($config);

        $factory = new SqliteRepositoryFactory();

        $repo = $factory($this->container->reveal(), null, get_class($this->container->reveal()));

        $this->assertInstanceOf(SqliteRepository::class, $repo);
    }
}
