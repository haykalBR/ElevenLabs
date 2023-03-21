<?php

namespace UI\Http\Rest\Controller\Comment;

use App\Comment\Application\Query\Comments\CommentsQuery;
use App\Shared\Application\Query\QueryBusInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use Assert\Assertion;

#[AsController]
final class CommentAction
{
    public function __construct(private readonly QueryBusInterface $queryBus)
    {
    }


    #[Route(path: '/comments', name: 'comments', methods: ['GET'])]
    public function __invoke(Request $request): JsonResponse
    {
        // @phpstan-ignore-next-line
        $page = $request->query->get('page', 1);
        // @phpstan-ignore-next-line
        $limit = $request->query->get('limit', 50);

        Assertion::numeric($page, 'Page number must be an integer');
        Assertion::numeric($limit, 'Limit results must be an integer');
        $query = new CommentsQuery((int) $page, (int) $limit);
        $response = $this->queryBus->ask($query);
        return new JsonResponse($response);
    }
}
