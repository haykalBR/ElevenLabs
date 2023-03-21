<?php

declare(strict_types=1);

namespace App\Comment\Application\Query\Comments;

use App\Comment\Domain\CommentRepository;
use App\Shared\Application\Query\QueryHandlerInterface;
use App\Shared\Application\Query\Collection;
use Knp\Component\Pager\PaginatorInterface;

class CommentsHandler implements QueryHandlerInterface
{
    /**
     *
     * @param CommentRepository $repository
     * @param PaginatorInterface $paginator
     */
    public function __construct(private readonly CommentRepository $repository, private readonly PaginatorInterface $paginator)
    {
    }

    public function __invoke(CommentsQuery $query): Collection
    {
        $queryBuilder = $this->repository->getComments();
        $commentsView = $this->paginator->paginate(
            $queryBuilder,
            $query->page,
            $query->limit
        );

        return new Collection($query->page, $query->limit, $commentsView->getTotalItemCount(), $commentsView->getItems());
    }
}
