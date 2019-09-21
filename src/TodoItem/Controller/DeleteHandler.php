<?php

declare(strict_types=1);

namespace TodoItem\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\JsonResponse;
use TodoItem\UseCase\UseCaseInterface;

class DeleteHandler implements RequestHandlerInterface
{
    private $service;

    public function __construct(UseCaseInterface $service)
    {
        $this->service = $service;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        $deleted = $this->service->delete($request->getAttribute('id'));
        return new JsonResponse($deleted);
    }
}
