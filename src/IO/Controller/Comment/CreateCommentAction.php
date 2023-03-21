<?php

declare(strict_types=1);

namespace IO\Controller\Comment;

use App\Comment\Application\Command\CreateComment\CreateCommentCommand;
use App\Infrastructure\Bus\AsyncEvent\MessengerAsyncEventBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class CreateCommentAction
{
    public function __construct(private readonly MessengerAsyncEventBus $commandBus)
    {
    }
    #[Route(path: '/api/comment/create', name: 'create_comment', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $parameters = json_decode(
            $request->getContent(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
        $CreateCommentCommand = new CreateCommentCommand($parameters);
        $this->commandBus->handle($CreateCommentCommand);
        return new JsonResponse($CreateCommentCommand, Response::HTTP_CREATED);
    }
}
