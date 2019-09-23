<?php

declare(strict_types=1);

namespace TodoItem\Controller;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use TodoItem\Entity\TodoItem;
use TodoItem\UseCase\UseCaseInterface;

class PostHandler implements RequestHandlerInterface
{
    private $service;

    public function __construct(UseCaseInterface $service)
    {
        $this->service = $service;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {   
        $data = $request->getParsedBody();
        $todoItem = new TodoItem();
        $todoItem->title = $data['title'];
        $todoItem->id = $this->service->store($todoItem);
        return new JsonResponse($todoItem);
    }
}
