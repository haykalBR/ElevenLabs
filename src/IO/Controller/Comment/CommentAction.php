<?php

declare(strict_types=1);

namespace IO\Controller\Comment;

use App\Application\Query\QueryBusInterface;
use App\Comment\Application\Query\Comments\CommentsQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class CommentAction
{
    public function __construct(private readonly QueryBusInterface $queryBus)
    {
    }


    #[Route(path: '/api/comments', name: 'comments', methods: ['GET'])]
    public function __invoke(Request $request): JsonResponse
    {
        // @phpstan-ignore-next-line
        $page = $request->query->get('page', 1);
        // @phpstan-ignore-next-line
        $limit = $request->query->get('limit', 50);


        $query = new CommentsQuery((int) $page, (int) $limit);
        $response = $this->queryBus->ask($query);
        return new JsonResponse($response);
    }
}
