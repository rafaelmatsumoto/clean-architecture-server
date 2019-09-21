<?php

declare(strict_types=1);

namespace TodoItem\Controller;

use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TodoItem\Driver\SqliteRepository;
use TodoItem\UseCase\Service;

class HandlerFactory
{
    public function __invoke(ContainerInterface $container, $requestedName) : RequestHandlerInterface
    {
        $repo   = $container->get(SqliteRepository::class);
        $service = new Service($repo);
        return new $requestedName($service);
    }
}
