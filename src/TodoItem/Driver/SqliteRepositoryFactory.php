<?php

declare(strict_types=1);

namespace TodoItem\Driver;

use Psr\Container\ContainerInterface;
use TodoItem\Driver\RepositoryInterface;

class SqliteRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : RepositoryInterface
    {
        $config = $container->get('config');
        $conn = new \PDO($config['db']['dsn']);
        return new SqliteRepository($conn);
    }
}
