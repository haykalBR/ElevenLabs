<?php

declare(strict_types=1);

namespace App\Comment\Application\Query\Comments;

use App\Shared\Application\Query\QueryInterface;

class CommentsQuery implements QueryInterface
{
    public function __construct(public int $page = 1, public int $limit = 50)
    {
    }
}
