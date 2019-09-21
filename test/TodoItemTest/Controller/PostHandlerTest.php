<?php

declare(strict_types=1);

namespace TodoItemTest\Controller;

use TodoItem\Controller\PostHandler;
use PHPUnit\Framework\TestCase;
use TodoItem\Entity\TodoItem;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use TodoItem\UseCase\UseCaseInterface;
use TodoItem\Driver\SqliteRepository;
use TodoItem\Driver\RepositoryInterface;

class PostHandlerTest extends TestCase
{
    public function testReturnsJsonResponse()
    {
        $container = $this->prophesize(ContainerInterface::class);
        $container
            ->get(SqliteRepository::class)
            ->willReturn($this->prophesize(RepositoryInterface::class));
        $service = $this->prophesize(UseCaseInterface::class);
        $service->store(\Prophecy\Argument::any())->willReturn(1);
        $postPage = new PostHandler($service->reveal());
        $response = $postPage->handle(
            $this->prophesize(ServerRequestInterface::class)->reveal()
        );

        $this->assertInstanceOf(JsonResponse::class, $response);
    }
}
